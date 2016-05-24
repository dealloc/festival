<template>
	<div class="ui sidebar inverted vertical menu">
		<a @click="close()" class="item" v-link="{ name: 'home' }">
			Home
		</a>
		<a @click="close()" v-if="login" class="item" v-link="{ name: 'login' }">
			Login
		</a>
	</div>
</template>

<script>
	import store from 'Store';

	export default {
		methods: {
			close() {
				$(this.$el).sidebar('hide');
			}
		},
		vuex: {
			getters: {
				login: function(state) {
					return (!state.authenticated);
				}
			}
		},
		store
	}
</script>

<style lang="sass" scoped>
</style>