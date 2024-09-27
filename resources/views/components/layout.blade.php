<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.navbarPengunjung')
  @include('partials.head')
  @include('partials.font')
</head>
<body>
  {{ $slot }}
</body>

@include('partials.footerPengunjung')
</html>


