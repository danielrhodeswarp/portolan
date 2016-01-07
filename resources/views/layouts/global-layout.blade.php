<!DOCTYPE html>
<html>
<head>
<title>Portolan - @yield('title')</title>
<link rel="stylesheet" href="/foundation-6/css/foundation.css">
<link rel="stylesheet" href="/foundation-6/css/app.css">
@stack('styles')
</head>
<body>
<div class="content">
    @yield('content')
</div>
<script src="/foundation-6/js/vendor/jquery.min.js"></script>
<script src="/foundation-6/js/vendor/what-input.min.js"></script>
<script src="/foundation-6/js/foundation.min.js"></script>
<script src="/foundation-6/js/app.js"></script>
@stack('scripts')
</body>
</html>