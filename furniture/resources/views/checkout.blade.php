@extends('layout')
<title>Checkout</title>
@section('checkout')

<!-- Page Header Start -->
<div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px;background:#3b5d50" >
            <h1 class="font-weight-semi-bold text-uppercase mb-3 text-white">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="" class="text-white">Home</a></p>
                <p class="m-0 px-2 text-white">-</p>
                <p class="m-0 text-white">Checkout</p>
            </div>
        </div>
<!-- Page Header End -->


<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                <form method="post" id="checkoutForm">
                <input type="hidden" name="order_id" value="order_id_{{ rand(100000, 999999) }}"> <!-- Random order ID -->

                    @csrf
                    <div class="row">

                        <div class="col-md-6 form-group">
                            <label>Full Name</label>
                            <input class="form-control" type="text" placeholder="Doe" name="name" value="{{ session('name') }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com" name="email" value="{{ session('email') }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789" name="mobile" value="{{ session('mobile') }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" placeholder="123 Street" required name="address">
                        </div>

                        <div class="form-group">
		              <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
		              <select id="c_country" class="form-control" name="country">
		                <option value="1">Select a country</option>    
		                <option value="2">bangladesh</option>    
		                <option value="3">Algeria</option>    
		                <option value="4">Afghanistan</option>    
		                <option value="5">Ghana</option>    
		                <option value="6">Albania</option>    
		                <option value="7">Bahrain</option>    
		                <option value="8">Colombia</option>    
		                <option value="9">Dominican Republic</option>    
		              </select>
		            </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="Dehradun" required name="city">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="Uttarakahnk" required name="state">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="247667" required name="zipcode">
                        </div>

                    </div>
                    <br>
                    <div class="card border-secondary mb-5">
                        <div class="card-header text-white border-0" style="background:#3b5d50">
                            <h4 class="font-weight-semi-bold m-0">Payment</h4>
                        </div>
                        <div class="card-body">
                          
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="COD">
                                    <label class="custom-control-label" for="directcheck">COD</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="upi">
                                    <label class="custom-control-label" for="banktransfer">Payment gateway</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header text-white border-0" style="background:#3b5d50">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Products</h5>
                    @foreach($cartitems as $data)

                    <div class="d-flex justify-content-between">
                        <p>{{$data->name}}</p>
                        <p>Rs. {{$data->price}}</p>
                    </div>

                    @endforeach
                </div>
                @php
                $subtotal = $cartitems->sum(function ($item) {
                return $item->price * $item->quantity;
                });
                $total = $subtotal; // You can add additional charges or discounts to the total if needed
                @endphp
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">Rs. {{ $subtotal }}</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Checkout End -->
<script>
    document.getElementById('checkoutForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        var paymentMethod = document.querySelector('input[name="payment"]:checked').value;

        if (paymentMethod === 'COD') {
            // If Cash on Delivery selected, proceed with order placement
            this.action = "{{ url('orders') }}"; // Set form action to orders URL
            this.submit();
        } else if (paymentMethod === 'upi') {
            // If UPI selected, redirect to payment gateway
            var form = document.createElement('form');

            form.action = "{{ url('store') }}";
            form.method = 'POST';

            var fields = this.querySelectorAll('input, select');
            fields.forEach(function(field) {
                var cloneField = field.cloneNode(true);
                form.appendChild(cloneField);
            });
            var csrfToken = document.createElement('input');
            csrfToken.setAttribute('type', 'hidden');
            csrfToken.setAttribute('name', '_token');
            csrfToken.setAttribute('value', '{{ csrf_token() }}');
            form.appendChild(csrfToken);
            document.body.appendChild(form);
            form.submit(); // Redirect to UPI payment page
        }
    });
</script>
@endsection
