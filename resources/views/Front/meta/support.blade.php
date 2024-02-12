@extends('front_layout.master')
@section('content')

<section class="banner_wrapper" style="background-image: url({{ asset('Trade_Storage//assets/img/support-bann.png') }});">
        <div class="container">
            <div class="banner_content">
                <h1>Contact Us</h1>
                <p>
                    We’re here to help. If you have questions about self storage, our agents are here to help by<br />
                    chat, phone, US mail or at any of our locations.
                </p>
            </div>
        </div>
    </section>

    <section class="support_sec p_100">
        <div class="container">
            <div class="support_content">
                <div class="support_tabs">
                    <div class="supr-row">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <div class="suport_links">
                                    <p>Get a Unit</p>
                                    <span class="tbs_arw" style="display: none;">
                                        <img src="{{ asset('Trade_Storage/assets/img/arw-z.png') }}" class="img-fluid" alt="" />
                                    </span>
                                </div>
                            </button>

                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                <div class="suport_links">
                                    <p>Customer Service</p>
                                    <span class="tbs_arw" style="display: none;">
                                        <img src="{{ asset('Trade_Storage/assets/img/arw-z.png') }}" class="img-fluid" alt="" />
                                    </span>
                                </div>
                            </button>

                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                <div class="suport_links">
                                    <p>By Mail</p>
                                    <span class="tbs_arw" style="display: none;">
                                        <img src="{{ asset('Trade_Storage/assets/img/arw-z.png') }}" class="img-fluid" alt="" />
                                    </span>
                                </div>
                            </button>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="support_tabs_content">
                                    <h3>Get a Unit</h3>
                                    <p>
                                        Mon-Sat 3:00am - 10:00pm PST<br />
                                        Sun 3:00am - 9:00pm PST
                                    </p>
                                    <div class="get_unit_links">
                                        <div class="lc-lnk live_chat">
                                            <div class="lc-icon">
                                                <img src="{{ asset('Trade_Storage/assets/img/chat-msg.png') }}" class="img-fluid" alt="" />
                                            </div>
                                            <div class="lc-txt">
                                                <span>Live Chat</span>
                                                <a href="#">Start a live chat</a>
                                            </div>
                                        </div>
                                        <div class="lc-lnk call_links">
                                            <div class="lc-icon">
                                                <img src="{{ asset('Trade_Storage/assets/img/phn-icn.png') }}" class="img-fluid" alt="" />
                                            </div>
                                            <div class="lc-txt">
                                                <span>Call Sales</span>
                                                <a href="tel:+91 1244830593"> 800-688-8057</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rnt_link">
                                        <a href="#">Rent Online</a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="support_tabs_content">
                                    <h3>Customer Service</h3>
                                    <p>
                                        Mon-Sat 3:00am - 10:00pm PST<br />
                                        Sun 3:00am - 9:00pm PST
                                    </p>
                                    <div class="get_unit_links">
                                        <div class="lc-lnk live_chat">
                                            <div class="lc-icon">
                                                <img src="{{ asset('Trade_Storage/assets/img/chat-msg.png') }}" class="img-fluid" alt="" />
                                            </div>
                                            <div class="lc-txt">
                                                <span>Live Chat</span>
                                                <a href="#">Start a live chat</a>
                                            </div>
                                        </div>
                                        <div class="lc-lnk call_links">
                                            <div class="lc-icon">
                                                <img src="{{ asset('Trade_Storage/assets/img/phn-icn.png') }}" class="img-fluid" alt="" />
                                            </div>
                                            <div class="lc-txt">
                                                <span>Call Sales</span>
                                                <a href="tel:+91 1244830593"> 800-688-8057</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rnt_link">
                                        <a href="#">Rent Online</a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <div class="support_tabs_content">
                                    <h3>By Mail</h3>
                                    <p>
                                        Mon-Sat 3:00am - 10:00pm PST<br />
                                        Sun 3:00am - 9:00pm PST
                                    </p>
                                    <div class="get_unit_links">
                                        <div class="lc-lnk live_chat">
                                            <div class="lc-icon">
                                                <img src="{{ asset('Trade_Storage/assets/img/chat-msg.png') }}" class="img-fluid" alt="" />
                                            </div>
                                            <div class="lc-txt">
                                                <span>Live Chat</span>
                                                <a href="#">Start a live chat</a>
                                            </div>
                                        </div>
                                        <div class="lc-lnk call_links">
                                            <div class="lc-icon">
                                                <img src="{{ asset('Trade_Storage/assets/img/phn-icn.png') }}" class="img-fluid" alt="" />
                                            </div>
                                            <div class="lc-txt">
                                                <span>Call Sales</span>
                                                <a href="tel:+91 1244830593"> 800-688-8057</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rnt_link">
                                        <a href="#">Rent Online</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="comman_areas_sec p_100">
        <div class="container">
            <div class="area_content">
                <h2>Help Center</h2>
                <div class="areas-help_content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="faq_lft">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h6 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                How Self Storage Works
                                            </button>
                                        </h6>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="faq_ryt">
                                <div class="accordion accordion-flush" id="accordionFlushExample2">
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