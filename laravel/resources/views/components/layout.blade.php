@props(['titre' => 'Fest X'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $titre }}</title>
    <link rel="stylesheet" href="https://use.typekit.net/qus4wij.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Google tag (gtag.js) -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y16B4EYYF1"></script> --}}
    {{-- <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Y16B4EYYF1');
    </script> --}}
</head>

<body>

    {{ $slot }}
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>

</html>
