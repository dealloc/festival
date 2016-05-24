<template>
	<div class="ui sidebar inverted vertical menu">
		<a @click="close()" class="item" v-link="{ name: 'home' }">
			Home
		</a>
		<a @click="close()" class="item" v-link="{ name: 'login' }">
			Login
		</a>
	</div>
</template>

<script>
	export default {
		methods: {
			close() {
				$(this.$el).sidebar('hide');
			}
		}
	}
</script>

<style lang="sass" scoped>
</style>