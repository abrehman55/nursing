<!DOCTYPE html>
<html lang="en">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Thank you</title>
	<!-- base:css -->
	<link rel="stylesheet" href="{{asset('panel/vendors/ti-icons/css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('panel/vendors/css/vendor.bundle.base.css')}}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- endinject -->

	<!-- plugin css for this page -->
	<link rel="stylesheet" href="{{asset('panel/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('panel/css/layout/style.css')}}">
	<!-- endinject -->
	<link rel="shortcut icon" href="{{asset('panel/images/favicon.png')}}" />

	@yield('styles')
</head>



<body>
	<div class="breadcrumb-option">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb__links">
						

					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="shop-cart spad">

		<h4 align="center">Your Verification Code is</h4>
		<h1 align="center">{{$code}}</h1>


	</section>
	<!-- container-scroller -->
	<!-- base:js -->
	<script src="{{asset('panel/vendors/js/vendor.bundle.base.js')}}"></script>
	<!-- endinject -->
	<!-- Plugin js for this page-->
	<!-- End plugin js for this page-->
	<!-- inject:js -->
	<script src="{{asset('panel/js/off-canvas.js')}}"></script>
	<script src="{{asset('panel/js/hoverable-collapse.js')}}"></script>
	<script src="{{asset('panel/js/template.js')}}"></script>
	<script src="{{asset('panel/js/settings.js')}}"></script>
	<script src="{{asset('panel/js/todolist.js')}}"></script>

	<!-- Optional: include a polyfill for ES6 Promises for IE11 -->

	<!-- endinject -->
	<!-- plugin js for this page -->
	<script src="{{asset('panel/vendors/datatables.net/jquery.dataTables.js')}}"></script>
	<script src="{{asset('panel/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
	<!-- End plugin js for this page -->
	<!-- Custom js for this page-->
	<script src="{{asset('panel/js/data-table.js')}}"></script>

	<!-- End custom js for this page-->



	@yield('scripts')
</body>


</html>