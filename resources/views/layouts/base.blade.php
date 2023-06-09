<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @stack('meta')
    @stack('css')
    @stack('head')
</head>

<body>
    @stack('body-prepend')
    <div id="base">@yield('content')</div>
    @stack('body-append')

    <script src="{{ assets('bundles/index.bundle.js') }}"></script>
    @stack('js')
</body>

</html>
