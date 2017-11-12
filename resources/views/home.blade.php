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

                    <form id="checkout" method="post" action="/checkout">
                      <div id="payment-form"></div>
                      <input type="submit" value="Pay $10">
                    </form>
    
                    <input type="hidden" id="b_token" value="{{ Braintree\ClientToken::generate() }}" />

                    <script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
                    <script>
                    // We generated a client token for you so you can test out this code
                    // immediately. In a production-ready integration, you will need to
                    // generate a client token on your server (see section below).
                    var clientToken = document.getElementById("b_token").value;

                    braintree.setup(clientToken, "dropin", {
                      container: "payment-form",
                      
                    });

                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
