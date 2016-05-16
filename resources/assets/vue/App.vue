<template>
	<div class="app">
		<h1>{{ message }}</h1>
	</div>
</template>

<style lang="sass" scoped>
	.app
	{
		color: red;
	}
</style>

<script>
	export default {
		data: function() {
			return { message: 'Hello world' }
		}
	}
</script>