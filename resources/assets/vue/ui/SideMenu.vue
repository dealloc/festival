<template>
	<div class="ui sidebar inverted vertical menu">
		<a @click="close()" class="item" v-link="{ name: 'home' }">
			Home
		</a>
		<a @click="close()" class="item" v-link="{ name: 'lineup' }">
			Artists
		</a>
		<a @click="close()" class="item" v-link="{ name: 'tickets' }">
			Tickets
		</a>
		<a @click="close()" v-if="!auth" class="item" v-link="{ name: 'login' }">
			Login
		</a>
		<a @click="close()" v-if="!auth" class="item" v-link="{ name: 'registration' }">
			Register
		</a>
		<a @click="logout()" v-if="auth" class="item">
			Logout
		</a>
		<a @click="close()" class="item" v-link="{ name: 'contact' }">
			Contact
		</a>
	</div>
</template>

<script>
	import { store, vuex } from 'Store';

	export default {
		methods: {
			close() {
				$(this.$el).sidebar('hide');
			}
		},
		vuex,
		store
	}
</script>

<style lang="sass" scoped>
</style>