@extends('front_layout.master')
@section('content')
<section class="banner_wrapper conp_info" style="background-image: url({{ asset('Trade_Storage/assets/img/banner_3.png') }});">
        <div class="container">
            <div class="banner_content">
                <h1>Company info</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
            </div>
        </div>
    </section>

    <section class="stry_wrapper p_100 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="stry_content">
                        <h2>
                            About Trade<br> Storage 
                        </h2>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
                        <p>
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="stry_img">
                        <img src="{{ asset('Trade_Storage/assets/img/sty_1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="executive_wrapper p_100">
        <div class="container">
            <div class="executive_content"> 
                <h2>Executive Officers</h2>
                <div class="executive_slider">
                    <div class="executive_img">
                        <img src="{{ asset('Trade_Storage/assets/img/mb_1.png') }}" alt="">
                        <h5>Joseph D. Russell, Jr.</h5>
                        <p>
                            President and Chief Executive Officer
                        </p>
                    </div>
                    <div class="executive_img">
                        <img src="{{ asset('Trade_Storage/assets/img/mb_2.png') }}" alt="">
                        <h5>Joseph D. Russell, Jr.</h5>
                        <p>
                            President and Chief Executive Officer
                        </p>
                    </div>
                    <div class="executive_img">
                        <img src="{{ asset('Trade_Storage/assets/img/mb_3.png') }}" alt="">
                        <h5>Joseph D. Russell, Jr.</h5>
                        <p>
                            President and Chief Executive Officer
                        </p>
                    </div>
                    <div class="executive_img">
                        <img src="{{ asset('Trade_Storage/assets/img/mb_4.png') }}" alt="">
                        <h5>Joseph D. Russell, Jr.</h5>
                        <p>
                            President and Chief Executive Officer
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="trade trade_inner bg_style p_100" style="background-image: url('{{ asset('Trade_Storage/assets/img/trade_bg_2.png') }}');">
        <div class="container pb-0 border-0">
            <div class="trade_cont">
                <div class="trade_title d-flex justify-content-between align-items-center">
                    <h2>
                        Trade Storage <br />
                        <span>Value</span>
                    </h2>
                    <div class="star_img">
                        <img src="{{ asset('Trade_Storage/assets/img/star.png') }}" alt="" />
                    </div>
                </div>
                <p>
                    We are united under one common goal – creating a diverse and inclusive environment where all employees feel valued, included, and excited to be part of a best-in-class team. With over 5,000 team members from all
                    different races, backgrounds, and life experiences, we celebrate inclusion and value the diversity each person brings to Public Storage. We believe our commitment to diversity and inclusion makes us a stronger
                    Company and instills a sense of pride across our teams and the customers we serve.
                </p>
            </div>
        </div>
    </section>

    <section class="meb_wrapper p_100 pb-0">
        <div class="container">
            <div class="meb_content"> 
                <h2>Trusted nationwide by customers and team members!</h2>
                <p>
                    We’re honored to receive these awards from Comparably, based on the ratings and feedback from our very own team.
                </p>
                <div class="meb_slider">
                    <div class="meb_img">
                        <img src="{{ asset('Trade_Storage/assets/img/meb_img_1.png') }}" alt="">
                    </div>
                    <div class="meb_img">
                        <img src="{{ asset('Trade_Storage/assets/img/meb_img_2.png') }}" alt="">
                    </div>
                    <div class="meb_img">
                        <img src="{{ asset('Trade_Storage/assets/img/meb_img_3.png') }}" alt="">
                    </div>
                    <div class="meb_img">
                        <img src="{{ asset('Trade_Storage/assets/img/meb_img_4.png') }}" alt="">
                    </div>
                    <div class="meb_img">
                        <img src="{{ asset('Trade_Storage/assets/img/meb_img_5.png') }}" alt="">
                    </div>
                    <div class="meb_img">
                        <img src="{{ asset('Trade_Storage/assets/img/meb_img_6.png') }}" alt="">
                    </div>
                     <div class="meb_img">
                        <img src="{{ asset('Trade_Storage/assets/img/meb_img_1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="most_wrapper p_100">
        <div class="container">
            <div class="most_content planet_txt"> 
                <h2>Sustainability <strong>We Love Our <span>Planet</span></strong></h2>
                <ul>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}"> LED Lighting</li>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}"> Eco-Friendly Water Practices</li>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}"> Efficient HVAC Systems</li>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}"> Availability of 100% Recycled moving boxes& supplies</li>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}"> Solar power generation</li>
                </ul>
            </div>
        </div>
    </section>
@endsection