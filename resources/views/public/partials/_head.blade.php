<meta charset="utf-8" />

<link rel="icon" href="{{ url('') }}/front/images/logo/queen.ico" />

<meta name="csrf-token"content="{{ csrf_token() }}">

<title>@yield('title') | {{ env('APP_NAME') }}</title>
<meta name="description" content="@yield('description')">

<!--Overflow hidden pour mobile-->
<meta content="width=device-width, initial-scale=1" name="viewport" />

<!--Meta for FACEBOOK or ANYONE-->
<meta property="og:title" content="Apie De Lop - Le Rucher Du Loup">
<meta property="og:description"
    content="Morgan Jaubert Apiculteur Récoltant - Miel des Alpes du sud - Hautes-Alpes - Provence">
<meta property="og:image" content="{{ url('') }}/front/images/miellerie/firstview.jpg">
<meta property="og:url" content="{{ url('') }}/">



<!--Cookies style-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/cookie-consent/css/cookie-consent.css') }}">
<!--fontawesome-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


<!--JS -->
<script src="{{ url('') }}/front/js/jquery3.3.1.js" defer></script>
<script src="{{ url('') }}/front/js/main.js" defer></script>

@vite('resources/js/app.js')
<!--CSS-->

<link rel="stylesheet" href="{{ url('') }}/css/bootstrap.css">
<link rel="stylesheet" href="{{ url('') }}/front/css/styles.css">
<!-- Fonts -->
@yield('stylesheet')
@yield('link')
