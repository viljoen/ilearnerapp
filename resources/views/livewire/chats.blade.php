<div>
    <x-jet-button class="open-button btn b " wire:click="showChatPopup">Chat</x-jet-button>
        @if($this->chatPopupVisibility)
        <div>
                <div class="chat-popup">
                    <form class="form-container  rounded-md shadow-md">
                        <div>Room #: {{$roomId}}</div>
                        <label class="font-semibold">Messages </label>
                        <div
                            wire:ignore
                            id="messageBox"
                            class=" border px-3 py-2 h-64 br-gray-50
                                overflow-y-auto
                                rounded-md shadow-md "
                            style="width: 280px"></div>
                        <textarea
                                  id="message"
                                  class="focus:outline-none focus:bg-gray-100 w-full px-3 py-2 rounded-md shadow-sm"
                                  placeholder="Type message here..."
                                  wire:model="message"
                                  wire:keydown.enter.prevent="sendMessage"
                        ></textarea>
                        @error('message') <span class="error">{{$message}}</span>@enderror
                        <div>
                            <x-jet-danger-button type="button" class="btn cancel"  wire:click="closeChatPopup">Close</x-jet-danger-button>
                        </div>


                    </form>



                </div>
        </div>
        @endif
        @push('chat-websocket')
            <script>


                $(function(){
                    /**
                     * Keeps the chat message focus at the bottom
                     *
                     */
                    function keepChatboxFocusAtBottom(elementId) {
                        var element = document.getElementById(elementId);
                        element.scrollTop = element.scrollHeight;
                    }
                    /**
                     * Returns the chat message in the proper format
                     * @param {string} id
                     * @param {string} Username
                     * @param {string} message
                     */
                    function messageFormat(id, name, message){
                        let userId = "{{auth()->user()->id }}";
                        let color = id ==  userId? "bg-blue-400": "bg-green-400";
                        let alignment = id == userId? "text-right" : "text-left";

                        return `
                            <div class="grid grid-cols-1 items-center gap-0">
                                <span class="${alignment} font-semibold text-sm">${name}</span>
                                <span class="${alignment} ${color} text-sm text-green px-3 py-2 rounded-md">${message}</span>
                            </div>
                        `;

                    }
                    //Instantiate a connection
                    var chatConnection = clientSocket ({port:3281});

                    // The messageBox element
                    var messageBox = $("#messageBox");

                    //The message element
                    var message = $("#message");


                    /**
                     * when the connection is open
                     */
                    chatConnection.onopen = function(){
                        console.log("Chat connection is open");
                        //Send the information of the client user here
                        chatConnection.send(JSON.stringify({
                            type: "info",
                            data: {
                                room_id: {{$roomId}},
                                user_id: {{auth()->user()->id }}
                            }
                        }));
                    }
                    /**
                     * will receive messages from the server
                     */
                    chatConnection.onmessage = function(message){
                        var result = JSON.parse(message.data);
                        var chatMessage = result.data;

                        if (result.type == "chatMessage"){
                            messageBox.append(messageFormat(
                               chatMessage.user_id,
                                chatMessage.name,
                                chatMessage.message

                            ));

                        }

                        keepChatboxFocusAtBottom("messageBox");
                    }
                    /**
                     * Send the prompt to the web socket server
                     */
                    window.addEventListener('chat-send-message', event => {
                        console.log(event.detail);
                        chatConnection.send(JSON.stringify({
                            type: "chatMessage",
                            date: event.detail
                        }));
                    });
                    /**
                     * Reload the page
                     */
                    window.addEventListener('reload-page', event => {
                        window.location.reload();
                    });
                });
            </script>
        @endpush
</div>



