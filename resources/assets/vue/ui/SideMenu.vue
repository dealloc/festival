<template>
	<div class="ui sidebar inverted vertical menu">
		<a @click="close()" class="item" v-link="{ name: 'home' }">
			Home
		</a>
		<a @click="close()" v-if="login" class="item" v-link="{ name: 'login' }">
			Login
		</a>
		<a @click="logout()" v-if="!login" class="item">
			Logout
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
			},
			actions: {
				logout({dispatch}) {
					dispatch('LOGOUT');
					this.close();
					this.$router.go({ name: 'login' });
				}

			}
		},
		store
	}
</script>

<style lang="sass" scoped>
</style>