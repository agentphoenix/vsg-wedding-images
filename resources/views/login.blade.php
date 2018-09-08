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

			{{-- <form method="POST" action="{{ route('authenticate') }}" class="block w-full px-6">
				@csrf

				<sign-in-fields></sign-in-fields>

				<div>
					<button type="submit" class="rounded w-full p-4 bg-guava-dark text-white font-medium text-sm uppercase tracking-wide hover:bg-guava">Sign In</button>
				</div>

				{{ svg_spritesheet() }}
			</form> --}}

			<div class="text-lg leading-normal">
				<p class="mb-6">Dear family and friends,</p>

				<p>We had hoped to provide a fun way to share your photos with us from this weekend through this website. Unfortunately, due to some technical issues out of our control, the image uploads won't work on iOS this weekend. We sincerely apologize for this and look forward to seeing your pictures and videos from the weekend!</p>
			</div>
		</div>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
	<script>
		window.App = new CreateApp();

		App.run();
	</script>
</body>
</html>
