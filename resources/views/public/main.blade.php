<!DOCTYPE html>
<html lang="fr">

<head>
    @include('public.partials._head')
</head>

<body>

    @include('public.partials._navbar')


    @include('public.partials._messages')

    @yield('content')



    @include('public.partials._footer')

    @include('public.partials._javascript')


    @yield('scripts')

</body>

</html>
