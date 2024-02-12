@extends('front_layout.master')
@section('content')
<section class="banner_wrapper" style="background-image: url({{ asset('Trade_Storage/assets/img/hc-bann.png') }});">
        <div class="container">
            <div class="banner_content">
                <h1>Help Center</h1>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Ask a question or search the help center" aria-describedby="basic-addon2" />
                    <span class="input-group-text" id="basic-addon2">Search</span>
                </div>
            </div>
        </div>
    </section>

    <section class="comman_areas_sec p_100">
        <div class="container">
            <div class="area_content">
                <h2>Common Areas People Need Help</h2>
                <div class="areas-help_content" id="accordionFlushExample">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="faq_lft">
                                <div class="accordion accordion-flush">
                                    <div class="accordion-item">
                                        <h6 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                How Self Storage Works
                                            </button>
                                        </h6>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">If you've never rented self storage before, we're here to help.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h6 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                Unit Sizes
                                            </button>
                                        </h6>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                If you've never rented self storage before, we're here to help.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h6 class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                Packing and Storage Tips
                                            </button>
                                        </h6>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                If you've never rented self storage before, we're here to help.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h6 class="accordion-header" id="flush-headingfour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
                                                Payments & Billing
                                            </button>
                                        </h6>
                                        <div id="flush-collapsefour" class="accordion-collapse collapse" aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">If you've never rented self storage before, we're here to help.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h6 class="accordion-header" id="flush-headingfive">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
                                                How to Use the Trade Storage App
                                            </button>
                                        </h6>
                                        <div id="flush-collapsefive" class="accordion-collapse collapse" aria-labelledby="flush-headingfive" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                If you've never rented self storage before, we're here to help.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="faq_ryt">
                                <div class="accordion accordion-flush">
                                    <div class="accordion-item">
                                        <h6 class="accordion-header" id="flush-headingsix">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsesix" aria-expanded="false" aria-controls="flush-collapsesix">
                                                Features & Amenities
                                            </button>
                                        </h6>
                                        <div id="flush-collapsesix" class="accordion-collapse collapse" aria-labelledby="flush-headingsix" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">If you've never rented self storage before, we're here to help.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h6 class="accordion-header" id="flush-headingseven">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseseven" aria-expanded="false" aria-controls="flush-collapseseven">
                                                Making a Reservation
                                            </button>
                                        </h6>
                                        <div id="flush-collapseseven" class="accordion-collapse collapse" aria-labelledby="flush-headingseven" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                If you've never rented self storage before, we're here to help.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h6 class="accordion-header" id="flush-headingeight">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseeight" aria-expanded="false" aria-controls="flush-collapseeight">
                                                Moving In
                                            </button>
                                        </h6>
                                        <div id="flush-collapseeight" class="accordion-collapse collapse" aria-labelledby="flush-headingeight" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                If you've never rented self storage before, we're here to help.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h6 class="accordion-header" id="flush-headingnine">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsenine" aria-expanded="false" aria-controls="flush-collapsenine">
                                                Managing Your Account
                                            </button>
                                        </h6>
                                        <div id="flush-collapsenine" class="accordion-collapse collapse" aria-labelledby="flush-headingnine" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">If you've never rented self storage before, we're here to help.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection