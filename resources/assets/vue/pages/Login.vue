<template>
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui teal image header">
				<img src="http://semantic-ui.com/examples/assets/images/logo.png" class="image">
				<div class="content">
					Log-in to your account
				</div>
			</h2>
			<section class="ui large form">
				<div class="ui stacked segment">
					<div class="field">
						<div class="ui left icon input">
							<i class="user icon"></i>
							<input v-model="email" type="text" name="email" placeholder="E-mail address">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon"></i>
							<input v-model="password" type="password" name="password" placeholder="Password">
						</div>
					</div>
					<ui-button :loading="loading" class="ui fluid large teal button" @click="login()">login</ui-button>
				</div>

				<div :class="{ 'visible': error }" class="ui error message">
					Invalid username or password
				</div>

			</section>

			<div class="ui message">
				New to us? <a href="#">Sign Up</a>
			</div>
		</div>
	</div>
</template>

<script>
	import UiButton from 'keen/UiButton.vue';
	import store from 'Store';

	export default {
		name: 'login',
		data() {
			return {
				email: '',
				password: '',
				loading: false,
				error: false
			}
		},
		methods: {
			login() {
				this.loading = true;
				this.error = false;
				$.post('/api/login', { email: this.email, password: this.password })
					.done(this.authenticated.bind(this))
					.fail(this.failure.bind(this))
					.always(() => { this.loading = false; });
			},
			failure(res) {
				this.error = true;
			},
			authenticated(user) {
				this.$store.dispatch('LOGIN', user);
				this.$dispatch('toast', { message: `Welcome ${user.fname} ${user.lname}` });
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