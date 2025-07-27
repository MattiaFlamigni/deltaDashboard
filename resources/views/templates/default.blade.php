<!doctype html>
<html lang="en">
<head>
    <x-header/>
</head>

<body>

<x-navbar/>

<main role="main" class="container">

   @yield("content")

</main><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Bootstrap JS (Bundle = Popper + JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
