<template>
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui red image header">
				<img src="/icons/logo-128.png" class="image">
				<div class="content">
					Log in to your account
				</div>
			</h2>
			<section class="ui large form">
				<div class="ui stacked segment">
					<div class="field">
						<div class="ui left icon input">
							<i class="mail icon"></i>
							<input v-model="email" type="text" name="email" placeholder="E-mail address">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon"></i>
							<input v-model="password" type="password" name="password" placeholder="Password">
						</div>
					</div>
					<ui-button :loading="loading" class="ui fluid large red button" @click="authenticate()">login</ui-button>
				</div>

			</section>

			<div class="ui message">
				Don't have an account? <a v-link="{ name: 'registration' }">Sign Up</a>
			</div>
		</div>
	</div>
</template>

<script>
	import UiButton from 'keen/UiButton.vue';
	import { store } from 'Store';

	export default {
		name: 'login',
		data() {
			return {
				email: '',
				password: '',
				loading: false
			}
		},
		methods: {
			authenticate() {
				this.loading = true;
				$.post('/api/login', { email: this.email, password: this.password })
					.done(this.authenticated.bind(this))
					.fail(this.failure.bind(this))
					.always(() => { this.loading = false; });
			},
			failure(res) {
				this.$dispatch('toast', { message: 'Invalid username or password' });
			},
			authenticated(user) {
				this.$store.dispatch('LOGIN', user);
				this.$dispatch('toast', { message: `Welcome ${user.fname} ${user.lname}` });
				this.$router.go({ name: 'home' });
			}
		},
		components: {
			UiButton
		},
		store
	}
</script>

<style lang="sass" scoped>
	.grid {
		min-height: 100vh;
	}
	.image {
		margin-top: -100px;
	}
	.column {
		max-width: 450px;
	}
	@media only screen and (max-width: 991px) and (min-width: 768px)
	{
		.column {
			transform: translateY(-50%);
		}
	}
</style>