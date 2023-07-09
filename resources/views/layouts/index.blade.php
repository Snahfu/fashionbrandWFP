<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>@yield('judul')</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/vendors/images/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/vendors/images/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/vendors/images/favicon-16x16.png') }}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/style.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Global site tag (gtag.js') }}) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	@yield('style')
</head>
<body>
	{{-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{ asset('assets/vendors/images/deskapp-logo.svg') }}" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> --}}

	@include('layouts.header')

	@include('layouts.sidebar')



	<div class="main-container">
		<div class="pd-ltr-20 pb-10">
			@yield('konten')
		</div>
	</div>
	<!-- js -->
	<script src="{{ asset('assets/vendors/scripts/core.js') }}"></script>
	<script src="{{ asset('assets/vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('assets/vendors/scripts/process.js') }}"></script>
	<script src="{{ asset('assets/vendors/scripts/layout-settings.js') }}"></script>
	{{-- <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script> --}}
	<script src="{{ asset('assets/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
	<!-- Datatable Buttons -->
	<script src="{{ asset('assets/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables/js/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables/js/pdfmake.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables/js/vfs_fonts.js') }}"></script>
	<!-- Datatable Setting js -->
	<script src="{{ asset('assets/vendors/scripts/datatable-setting.js') }}"></script>
	{{-- <script src="{{ asset('assets/vendors/scripts/dashboard.js') }}"></script> --}}
	<script src="{{ asset('assets/vendors/scripts/jquery.editable.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
	<script src="{{ asset('assets/vendors/scripts/advanced-components.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
	{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
	{{-- <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> --}}
	@include('sweetalert::alert')
	@yield('javascript')
</body>
</html>