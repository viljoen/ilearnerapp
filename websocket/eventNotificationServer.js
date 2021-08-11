var WebsocketServer = require("websocket").server;
var http = require("http");
var htmlEntity = require("html-entities");
var PORT = 3280;

//list of currently connected clients
var clients = [];

//Create http server
var server = http.createServer();

server.listen(PORT, function () {
    console.log("Event Notifications Server listening on port:" + PORT);
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

    /**
     * pass each connection instance
     */

    var index = clients.push(connection) - 1;
    console.log('Client', index, "connected");

    /**
     * This is where we send the message to all the connected clients
     */
    connection.on("message", function (message) {
       //console.log(message);
        var utf8Data = JSON.parse(message.utf8Data);

        if (message.type === 'utf8'){

            //prepare the json data to be sent to all currently connected client applications
            var obj = JSON.stringify({
               eventName: htmlEntity.encode(utf8Data.eventName),
               eventMessage: htmlEntity.encode(utf8Data.eventMessage),
            });

            //send message to all clients
            for (let i = 0; i < clients.length; i++) {
                clients[i].sendUTF(obj);
            }
        }
    });

    /**
     * When the client closes it's connection to the server
     *
     */
    connection.on("close", function(connection){
        clients.splice(index, 1);
        console.log("Client", index, "was disconnected");
    });
});
