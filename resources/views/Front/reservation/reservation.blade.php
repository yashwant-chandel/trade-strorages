@extends('front_layout.master')
@section('content')

<section class="reservation_wrapper p_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="reservation_hd">
                        <h2>Make Reservation</h2>
                        <div class="mbship_top_step nav nav-pills">
                            <li class="tab-pills active"><div class="top_step"><span>1</span> Personal info</div></li>
                            <li class="tab-pills"><div class="top_step"><span>2</span> Lease Agreement</div></li>
                            <li class="tab-pills"><div class="top_step"><span>3</span> Payment</div></li>
                            <li class="tab-pills"><div class="top_step"><span>4</span> Confirm</div></li>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="mbship_step_cont">
                        <div class="tab d-none">
                            <form class="row">
                                <div class="col-lg-12">
                                    <div class="pet_info_hd">
                                        <h4>Personal info</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" name="" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control" name="" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label>Move-In Date *</label>
                                        <input type="Date" class="form-control" name="" placeholder="Automatically filled ">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label>Phone Number *</label>
                                        <input type="Number" class="form-control" name="" placeholder="Enter your number">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="from_gp">
                                        <label>Email *</label>
                                        <input type="email" class="form-control" name="" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label for="inputState" class="form-label">Country</label>
                                        <select id="inputState" class="form-select">
                                            <option selected>Country/Region</option>
                                            <option>USA</option>
                                            <option>USA</option>
                                            <option>USA</option>
                                        </select>
                                    </div>  
                                </div>
                                <div class="col-lg-6">
                                    <div class="from_gp">
                                        <label for="inputState" class="form-label">State</label>
                                        <select id="inputState" class="form-select">
                                            <option selected>State</option>
                                            <option>lorem</option>
                                            <option>lorem</option>
                                            <option>lorem</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="from_gp">
                                        <label>City *</label>
                                        <input type="text" class="form-control" name="" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="from_gp">
                                        <label>Address *</label>
                                        <input type="text" class="form-control" name="" placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="from_gp">
                                        <label>Address 2 *</label>
                                        <input type="text" class="form-control" name="" placeholder="Address 2">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-check p-0">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                                        <label class="form-check-label" for="flexRadioDefault4">
                                            Please text me about my reservation.
                                            <span>Message and data rates may apply.</span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <div class="membership_ft_btn">
                                <div class="d-flex text-start">
                                    <button type="button" id="back_button" class="btn btn-link" onclick="back()">Back</button>
                                    <button type="button" id="next_button" class="btn cta ms-auto" onclick="next()">Hold Unit</button>
                                </div>
                            </div>
                        </div>

                        <div class="tab d-none">
                            <form>
                                <div class="form-check p-0">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5">
                                    <label class="form-check-label" for="flexRadioDefault5">
                                        Please text me about my reservation.
                                        <span>Message and data rates may apply.</span>
                                    </label>
                                </div>
                            </form>
                            <div class="membership_ft_btn">
                                <div class="d-flex text-start">
                                    <button type="button" id="back_button" class="btn btn-link" onclick="back()">Back</button>
                                    <button type="button" id="next_button" class="btn cta ms-auto" onclick="next()">Next</button>
                                </div>
                            </div>
                        </div>

                        <div class="tab d-none">
                            <form>
                                <div class="col-lg-12">
                                    <div class="pet_info_hd">
                                        <h4>Payment</h4>
                                    </div>
                                </div>
                                <div class="paylatter_bg">
                                    <div class="paylatter_wrapper">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5" checked>
                                            <label class="form-check-label" for="flexRadioDefault5">
                                                Credit/Debit Card
                                            </label>
                                        </div>
                                        <div class="pay_card">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ asset('Trade_Storage/assets/img/pay_1.svg') }}" alt="">
                                                    </a>   
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ asset('Trade_Storage/assets/img/pay_2.svg') }}" alt="">
                                                    </a>   
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ asset('Trade_Storage/assets/img/pay_3.svg') }}" alt="">
                                                    </a>   
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ asset('Trade_Storage/assets/img/pay_4.svg') }}" alt="">
                                                    </a>   
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row border-0">
                                        <div class="col-lg-12">
                                            <div class="from_gp">
                                                <input type="number" class="form-control" id="number" placeholder="Card Number">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="from_gp">
                                                <input type="number" class="form-control" id="number" placeholder="Name On Card">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="from_gp">
                                                <input type="number" class="form-control" id="number" placeholder="Expiration Date(MM/YY)">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="from_gp">
                                                <input type="number" class="form-control" id="number" placeholder="Security Code">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="pay_online_wreap">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6">
                                            <label class="form-check-label" for="flexRadioDefault6">
                                                Pay With Paypal
                                            </label>
                                        </div>
                                        <img src="{{ asset('Trade_Storage/assets/img/pay_5.svg') }}">
                                    </li>
                                    <li>    
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault7">
                                            <label class="form-check-label" for="flexRadioDefault7">
                                                Pay With Stripe
                                            </label>
                                        </div>
                                        <img src="{{ asset('Trade_Storage/assets/img/pay_6.svg') }}">
                                    </li>
                                </ul>
                            </form>
                            <div class="membership_ft_btn">
                                <div class="d-flex text-start">
                                    <button type="button" id="back_button" class="btn btn-link" onclick="back()">Back</button>
                                    <button type="button" id="next_button" class="btn cta ms-auto">Confirm</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="reservation_right">
                        <h4>Pricing Details</h4>
                        <ul>
                            <li>First Month Rent <span>$19.00</span></li>
                            <li><p><img src="{{ asset('Trade_Storage/assets/img/frist_pri.svg') }}" alt=""> $1 first month rent</p> <strong>$1.00</strong></li>
                            <li>One-time administration fee <span>$29.00</span></li>
                            <li><strong>One-time administration fee</strong> <strong>$30.00</strong></li>
                        </ul>
                    </div>
                    <ul class="reservation_list">
                        <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> No obligation to rent</li>
                        <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> No credit card required</li>
                        <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> All rentals month to month</li>
                        <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> LOCK in this rate</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



@endsection