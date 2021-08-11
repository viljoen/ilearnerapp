var WebsocketServer = require("websocket").server;
var http = require("http");
var htmlEntity = require("html-entities");
var uniqueId = require("uniqid");
var mysql = require("mysql");
var PORT = 3281;

//Database Connection
var db = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "ilearnerapp"
});

//Connect to the database
db.connect();

//list of currently connected clients
var clients = [];

//Create http server
var server = http.createServer();

server.listen(PORT, function () {
    console.log("Server listening on port:" + PORT);
});

/**
 * create the websocket server here
 */

wsServer = new WebsocketServer({
    httpServer: server
});

/**
 * The websocket server
 */
wsServer.on("request", function (request) {
    var connection = request.accept(null, request.origin);

    //the unique identifier for the connection instance of the client
    var connection_id;

    //the room id for the users
    var room_id;




    /**
     * This is where we send the message to all the connected clients
     */
    connection.on("message", function (message) {
        //console.log(message);
        var utf8Data = JSON.parse(message.utf8Data);
        console.log(utf8Data);
        if (message.type === 'utf8'){
            if(utf8Data.type == "info"){

                //generate a unique identifier
                connection_id = "connection_" + uniqueId();

                //store the room_id
                room_id = utf8Data.data.room_id;

                //push the connection instance
                clients.push({
                    "connection": connection,
                    "connection_id": connection_id,
                    "room_id": room_id,
                    "user_id": utf8Data.data.user_id
                });

                console.log("The connection info of the client connection:" ,{
                    "connection_id": connection_id,
                    "room_id": room_id,
                    "user_id": utf8Data.data.user_id
                });

                loadChatHistory(room_id,20)
            }else if(utf8Data.type === "chatMessage"){
                retrieveLatestChatMessage();
            }
        }
    });

    /**
     * When the client closes it's connection to the server
     *
     */
    connection.on("close", function(connection){

    });

    /**
     * Load the first 30 message from chat history
     */

    function loadChatHistory(room_id,messageLimit = 30) {
        var statement = `
            SELECT messengers.room_id, messengers.user_id, messengers.message, messengers.created_at, users.name
            FROM messengers
                     LEFT JOIN users ON messengers.user_id = users.id
            WHERE room_id = ${room_id}
            ORDER BY created_at ASC
                LIMIT ${messageLimit}
        `;


        /**
         * Query from the database
         */
        db.query(statement, (error, results) => {
            if (error) console.log(error);

            if (results) {
                results.forEach(dbRecord => {
                    clients.forEach(item => {
                        //broadcast the messages to the specifies client
                        if (
                            room_id == item.room_id &&
                            item.connection_id == connection_id
                        ) {
                            item.connection.sendUTF(
                                JSON.stringify({
                                    type: "chatMessage",
                                    data: {
                                        room_id: dbRecord["room_id"],
                                        user_id: dbRecord["user_id"],
                                        name: htmlEntity.encode(
                                            dbRecord["name"]
                                        ),
                                        message: htmlEntity.encode(
                                            dbRecord["message"]
                                        ),
                                        created_at: dbRecord["created_at"]
                                    }
                                })
                            );
                        }
                    });
                });
            }


        });
    }
    /**
     * Retrieve the latest message
     */

    function retrieveLatestChatMessage(){

        var statement = `
            SELECT messengers.room_id, messengers.user_id, messengers.message, messengers.created_at, users.name
            FROM messengers
            LEFT JOIN users ON messengers.user_id = users.id
            WHERE room_id=${room_id}
            ORDER BY created_at DESC
            LIMIT 1
        `;

        // Query from the database
        db.query(statement,(error, results)=>{
            if (error) console.log(error);

            if (results) {
                //Broadcast the message to all the users in the same room
                clients.forEach((item)=>{

                    if (room_id == item.room_id){
                        item.connection.sendUTF(
                            JSON.stringify({
                            type: "chatMessage",
                            data: {
                                room_id: results[0]["room_id"],
                                user_id: results[0]["user_id"],
                                name: htmlEntity.encode(results[0]["name"]),
                                message: htmlEntity.encode(results[0]["message"]),
                                created_at: results[0]["created_at"]

                            }
                        }));
                    }
                })
            }
        });
    }
});
