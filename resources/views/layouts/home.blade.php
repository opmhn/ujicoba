<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>BERITA</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('back/img/icon.ico') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('back/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('back/assets/css/fonts.min.css') }}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('back/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('back/css/atlantis.min.css') }}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('back/css/demo.css') }}">
</head>
<body>
	<div class="wrapper">
@include('includedes.header')
		<!-- Sidebar -->
 @include('includedes.sidebar')		
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				@yield('content')
			</div>
            {{-- footer --}}
			@include('includedes.footer')
		</div>
	</div>
    @include('includedes.js')
	@include('sweetalert::alert')
</body>
</html>