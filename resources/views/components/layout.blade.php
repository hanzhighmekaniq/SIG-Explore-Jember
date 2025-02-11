<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    @include('partials.font')
</head>
<div class="fixed top-0 left-0 w-full bg-white shadow-lg z-50">
    @include('partials.navbarPengunjung')
</div>

<body>

    {{ $slot }}
</body>

@include('partials.footerPengunjung')

</html>
