<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Styles -->
	<link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-grey-lighter font-sans text-grey-darkest">
	<div id="app" class="flex flex-col justify-center h-screen w-full">
		<div class="w-full mx-auto px-4 py-6">
			<div class="block w-full">
				<h1 class="text-center title">Leah &amp; David</h1>
				<div class="text-center subtitle">9.8.18</div>
			</div>

			<div class="block w-4/5 mx-auto text-center my-8">
				@svg('monogram', 'h-32 w-32 fill-current text-guava-dark')
			</div>

			@if (session('error'))
				<div class="px-6 mb-4">
					<div class="p-4 rounded border-2 border-guava-light bg-guava-lightest text-guava-dark">
						{{ session('error') }}
					</div>
				</div>
			@endif

			<form method="POST" action="{{ route('authenticate') }}" class="block w-full px-6">
				@csrf

				<sign-in-fields></sign-in-fields>

				<div>
					<button type="submit" class="button is-primary is-block">Sign In</button>
				</div>

				{{ svg_spritesheet() }}
			</form>
		</div>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
	<script>
		window.App = new CreateApp();

		App.run();
	</script>
</body>
</html>
