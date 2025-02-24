<div class="card-header">
                                Laravel - Razorpay Payment Gateway Integration
                            </div>
<form action="{{ route('razorpay') }}" method="POST" >
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZORPAY_KEY') }}"
                                            data-amount="100"
                                            data-buttontext="Pay 1 INR"
                                            data-description="Rozerpay"
                                            data-notes.product_name="Clouth"
                                            data-notes.quantity="1"
                                            data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"
                                            data-prefill.name="name"
                                            data-prefill.email="email"
                                            data-theme.color="#ff7529">
                                    </script>