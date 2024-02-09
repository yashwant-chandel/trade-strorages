@extends('front_layout.master')
@section('content')
<section class="banner_wrapper" style="background-image: url({{ asset('Trade_Storage/assets/img/banner_1.png') }});">
        <div class="container">
            <div class="banner_content">
                <h2>Self Storage Facilities</h2>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter City, State or Zip " aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">Search</span>
                </div>
            </div>
        </div>
    </section>

    <section class="need_wrapper p_100">
        <div class="container">
            <div class="need_content">
                <h4>
                    Sometimes you just need a little more space. At Public Storage, we help you make room for what matters most.
                </h4>
                <div class="need_grid">
                    <div class="need_text">
                        <img src="{{ asset('Trade_Storage/assets/img/icons_1.png') }}">
                        <h5>Get Your House Back</h5>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.
                        </p>
                    </div>
                    <div class="need_text">
                        <img src="{{ asset('Trade_Storage/assets/img/icons_2.png') }}">
                        <h5>Hold On to the Things That Matter</h5>
                        <p>
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                    <div class="need_text">
                        <img src="{{ asset('Trade_Storage/assets/img/icons_3.png') }}">
                        <h5>Make Room for a New Addition to the Family</h5>
                        <p>
                            t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution.
                        </p>
                    </div>
                    <div class="need_text">
                        <img src="{{ asset('Trade_Storage/assets/img/icons_4.png') }}">
                        <h5>Make Room for Life's Transitions</h5>
                        <p>
                            If your closets are overflowing and there's no room in the garage for your car, a storage space can help you reclaim some square footage.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="self_wrapper p_100" style="background-image: url({{ asset('Trade_Storage//assets/img/self.png') }});">
        <div class="container">
            <div class="self_content">
                <h3>SELF STORAGE <span>SOLUTIONS</span></h3>
                <ul>
                    <li>
                        <h5>Moving</h5>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book 
                        </p>
                    </li>
                    <li>
                        <h5>Traveling and Military Deployment</h5>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="trade_wrapper p_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trade_hd">
                        <h3>Why Trade Storage</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="trade_content">
                        <div class="free_content">
                            <h5>Free Reservations</h5>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            </p>
                        </div>
                        <ul>
                            <li>
                                <a href="#">Convenient Hours</a>
                            </li>
                            <li>
                                <a href="#">Temperature-Controlled</a>
                            </li>
                            <li>
                                <a href="#">Multiple Unit Sizes</a>
                            </li>
                            <li>
                                <a href="#">Electronic Gate Access</a>
                            </li>
                        </ul>
                    </div>  
                </div>
                <div class="col-lg-6">
                    <div class="trade_img">
                        <img src="{{ asset('Trade_Storage/assets/img/trade_1.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="most_wrapper p_100 pt-0">
        <div class="container">
            <div class="most_content"> 
                <h3>Get The Most Out of Self-Storage</h3>
                <ul>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}"> Label those boxes</li>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}"> Plan your storage space</li>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}"> Be prepared</li>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}"> Staging for a Sale</li>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}"> Subletting and Airbnb-ing</li>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}"> Remodeling</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="self p_100" style="background-color: #fbb93f12">
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
                            Start by searching for storage near you. With thousands of locations nationwide, we're always just around the corner.
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
                            Reserve your unit for free with no obligation, and complete your rental online to save time on move-in day.
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
                            Find your space and move on in! (Pro tip: Download the Public Storage app to open make move-in a breeze with easy gate access and more!)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="people p_100">
        <div class="container">
            <div class="tittle_heading">
                <span>Testimonials</span>
                <h2>What People Say</h2>
            </div>

            <div class="people_slider">
                <div class="people_box">
                    <ul class="d-flex align-items-center justify-content-between">
                        <li>
                            <div class="people_img">
                                <img src="{{ asset('Trade_Storage/assets/img/people1.png') }}" alt="" />
                            </div>
                        </li>
                        <li>
                            <div class="people_cont">
                                <p>
                                    “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                                    Lorem Ipsum passages”
                                </p>
                                <div class="marque d-flex align-items-center gap-3">
                                    <img src="{{ asset('Trade_Storage/assets/img/marqu.png') }}" alt="" />
                                    <div>
                                        <h5>Dumas Bastein</h5>
                                        <p>Founder and Director, le FAW</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="people_box">
                    <ul class="d-flex align-items-center justify-content-between">
                        <li>
                            <div class="people_img">
                                <img src="{{ asset('Trade_Storage/assets/img/people1.png') }}" alt="" />
                            </div>
                        </li>
                        <li>
                            <div class="people_cont">
                                <p>
                                    “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                                    Lorem Ipsum passages”
                                </p>
                                <div class="marque d-flex align-items-center gap-3">
                                    <img src="{{ asset('Trade_Storage/assets/img/marqu.png') }}" alt="" />
                                    <div>
                                        <h5>Dumas Bastein</h5>
                                        <p>Founder and Director, le FAW</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection