<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Laravel 12 App')</title>
<link rel="stylesheet" href="{{ asset('../resources/css/app.css') }}">
<link rel="stylesheet" href="{{ asset('../resources/css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('../resources/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<link rel="icon" href="images/favicon.svg" type="image/svg">
</head>
<body class="bg-gray-100">

@include('partials.nav')

<main class="container mx-auto mt-6">
    @yield('content')
</main>
    <script src="js/jquery.min.js"></script>
<script src="{{ asset('../resources/js/app.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<!-- Buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<!-- PDF Dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
</body>
</html>