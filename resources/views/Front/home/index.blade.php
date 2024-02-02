@extends('front_layout.master')

@section('content')

    <section class="top_bar">
        <p>What's it like to store with us? <a href="">Ask Us!</a></p>
    </section>
    <section class="home_banner bg_style" style="background-image: url({{ asset('Trade_Storage/assets/img/home_bg.png') }})">
        <div class="container">
            <div class="banner_cont">
                <h1>Easy Online Rental</h1>
                <p>Skip the counter & go straight to your space.</p>
                <div class="banner_rent">
                    <img src="{{ asset('Trade_Storage/assets/img/num2.png') }}" alt="" />
                </div>
            </div>
        </div>
        <div class="office d-flex align-items-center">
            <ul>
                <li class="office_rent">
                    <div class="office_selection office_slec1">
                        <label for="location">location</label>
                        <input type="text" id="location" value="1023 Shallowford Rd, Marietta, GA 30066"/>
                    </div>
                </li>
                <li class="office_rent office_rent2">
                    <div class="office_selection office_slec2">
                        <select name="location" id="location" class="custom-select sources" placeholder="Office Space">
                            <option value="1">one</option>
                            <option value="2">two</option>
                            <option value="3">three</option>
                            <option value="4">Founder</option>
                            <option value="5">sixes</option>
                        </select>
                        <label for="potencial">Storage Type</label>
                    </div>
                </li>
                <li class="office_rent office_rent3">
                    <div class="office_selection office_slec3">
                        <select name="location" id="location" class="custom-select sources" placeholder="All Parking">
                            <option value="1">one</option>
                            <option value="2">two</option>
                            <option value="3">three</option>
                            <option value="4">Founder</option>
                            <option value="5">sixes</option>
                        </select>
                        <label for="potencial">Storage</label>
                    </div>
                </li>
            </ul>
            <div>
                <input type="button" value="Search" />
            </div>
        </div>
    </section>
    <section class="loaction-sec" id="location">
        <div class="container">
            <div class="tittle_heading">
                <h2>
                    Get Started With Exploring Real <br />
                    Estate Options
                </h2>
            </div>
            <div class="row loc-row">
                <div class="col-md-4 loc-col">
                    <div class="location-text yellow">
                        <p>
                            Lorem Ipsum has been the industry's standard dummy text ever
                            since the 1500s, when an unknown printer took a galley of type
                            and scrambled it to make a type specimen book.
                        </p>
                    </div>
                </div>
                <div class="col-md-8 slide-col">
                    <div class="loctaion-slider">
                        <div class="location-list">
                            <div class="location-box">
                                <div class="loc-img">
                                    <img src="{{ asset('Trade_Storage/assets/img/s1.png') }}" alt="" />
                                    <h4>Trade Storage</h4>
                                </div>
                            </div>
                        </div>
                        <div class="location-list">
                            <div class="location-box">
                                <div class="loc-img">
                                    <img src="{{ asset('Trade_Storage/assets/img/s4.png') }}" alt="" />
                                    <h4>Vehicle Parking</h4>
                                </div>
                            </div>
                        </div>
                        <div class="location-list">
                            <div class="location-box">
                                <div class="loc-img">
                                    <img src="{{ asset('Trade_Storage/assets/img/s5.png') }}" alt="" />
                                    <h4>Office Space Leasing</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="trade bg_style">
        <div class="container">
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
                    We are united under one common goal – creating a diverse and
                    inclusive environment where all employees feel valued, included, and
                    excited to be part of a best-in-class team. With over 5,000 team
                    members from all different races, backgrounds, and life experiences,
                    we celebrate inclusion and value the diversity each person brings to
                    Public Storage. We believe our commitment to diversity and inclusion
                    makes us a stronger Company and instills a sense of pride across our
                    teams and the customers we serve.
                </p>
            </div>
        </div>
    </section>
    <section class="self">
        <div class="container">
            <div class="tittle_heading">
                <span>The Process</span>
                <h2>
                    Here’s how the self-storage <br />
                    process works.
                </h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="self_box">
                        <div class="self_img">
                            <img src="{{ asset('Trade_Storage/assets/img/soo1.png') }}" alt="" />
                        </div>
                        <h3>Find a location</h3>
                        <p>
                            Start by searching for storage near you. With thousands of
                            locations nationwide, we're always just around the corner.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="self_box">
                        <div class="self_img">
                            <img src="{{ asset('Trade_Storage/assets/img/self2.png') }}" alt="" />
                        </div>
                        <h3>Reserve your unit</h3>
                        <p>
                            Reserve your unit for free with no obligation, and complete your
                            rental online to save time on move-in day.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="self_box">
                        <div class="self_img">
                            <img src="{{ asset('Trade_Storage/assets/img/self3.png') }}" alt="" />
                        </div>
                        <h3>Move in</h3>
                        <p>
                            Find your space and move on in! (Pro tip: Download the Public
                            Storage app to open make move-in a breeze with easy gate access
                            and more!)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection