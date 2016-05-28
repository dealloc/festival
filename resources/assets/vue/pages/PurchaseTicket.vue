<template>
	<div class="ui centered grid container">
		<div class="doubling eight column row">
			<div class="ui three steps">
				<div class="step" :class="{ 'active': first, 'completed': !first }">
					<i class="user icon"></i>
					<div class="content">
						<div class="title">Administration</div>
						<div class="description">Enter personal information</div>
					</div>
				</div>
				<div class="step" :class="{ 'active': second, 'completed': step>2 }">
					<i class="payment icon"></i>
					<div class="content">
						<div class="title">Billing</div>
						<div class="description">Enter billing information</div>
					</div>
				</div>
				<div class="step" :class="{ 'active': third, 'completed': step>3 }">
					<i class="shop icon"></i>
					<div class="content">
						<div class="title">Purchase</div>
						<div class="description">View purchase details</div>
					</div>
				</div>
			</div>
		</div>
		<div class="doubling eight column row">
			<div class="ui segment form" v-if="first">
				<h4 class="ui dividing header">Shipping Information</h4>
				<div class="field">
					<label>Name</label>
					<div class="two fields">
						<div class="field">
							<input type="text" name="firstname" placeholder="First Name">
						</div>
						<div class="field">
							<input type="text" name="lastname" placeholder="Last Name">
						</div>
					</div>
				</div>
				<div class="field">
					<label>Billing Address</label>
					<div class="fields">
						<div class="twelve wide field">
							<input type="text" name="address" placeholder="Street Address">
						</div>
						<div class="four wide field">
							<input type="text" name="house" placeholder="Apt #">
						</div>
					</div>
				</div>
				<div class="ui basic blue animated button" @click="validateFirst()">
					<div class="visible content">Next step</div>
					<div class="hidden content">
						<i class="right arrow icon"></i>
					</div>
				</div>
			</div>
			<div class="ui segment form" v-if="second">
				<h4 class="ui dividing header">Billing information</h4>
				<div class="field">
					<label>Card Type</label>
					<div class="ui selection dropdown">
						<input type="hidden" name="card[type]">
						<div class="default text">Type</div>
						<i class="dropdown icon"></i>
						<div class="menu">
							<div class="item" data-value="visa">
								<i class="visa icon"></i>
								Visa
							</div>
							<div class="item" data-value="amex">
								<i class="amex icon"></i>
								American Express
							</div>
							<div class="item" data-value="discover">
								<i class="discover icon"></i>
								Discover
							</div>
						</div>
					</div>
				</div>
				<div class="fields">
					<div class="seven wide field">
						<label>Card Number</label>
						<input type="text" name="card[number]" maxlength="16" placeholder="Card #">
					</div>
					<div class="three wide field">
						<label>CVC</label>
						<input type="text" name="card[cvc]" maxlength="3" placeholder="CVC">
					</div>
					<div class="six wide field">
						<label>Expiration</label>
						<div class="two fields">
							<div class="field">
								<select class="ui fluid search dropdown" name="card[expire-month]">
									<option value="">Month</option>
									<option value="1">January</option>
									<option value="2">February</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
							</div>
							<div class="field">
								<input type="text" name="card[expire-year]" maxlength="4" placeholder="Year">
							</div>
						</div>
					</div>
				</div>
				<!--------------------->
				<div class="ui basic red animated button" @click="previous()">
					<div class="visible content">Previous step</div>
					<div class="hidden content">
						<i class="left arrow icon"></i>
					</div>
				</div>
				<div class="ui basic blue animated button" @click="validateSecond()">
					<div class="visible content">Next step</div>
					<div class="hidden content">
						<i class="right arrow icon"></i>
					</div>
				</div>
			</div>
			<div class="ui segment" v-if="third">
				<h4 class="ui dividing header">Overview</h4>
				<div class="row">
					An amount of <b>$50</b> will be subtracted from your account.
				</div>
				<div class="row">
					By clicking purchase you agree to the <a>terms and agreements</a>
				</div>
				<br>
				<div class="ui basic red animated button" @click="previous()">
					<div class="visible content">Previous step</div>
					<div class="hidden content">
						<i class="left arrow icon"></i>
					</div>
				</div>
				<div class="ui basic blue animated button" @click="generateTicket()">
					<div class="visible content">Purchase</div>
					<div class="hidden content">
						<i class="shop icon"></i>
					</div>
				</div>
			</div>
			<div class="ui segment" v-if="completed">
				<i>show the QR code of the ticket</i>
			</div>
		</div>
		<div class="row">
			<div class="ui negative message">
				<div class="header">
					Whoops, we can't proceed just yet
				</div>
				<p>Make sure you filled everything correctly.</p>
			</div>
		</div>
		<div class="ui active inverted dimmer" v-if="loading">
			<div class="ui text loader">it's still faster than <strong><i>you</i></strong> could draw it</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'ticket-purchase',
		ready() {
			this.$watch('step', function() {
				$('.ui.dropdown').dropdown();
			});
		},
		data() {
			return {
				step: 1,
				loading: false
			}
		},
		computed: {
			first() {
				return (this.step === 1);
			},
			second() {
				return (this.step === 2);
			},
			third() {
				return (this.step === 3);
			},
			complete() {
				return (this.step === 4);
			}
		},
		methods: {
			previous() {
				this.step--;
			},
			validateFirst() {
				this.loading = true;
				$.get('/api').then(() => {
					this.loading = false;
					this.step++;
				});
			},
			validateSecond() {
				this.loading = true;
				$.get('/api').then(() => {
					this.loading = false;
					this.step++;
				});
			},
			generateTicket() {
				$.post('/api/tickets').then(() => {
					this.loading = false;
					this.step++;
				});
			}
		}
	}
</script>

<style lang="sass" scoped>
	.container>div:first-child {
		margin-top: 1vh;
	}
	.ui.segment {
		width: 100%;
		max-width: 650px;
	}
</style>