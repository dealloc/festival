<!DOCTYPE html>
<html lang="en" manifest="{{ asset('/application.manifest') }}">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Wannes Gennar">
		<link rel="manifest" href="{{ asset('/manifest.json') }}">
		<meta name="theme-color" content="#A90D16">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<link rel="apple-touch-startup-image" href="{{ asset('/icons/icon.png') }}">
		<link rel="apple-touch-icon" href="{{ asset('/icons/icon.png') }}">
		<link rel="icon" sizes="192x192" href="{{ asset('/icons/logo-192.png') }}">
		<title>EHB rock</title>
	</head>
	<body>
		<side-menu></side-menu>
		<div class="pusher">
			<div class="ui top attached demo menu">
				<a class="item" data-menu-toggle>
					<i class="sidebar icon"></i>
					Menu
				</a>
			</div>

			<router-view></router-view>
			<ui-snackbar-container></ui-snackbar-container>
		</div>
		<link rel="stylesheet" href="{{ asset('/vendor/semantic/dist/semantic.min.css') }}" property="stylesheet">
		<script type="text/javascript" src="{{ asset('/vendor/jquery/dist/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/vendor/semantic/dist/semantic.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/js/app.min.js') }}" async></script>
	</body>
</html>