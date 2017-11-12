@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-offset-1 col-md-3 subscribe-block">
		      <form id="checkout" method="post" action="/checkout/1">
                        {{ csrf_field() }}
		        <div id="payment-form-tier-1"></div>
		        <input type="submit" value="Pay $40">
		      </form>
                    </div>
                    <div class="col-md-offset-1 col-md-3 subscribe-block">
		      <form id="checkout" method="post" action="/checkout/2">
                        {{ csrf_field() }}
		        <div id="payment-form-tier-2"></div>
		        <input type="submit" value="Pay $80">
		      </form>
                    </div>
                    <div class="col-md-offset-1 col-md-3 subscribe-block">
		      <form id="checkout" method="post" action="/checkout/3">
                        {{ csrf_field() }}
		        <div id="payment-form-tier-3"></div>
		        <input type="submit" value="Pay $150">
		      </form>
                    </div>
    
                    <input type="hidden" id="b_token" value="{{ Braintree\ClientToken::generate() }}" />

                    <script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
                    <script>
                    // We generated a client token for you so you can test out this code
                    // immediately. In a production-ready integration, you will need to
                    // generate a client token on your server (see section below).
                    var form = document.querySelector('#payment-form')
                    var clientToken = document.getElementById("b_token").value

                    braintree.setup(clientToken, "dropin", {
                      container: "payment-form-tier-1",
                    });

                    braintree.setup(clientToken, "dropin", {
                      container: "payment-form-tier-2",
                    });

                    braintree.setup(clientToken, "dropin", {
                      container: "payment-form-tier-3",
                    });


                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
