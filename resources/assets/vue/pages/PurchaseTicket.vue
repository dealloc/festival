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
							<input v-model="user.fname" type="text" name="firstname" placeholder="First Name">
						</div>
						<div class="field">
							<input v-model="user.lname" type="text" name="lastname" placeholder="Last Name">
						</div>
					</div>
				</div>
				<div class="field">
					<label>Billing Address</label>
					<div class="fields">
						<div class="twelve wide field">
							<input v-model="user.street" type="text" name="address" placeholder="Street Address">
						</div>
						<div class="four wide field">
							<input v-model="user.house" type="text" name="house" placeholder="Apt #">
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
						<input type="hidden" v-model="card.type" name="card[type]">
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
						<input type="text" v-model="card.number" name="card[number]" maxlength="16" placeholder="Card #">
					</div>
					<div class="three wide field">
						<label>CVC</label>
						<input type="text" v-model="card.cvc" name="card[cvc]" maxlength="3" placeholder="CVC">
					</div>
					<div class="six wide field">
						<label>Expiration</label>
						<div class="two fields">
							<div class="field">
								<select class="ui fluid search dropdown" v-model="card['expire-month']" name="card[expire-month]">
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
								<input type="text" v-model="card['expire-year']" name="card[expire-year]" maxlength="4" placeholder="Year">
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
			<div class="ui segment" v-if="complete">
				<h4 class="ui dividing header">Your ticket</h4>
				<p>Below is your ticket, don't lose it!</p>
				<img :src="qr" alt="The QR code of your ticket">
				<p>Return to <a v-link="{ name: 'home' }">home</a></p>
			</div>
		</div>
		<div class="row" v-if="error">
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
			console.warn('TODO: add Semantic validation to forms for client side');
			this.$watch('step', function() {
				$('.ui.dropdown').dropdown();
			});
		},
		data() {
			return {
				step: 1,
				error: false,
				loading: false,
				user: {},
				card: {},
				ticket: {}
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
			},
			qr() {
				return `https://api.qrserver.com/v1/create-qr-code/?size=500x500&data=${this.ticket.token}`;
			}
		},
		methods: {
			previous() {
				this.step--;
			},
			validateFirst() {
				this.loading = true;
				this.error = false;
				$.post('/api/user', {
					fname: this.user.fname,
					lname: this.user.lname,
					street: this.user.street,
					house: this.user.house
				}).fail(res => { this.error = true; })
				.then((res) => {
					this.step++;
				}).always(r => this.loading = false);
			},
			validateSecond() {
				this.loading = true;
				this.error = false;
				$.post('/api/payment',{card: this.card}).fail(res => { this.error = true; })
			.then((res) => {
					this.step++;
			}).always(r => this.loading = false);
			},
			generateTicket() {
				$.post('/api/tickets').then((r) => {
					console.log(this);
					this.ticket = r;
					this.step++;
				}).always(r => this.loading = false);
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