<html>
    <head>
        @livewireStyles
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
        {{ $slot }}

        @livewireScripts
    </body>
</html>