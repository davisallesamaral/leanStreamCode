<!DOCTYPE html> 
<html lang="en"> 
<head>
  <link href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="{{ asset('assets/css/dashboard-new.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/ui.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/ui.css') }}" rel="stylesheet">
  	<!-- Theme -->
	<link id="theme" href="{{ asset('assets/css/themes/theme-default.css') }}" rel="stylesheet" type="text/css">
	<!-- Fonts -->
	<link href="{{ asset('vendor/fonts/font-awesome.min.css') }}" rel="stylesheet">

 </head>
<body>


<ol class="breadcrumb">
  <li><a href="/apiNewsToronto">News from Toronto (API)</a></li>
  <li><a href="/torontoNews/">News from Toronto</a></li>
  <li><a href="/apiWeather">Weather report</a></li>
  <li><a href="/GetUSADolar">Exchange rate information</a></li>
</ol> 
<!-- Basic dropdown -->

 @yield('container')

     

  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	<!-- List.js -->
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

	<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
	</script>

<script src="{{ asset('vendor/js/required.min.js') }}"></script>
	<script src="{{ asset('assets/js/quarca.js') }}"></script>
	
	<!-- Drag & Drop -->
	<script src="{{ asset('vendor/plugins/others/underscore/underscore-min.js') }}"></script>
	<script src="{{ asset('vendor/jqueryui/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('vendor/jqueryui/jquery.ui.touch-punch.min.js') }}"></script>
	<script src="{{ asset('vendor/plugins/ui/gridstack/gridstack.min.js') }}"></script>

  <script src="{{ asset('vendor/plugins/charts/flot/jquery.flot.min.js') }}"></script>
	<script src="{{ asset('vendor/plugins/charts/flot/jquery.flot.resize.min.js') }}"></script>
	<script src="{{ asset('vendor/plugins/charts/flot/jquery.flot.tooltip.min.js') }}"></script>
	<script src="{{ asset('vendor/plugins/charts/flot/jquery.flot.pie.min.js') }}"></script>
	<script src="{{ asset('vendor/plugins/charts/flot/jquery.flot.time.min.js') }}"></script>
  <script src="{{ asset('assets/js/init/init.dashboard-new.js') }}"></script>

  </body>
</html>