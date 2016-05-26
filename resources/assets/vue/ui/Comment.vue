<template>
	<div class="comment">
		<a class="avatar">
			<img src="http://semantic-ui.com/images/avatar/small/stevie.jpg">
		</a>
		<div class="content">
			<a class="author">Stevie Feliciano</a>
			<div class="metadata">
				<div class="date">2 days ago</div>
			</div>
			<div class="text">
				Hey guys, I hope this example comment is helping you read this documentation.
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'comment',
		props: ['comment']
	}
</script>

<style lang="sass" scoped>
</style>