<template>
	<div class="card">
		<div class="blurring dimmable image" v-el:image>
			<div class="ui dimmer">
				<div class="content">
					<slot></slot>
				</div>
			</div>
			<img src="http://semantic-ui.com/images/avatar/large/elliot.jpg">
		</div>
		<div class="content">
			<a class="header">{{ title }}</a>
			<div class="meta">
				<span class="date">{{ when }}</span>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['title', 'when'],
		ready() {
			$(this.$els.image).dimmer({ on: 'hover' });
		}
	}
</script>

<style lang="sass" scoped>
</style>