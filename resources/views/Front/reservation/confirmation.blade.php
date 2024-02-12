@extends('front_layout.master')
@section('content')
<section class="reservation_wrapper p_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="reservation_hd">
                        <h2>Make Reservation</h2>
                        <div class="mbship_top_step nav nav-pills">
                            <li class="tab-pills active"><div class="top_step"><span><img src="{{ asset('Trade_Storage/assets/img/check_white.png') }}"></span> Personal info</div></li>
                            <li class="tab-pills active"><div class="top_step"><span><img src="{{ asset('Trade_Storage/assets/img/check_white.png') }}"></span> Lease Agreement</div></li>
                            <li class="tab-pills active"><div class="top_step"><span><img src="{{ asset('Trade_Storage/assets/img/check_white.png') }}"></span> Payment</div></li>
                            <li class="tab-pills active"><div class="top_step"><span>4</span> Confirm</div></li>
                        </div>
                    </div>
                    <div class="thank_reservation">
                        <img src="{{ asset('Trade_Storage/assets/img/thnks_img.svg') }}">
                        <h3>Thank you for reservation!</h3>
                        <p>
                            We're thrilled to welcome you, Your trust means a lot. Looking forward to creating wonderful memories together.
                        </p>
                        <div class="tnk_btn">
                            <a href="#" class="btn">Back To Home</a>
                            <a href="#" class="btn btn_active">Go on Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection