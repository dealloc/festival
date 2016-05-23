<!DOCTYPE html>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<body>
	<div class="ui sidebar inverted vertical menu">
		<a class="item" v-link="{ path: '/' }">
			1
		</a>
		<a class="item" v-link="{ path: '/' }">
			2
		</a>
		<a class="item" v-link="{ path: '/' }">
			3
		</a>
	</div>
	<div class="pusher">
		<div class="ui top attached demo menu">
			<a class="item" data-menu-toggle>
				<i class="sidebar icon"></i>
				Menu
			</a>
		</div>

		<router-view></router-view>
	</div>
	<link rel="stylesheet" href="{{ asset('/vendor/semantic/dist/semantic.min.css') }}" property="stylesheet">
	<script type="text/javascript" src="{{ asset('/vendor/jquery/dist/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/vendor/semantic/dist/semantic.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/app.min.js') }}" async></script>
</body>