<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ assets('img/favicon.ico') }}" type="image/x-icon">
    <title>@yield('title')</title>
    {{ csrfMetaTag() }}
    @stack('head')
    @stack('meta')
    @stack('css')
</head>

<body>
    <div id="base-layout">@yield('base')</div>
    <script src="{{ assets('bundles/index.bundle.js') }}"></script>
    @stack('js')
</body>

</html>
