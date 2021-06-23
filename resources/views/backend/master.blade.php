<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@include('backend.elements.head')
</head>
<body>
	<div id="wrapper">
		<!-- Navigation -->
		<nav class="navbar navbar-expand-md fixed-top navbar-dark">
			@include('backend.elements.top_nav')
			<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
			@include('backend.elements.sidebar')
		</nav>
	  <div id="page-wrapper">
		  <div class="container-fluid ">
				@yield('content')
		  </div>
		  <!-- /.container-fluid -->
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	@include('backend.elements.script')
</body>
</html>