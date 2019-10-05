<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #2a2d32;
            color: #fff;
            font-family: sans-serif;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .btn-discord {
            display: flex;
            align-items: center;
            background-color: #7289da;
            padding: 5px 60px;
            border-radius: 5px;
            border-bottom: 5px #3d4a75 solid;
            height: 45px;
        }

        a.btn-discord {
            color: #fff;
            text-decoration: none;
            overflow: hidden;
            position: relative;
        }

        a.btn-discord {
            overflow: hidden;
            position: relative;
            transition: ease-in-out 0.4s;
        }

        .btn-discord:hover {
            background-color: #3d4a75;
            border-bottom-color: #7289da;
        }

        .btn-discord svg {
            height: 30px;
            width: 30px;
            transition: ease-in-out 0.4s;
            position: absolute;
            left: 0;
        }

        a.btn-discord:hover svg {
            overflow: hidden;
            opacity: 0.2;
            transform: scale(9,9);
        }

        a.btn-discord .discord-logo {
            height: 30px;
            width: 30px;
            position: relative;
            margin-right: 15px;
        }

        a.btn-discord div:not(.discord-logo) {

        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <a href="{{ route('login.discord') }}" class="btn-discord">
            <div class="discord-logo">
                <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 240">
                    <style>.st0 {
                            fill: #FFFFFF;
                        }</style>
                    <path class="st0"
                          d="M104.4 103.9c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1.1-6.1-4.5-11.1-10.2-11.1zM140.9 103.9c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1s-4.5-11.1-10.2-11.1z"/>
                    <path class="st0"
                          d="M189.5 20h-134C44.2 20 35 29.2 35 40.6v135.2c0 11.4 9.2 20.6 20.5 20.6h113.4l-5.3-18.5 12.8 11.9 12.1 11.2 21.5 19V40.6c0-11.4-9.2-20.6-20.5-20.6zm-38.6 130.6s-3.6-4.3-6.6-8.1c13.1-3.7 18.1-11.9 18.1-11.9-4.1 2.7-8 4.6-11.5 5.9-5 2.1-9.8 3.5-14.5 4.3-9.6 1.8-18.4 1.3-25.9-.1-5.7-1.1-10.6-2.7-14.7-4.3-2.3-.9-4.8-2-7.3-3.4-.3-.2-.6-.3-.9-.5-.2-.1-.3-.2-.4-.3-1.8-1-2.8-1.7-2.8-1.7s4.8 8 17.5 11.8c-3 3.8-6.7 8.3-6.7 8.3-22.1-.7-30.5-15.2-30.5-15.2 0-32.2 14.4-58.3 14.4-58.3 14.4-10.8 28.1-10.5 28.1-10.5l1 1.2c-18 5.2-26.3 13.1-26.3 13.1s2.2-1.2 5.9-2.9c10.7-4.7 19.2-6 22.7-6.3.6-.1 1.1-.2 1.7-.2 6.1-.8 13-1 20.2-.2 9.5 1.1 19.7 3.9 30.1 9.6 0 0-7.9-7.5-24.9-12.7l1.4-1.6s13.7-.3 28.1 10.5c0 0 14.4 26.1 14.4 58.3 0 0-8.5 14.5-30.6 15.2z"/>
                </svg>
            </div>
            <div>
                Login With Discord
            </div>
        </a>
    </div>
</div>
</body>
</html>
