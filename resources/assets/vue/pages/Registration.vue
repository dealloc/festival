<template>
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui red image header">
				<img src="/icons/logo-128.png" class="image">
				<div class="content">
					Register your account
				</div>
			</h2>
			<section class="ui large form" :class="{ 'loading': loading, 'error': error }">
				<div class="ui stacked segment">
					<div class="field">
						<div class="ui left icon input">
							<i class="user icon"></i>
							<input v-model="fname" type="text" name="fname" placeholder="First name">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="user icon"></i>
							<input v-model="lname" type="text" name="lname" placeholder="Last name">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="mail icon"></i>
							<input v-model="email" type="email" name="email" placeholder="E-mail address">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon"></i>
							<input v-model="password" type="password" name="password" placeholder="Password">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon"></i>
							<input v-model="password_confirm" type="password" name="password_confirmation" placeholder="Password confirmation">
						</div>
					</div>
					<button class="ui fluid large red button" @click="register()">register</button>
				</div>

				<div class="ui error message">
					<div class="header">We couldn't register you</div>
					<ul class="list">
						<li v-for="message in error">
							{{ message }}
						</li>
					</ul>
				</div>
			</section>

			<div class="ui message">
				Already have an account? <a v-link="{ name: 'login' }">Sign in</a>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'registration',
		data() {
			return {
				loading: false,
				error: false,
				fname: '',
				lname: '',
				email: '',
				password: '',
				password_confirm: ''
			}
		},
		methods: {
			register() {
				this.loading = true;
				$.post('/api/register', {
					email   : this.email,
					fname   : this.fname,
					lname   : this.lname,
					password: this.password,
					password_confirmation: this.password_confirm
				})
				.then(this.registered.bind(this))
				.fail(this.failed.bind(this))
				.always(r => this.loading = false);
			},
			registered() {
				this.$dispatch('toast', { message: `We registered your account!` });
				this.$router.go({ name: 'login' });
			},
			failed(res) {
				this.error = res.responseJSON.reason;
				setTimeout(() => this.error = null, 3000);
			}
		}
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