<template>
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui red image header">
				<img src="/icons/logo-128.png" class="image">
				<div class="content">
					Register your account
				</div>
			</h2>
			<section class="ui large form" :class="{ 'loading': loading }">
				<div class="ui stacked segment">
					<div class="field">
						<div class="ui left icon input">
							<i class="user icon"></i>
							<input type="text" name="fname" placeholder="First name">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="user icon"></i>
							<input type="text" name="lname" placeholder="Last name">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="mail icon"></i>
							<input type="email" name="email" placeholder="E-mail address">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon"></i>
							<input type="password" name="password" placeholder="Password">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon"></i>
							<input type="password" name="password_confirmation" placeholder="Password confirmation">
						</div>
					</div>
					<button class="ui fluid large red button">register</button>
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
			return { loading: false }
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