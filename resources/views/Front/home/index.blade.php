@extends('front_layout.master')

@section('content')

    <section class="top_bar">
        <p>What's it like to store with us? <a href="">Ask Us!</a></p>
    </section>
    @if(isset($homecontent->banner_image))
    <section class="home_banner bg_style" style="background-image: url({{ asset('site_images/'.$homecontent->banner_image) }})">
     @else
     <section class="home_banner bg_style" style="background-image: url({{ asset('Trade_Storage/assets/img/home_bg.png') }})">
     @endif
        <div class="container">
            <div class="banner_cont">
                @if(isset($homecontent))
                <h1>{{ $homecontent->banner_title ?? 'Easy Online Rental' }}</h1>
                @else
                <h1>Easy Online Rental</h1>
                @endif
                <p>{{ $homecontent->banner_subtitle ?? 'Skip the counter & go straight to your space.' }}</p>
                <div class="banner_rent">
                    @if(isset($homecontent->banner_offer_text))
                    <img src="{{ asset('site_images/'.$homecontent->banner_offer_text) }}" alt="">
                    @else
                    <img src="{{ asset('Trade_Storage/assets/img/num2.png') }}" alt="" />
                    @endif
                </div>
            </div>
        </div>
        <form action="{{ url('storage-search') }}" method="get">
        <div class="office d-flex align-items-center">
            <ul>
                <li class="office_rent">
                    <div class="office_selection office_slec1">
                        <label for="location">location</label>
                        <input type="text" id="location" name="location" value="1023 Shallowford Rd, Marietta, GA 30066"/>
                    </div>
                </li>
                <li class="office_rent office_rent2">
                    <div class="office_selection office_slec2" select-type="storage_type">
                        <select name="storage_type" id="storage_type" class="custom-select sources" placeholder="Select">
                           @foreach($storage_types as $types)
                            <option value="{{ $types->slug ?? '' }}">{{ $types->name ?? '' }}</option>
                            @endforeach
                        </select>
                        <label for="potencial">Storage Type</label>
                    </div>
                </li>
                <li class="office_rent office_rent3">
                    <div class="office_selection office_slec3" select-type="sizes">
                        <select name="sizes" id="sizes" class="custom-select sources" placeholder="Select">
                            <option >Select</option>
                        </select>
                        <label for="potencial">Sizes</label>
                    </div>
                </li>
            </ul>
            <div>
                <input type="submit" value="Search" />
            </div>
        </div>
        </form>
    </section>
    <section class="loaction-sec" id="location">
        <div class="container">
            <div class="tittle_heading">
                <h2>
                    @if(isset($homecontent->second_section_heading))
                   <?php echo $homecontent->second_section_heading; ?>
                    @else
                    Get Started With Exploring Real <br />
                    Estate Options
                    @endif
                </h2>
            </div>
            <div class="row loc-row">
                <div class="col-md-4 loc-col">
                    <div class="location-text yellow">
                        @if(isset($homecontent->second_section_text))
                        <?php echo $homecontent->second_section_text ?> 
                        @else
                        <p>
                            Lorem Ipsum has been the industry's standard dummy text ever
                            since the 1500s, when an unknown printer took a galley of type
                            and scrambled it to make a type specimen book.
                        </p>
                        @endif
                    </div>
                </div>
                @if(isset($homecontent->slider_data))
                <div class="col-md-8 slide-col">
                    <div class="loctaion-slider">
                        <?php $slider_data = json_decode($homecontent->slider_data);  ?>
                        @foreach($slider_data as $data)
                        <div class="location-list">
                            <div class="location-box">
                                <div class="loc-img">
                                    <img src="{{ asset('site_images/'.$data->image) }}" alt="" />
                                    <h4><?php print_r($data->text); ?></h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
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
                @endif
            </div>
        </div>
    </section>
    <section class="trade bg_style">
        <div class="container">
            <div class="trade_cont">
                <div class="trade_title d-flex justify-content-between align-items-center">
                    <h2>
                        @if(isset($homecontent->third_section_title))
                        <?php echo $homecontent->third_section_title; ?>
                        @else
                        Trade Storage <br />
                        <span>Value</span>
                        @endif
                    </h2>
                    <div class="star_img">
                        <img src="{{ asset('Trade_Storage/assets/img/star.png') }}" alt="" />
                    </div>
                </div>
                @if(isset($homecontent->third_section_text))
                <?php echo $homecontent->third_section_text; ?>
                @else
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
                @endif
            </div>
        </div>
    </section>
    <section class="self">
        <div class="container">
            <div class="tittle_heading">
                <span>The Process</span>
                <h2>
                    @if(isset($homecontent->process_section_title))
                    <?php echo $homecontent->process_section_title; ?>
                    @else
                    Here’s how the self-storage <br />
                    process works.
                    @endif
                </h2>
            </div>
            @if(isset($homecontent->process_section_process))
            <?php $process_data = json_decode($homecontent->process_section_process); ?>
            <div class="row">
                @foreach($process_data as $data)
                <div class="col-md-4">
                    <div class="self_box">
                        <div class="self_img">
                            <img src="{{ asset('site_images/'.$data->image) }}" alt="" />
                        </div>
                        <?php echo $data->text; ?>
                    </div>
                </div>
                @endforeach
            </div>
            @else
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
            @endif
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $("body").delegate('.custom-option','click',function(){
            // $('.custom-option').click(function(){
               parent = $(this).parent().parent().parent().parent();
                select_type = parent.attr('select-type');
            if(select_type == 'storage_type'){
                value = $(this).attr('data-value');
                $.ajax({
                    method:'post',
                    url:"{{ url('getSizes') }}",
                    data: { _token:"{{ csrf_token() }}",value:value },
                    success:function(response){
                        // console.log(response);
                       options ='';
                       span_options ='';
                      
                        $.each(response,function(key,value){
                            options +=  `<option value="${value.slug}">${value.name}</option>`;
                            span_options += `<span class="custom-option undefined" data-value="${value.slug}">${value.name}</span>`;
                        })
                        html = `<div class="custom-select-wrapper">
                                <select name="sizes" id="sizes" class="custom-select sources" placeholder="Select" style="display: none;">
                                ${options}
                                </select>
                            <div class="custom-select sources">
                            <span class="custom-select-trigger">Select</span>
                                <div class="custom-options">
                                ${span_options}
                                </div>
                            </div>
                            </div><label for="potencial">Sizes</label>`;
                            $('.office_slec3').html(html);

                    }
                })
            }else if(select_type == 'sizes'){
                console.log($('#storage_type').val());
            }                
            })
        })
    </script>

@endsection