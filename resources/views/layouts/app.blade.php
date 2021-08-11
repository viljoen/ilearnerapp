<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/imessenger.css')}}">
        <link rel="stylesheet" href="{{ asset('css/ilearner.css')}}">

        @trixassets
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.socket.io/4.1.2/socket.io.min.js" integrity="sha384-toS6mmwu70G0fw54EGlWWeA4z3dyJ+dlXBtSURSKN4vyRFOcxd3Bzjj/AoOwY+Rg" crossorigin="anonymous"></script>
        <script src="{{asset('js/imessenger.js')}}"></script>
        <script src="{{ asset('js/ilearner.js')}}"></script>


    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class = "event-notification-box
                fixed right-0 top-0
                text-white text-center text-base
                bg-indigo-600
                mt-3 mr-3 px-6 py-3 rounded-l-md
                shadow-md
                transform duration-700 opacity-0">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                    </div>
                </div>

                {{$slot}}
                @livewire('messengers')
                @livewire('chats')
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/socket.js') }}"></script>
        @stack('chat-websocket')
        <script>
            /**
             * Instantiate Connection
             */
            var connection = clientSocket({});


                /**
                 * event listener that will be dispatched
                 * to the WebSocket server
                 */

            window.addEventListener('event-notification', event => {
                connection.send(JSON.stringify({
                    eventName: event.detail.eventName,
                    eventMessage: event.detail.eventMessage
                }));
            });

            /**
             * When the connection is open
             */
            connection.onopen = function(){
                console.log("Connection was opened by the server!");
            }

            connection.onclose = function(){
                console.log("Connection was closed by the server!");
                console.log("Reconnecting after 3 seconds...")
                setTimeout(() => {
                window.location.reload();
                },3000);

            }

            /**
             * This will receive messages from the websocket
             */
            connection.onmessage = function (message){
                var result = JSON.parse(message.data);
                //console.log(result);
                var notificationMessage = `
                    <h3>${result.eventName} </h3>
                    <p>${result.eventMessage}</p>
                `;

                //Begin animation for the popup
                $(".event-notification-box").html(notificationMessage);
                $(".event-notification-box").removeClass("opacity-0");
                $(".event-notification-box").addClass("opacity-100");

                //Hide message after 8 seconds
                setTimeout(() => {
                    $(".event-notification-box").removeClass("opacity-100");
                    $(".event-notification-box").addClass("opacity-0");
                },8000);
            }


        </script>


    </body>
</html>
