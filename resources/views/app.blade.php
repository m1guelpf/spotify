<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!--[if IE]><link rel="icon" type="image/png" href="/favicon.png"><![endif]-->
    <title>Spotify</title>
    <link rel="manifest" href="manifest.json">
    <link rel="icon" type="image/png" sizes="196x196" href="/favicon.png">
    <meta name="theme-color" content="#4DBA87">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Spotify">
    <link rel="apple-touch-icon" href="/favicon.png">
    <link rel="mask-icon" href="/img/icons/safari-pinned-tab.svg" color=#38B2AC>
    <meta name="msapplication-TileImage" content="/favicon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    @routes
    <script type="text/javascript">
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function () {
                navigator.serviceWorker.register('/sw.js');
            });
        }
    </script>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body>
    @inertia
</body>
</html>
