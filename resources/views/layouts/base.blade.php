<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('meta')
    <title>@yield('title')</title>
    @stack('css')
</head>

<body>
    <div id="base">@yield('content')</div>
    <script src="{{ assets('bundles/index.bundle.js') }}"></script>
    @stack('js')
</body>

</html>
