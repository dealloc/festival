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
					<i class="info icon"></i>
					<div class="content">
						<div class="title">Ticket</div>
						<div class="description">View your ticket details</div>
					</div>
				</div>
			</div>
		</div>
		<div class="doubling eight column row">
			<div class="ui segment" v-if="first">
				<form class="ui form">
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
					<div class="ui basic blue animated button" @click="next()">
						<div class="visible content">Next step</div>
						<div class="hidden content">
							<i class="right arrow icon"></i>
						</div>
					</div>
				</form>
			</div>
			<div class="ui segment" v-if="second">
				billing information
				<div class="ui basic red animated button" @click="previous()">
					<div class="visible content">Previous step</div>
					<div class="hidden content">
						<i class="left arrow icon"></i>
					</div>
				</div>
				<div class="ui basic blue animated button" @click="next()">
					<div class="visible content">Next step</div>
					<div class="hidden content">
						<i class="right arrow icon"></i>
					</div>
				</div>
			</div>
			<div class="ui segment" v-if="third">
				show ticket
				<div class="ui basic red animated button" @click="previous()">
					<div class="visible content">Previous step</div>
					<div class="hidden content">
						<i class="left arrow icon"></i>
					</div>
				</div>
				<div class="ui basic blue animated button" @click="next()">
					<div class="visible content">Purchase</div>
					<div class="hidden content">
						<i class="shop icon"></i>
					</div>
				</div>
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
		data() {
			return {
				step: 1
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
			loading() {
				return (this.step === 4);
			},
			complete() {
				return (this.step === 5);
			}
		},
		methods: {
			next() {
				this.step++;
			},
			previous() {
				this.step--;
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
	}
</style>