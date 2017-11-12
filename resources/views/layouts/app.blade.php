<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.0/js/dropin.min.js"></script>
    <script type="text/javascript">
        /*
            var button = document.querySelector('#submit-button');

            const braintreeConfig = {
                authorization: document.getElementById("b_token").value,
                container: "#dropin-container",
            }

            braintree.dropin.create(braintreeConfig, function (createErr, instance) {

                    button.addEventListener('click', function () {

                        instance.requestPaymentMethod(function (err, payload) {
                      
                        console.log(payload);
                        // Submit payload.nonce to your server
                    });
                });
            });

            braintree.setup(document.getElementById("b_token").value, "custom", {
              paypal: {
                container: "paypal-container",
                singleUse: false,
                billingAgreementDescription: 'Your agreement description',
                locale: 'en_US',
                enableShippingAddress: true,
                shippingAddressOverride: {
                  recipientName: 'Scruff McGruff',
                  streetAddress: '1234 Main St.',
                  extendedAddress: 'Unit 1',
                  locality: 'Chicago',
                  countryCodeAlpha2: 'US',
                  postalCode: '60652',
                  region: 'IL',
                  phone: '123.456.7890',
                  editable: false
                }
              },
              dataCollector: {
                paypal: true
              },
              onPaymentMethodReceived: function (obj) {
                console.log("nonce -> " + obj.nonce)
              }
            });
*/
    </script>
</body>
</html>
