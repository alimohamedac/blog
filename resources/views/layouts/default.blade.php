<!DOCTYPE html>
<html lang="en">

<head>
@include('partial.head') 
</head>

<body>
@include('partial.navbar')

  <!-- Page Content -->
  <div class="container">

    <div class="row">

    @include('partial.content')
         @include('partial.sidebar')

    </div>
    <!-- /.row -->


  </div>
  <!-- /.container -->


  <!-- Footer -->
  <footer class="py-5 bg-dark">
        @include('partial.footer')

  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
