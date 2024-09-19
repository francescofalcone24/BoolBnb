@extends('layouts.app')

@section('content')


<div class="content">
	<form method="post" id="payment-form" action="{{ url('/checkout') }}">
		@csrf
		<section>
			<label for="amount">
				<span class="input-label">Amount</span>
				<div class="input-wrapper amount-wrapper">
					<input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="10">
				</div>
			</label>

			<div class="bt-drop-in-wrapper">
				<div id="bt-dropin"></div>
			</div>
		</section>

		<input id="nonce" name="payment_method_nonce" type="hidden" />
		<button class="button" type="submit"><span>Test Transaction</span></button>
	</form>
</div>
</div>

<script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
<script>
var form = document.querySelector('#payment-form');


braintree.dropin.create({
authorization: 'sandbox_s95bw72n_yz8kqy5b4s9p34y4y4'
selector: '#bt-dropin',
paypal: {
flow: 'vault'
}
}, function (createErr, instance) {
if (createErr) {
console.log('Create Error', createErr);
return;
}
form.addEventListener('submit', function (event) {
event.preventDefault();

instance.requestPaymentMethod(function (err, payload) {
  if (err) {
	console.log('Request Payment Method Error', err);
	return;
  }

  // Add the nonce to the form and submit
  document.querySelector('#nonce').value = payload.nonce;
  form.submit();
});
});
});
</script>

{{-- <script src="https://js.braintreegateway.com/web/dropin/1.43.0/js/dropin.js"></script>

<div id="dropin-container"></div>
<button id="submit-button" class="button button--small button--green">Purchase</button>
<script>
	var button = document.querySelector('#submit-button');

braintree.dropin.create({
  authorization: 'sandbox_q74cbj9j_yz8kqy5b4s9p34y4',
  selector: '#dropin-container'
}, function (err, instance) {
  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
      // Submit payload.nonce to your server
    });
  })
});
</script> --}}
	
@endsection


