<template>
	<div class="card">
		<div class="blurring dimmable image" v-el:image>
			<div class="ui dimmer">
				<div class="content">
					<div class="center">
						<i class="big icon wait"></i> {{ when }}
					</div>
				</div>
			</div>
			<img src="http://semantic-ui.com/images/avatar/large/elliot.jpg">
		</div>
		<div class="content">
			<a class="center-aligned header">{{ title }}</a>
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

<style scoped>
	.center-aligned.header { text-align: center; }
</style>