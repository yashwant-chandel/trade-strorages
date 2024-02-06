@extends('front_layout.master')
@section('content')


<ul class="find_breadcrumb">
        <li><a href="">Home</a><span>|</span></li>
        <li><a href="">Locations </a><span>|</span></li>
        <li>
            <a class="active_crumb" href="">1023 Shallowford Rd, Marietta, Ga 30066</a>
        </li>
    </ul>
    <section class="find">
        <div class="container">
            <div class="find_main">
                <div class="row">
                    <div class="col-md-5">
                        <div class="find_box">
                            <h2>Find Storage Near You</h2>
                            <div class="find_search">
                                <input type="text" placeholder="Enter City, State or Zip" />
                                <input type="button" name="" id="" value="Search" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="find_box">
                            <ul class="find_list">
                                <li>$1 First Month Rent Where Available</li>
                                <li>No Obligation to rent</li>
                                <li>All rentals month to month</li>
                                <li>Trusted nationwide since 1972</li>
                                <li>No credit card required</li>
                                <li>Convenient Access hours</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="public_store">
        <div class="container">
            <h4>Trade Storage Units at {{ $propertie->address->address ?? '' }}, {{ $propertie->address->city ?? '' }}, {{ $propertie->address->state ?? '' }} {{ $propertie->address->pincode ?? '' }}</h4>
            <div class="row">
                <div class="col-md-5">
                    <div class="public_store_box">
                    <div class="public_arows">
                        <div class="left_arow">
                            <img src="{{ asset('Trade_Storage/assets/img/leftarow.png') }}" alt="">
                        </div>
                        <div class="right_arow">
                            <img src="{{ asset('Trade_Storage/assets/img/rigtharow.png') }}" alt="">
                        </div>
                    </div>
                    <div class="public_slider">
                        <div class="public_slideimg">
                            <img src="{{ asset('property_images/'.$propertie->featured_image->image_name) }}" alt="">
                        </div>
                        @foreach($propertie->media as $media)
                        <div class="public_slideimg">
                            <img src="{{ asset('property_images/'.$media->image_name) }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
                </div>
                <div class="col-md-7">
                    <div class="public_conten d-flex">
                        <div class="public_adres">
                            <h3>Address</h3>
                            <p>{{ $propertie->address->address ?? '' }} <br> {{ $propertie->address->city ?? '' }}, {{ $propertie->address->state ?? '' }} {{ $propertie->address->pincode ?? '' }}</p>
                             <div class="star_public d-flex gap-1 align-items-center"><span>4.8</span><img src="{{ asset('Trade_Storage/assets/img/Star1.png') }}" alt=""><p>345 Reviews</p></div> 
                             
                             <a href="//{{ $propertie->map_url ?? '' }}">Get directions</a>
                        </div>
                        <?php $options = json_decode($propertie->external_option); ?>
                        <div class="public_hours">
                            @foreach($options as $option)
                            <div class="ofice_hour">
                                @foreach($option as $key=>$val)
                                <h4>{{ $key ?? '' }}</h4>
                                <p><?php echo $val; ?></p>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="public_slideing">
                        <a class="" href="">See Storage Facility Features</a>
                    
                        <div class="slide_public2">
                        <div class="public_slideimg">
                            <img src="{{ asset('property_images/'.$propertie->featured_image->image_name) }}" alt="">
                        </div>
                        @foreach($propertie->media as $media)
                        <div class="public_slideimg">
                            <img src="{{ asset('property_images/'.$media->image_name) }}" alt="">
                        </div>
                        @endforeach
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="result result_details">
        <div class="container">
            <h3 class="rdetail_title">
                <span> Reserve Today </span>Month-to-Month Rent, No obligations
            </h3>
            <div class="row">
                <div class="col-md-9">
                    <div class="result_box">

                        <div class="result_book">
                            <div class="result_hold">
                                <ul>
                                    @foreach($propertie->storages as $storage)
                                    <li>
                                        <ol>
                                            <li class="sizing">
                                                <h5>{{ $storage->title ?? '' }}</h5>
                                                <div class="climate d-flex gap-2">
                                                    <img src="{{ asset('Trade_Storage/assets/img/climate1.png') }}" alt="" />
                                                    <p>Climate Controlled</p>
                                                </div>
                                                <div class="climate d-flex gap-2">
                                                    <img src="{{ asset('Trade_Storage/assets/img/climate2.png') }}" alt="" />
                                                    <p>1st Floor</p>
                                                </div>
                                            </li>
                                            <li class="sale">
                                                <div class="price">
                                                    <h3>
                                                        <sup>$</sup>{{ $storage->discount_price ?? '' }}<span>/mo</span>
                                                        <span class="doller">${{ $storage->regular_price ?? '' }}</span>
                                                    </h3>
                                                    <p>Online only price</p>
                                                    <img style="display: block; margin-bottom: 5px"
                                                        src="{{ asset('Trade_Storage/assets/img/sale.png') }}" alt="" />
                                                    <img src="{{ asset('Trade_Storage/assets/img/prices.png') }}" alt="" />
                                                </div>
                                            </li>
                                            <li class="rent_img">
                                                <img src="{{ asset('Trade_Storage/assets/img/rent_img.png') }}" alt="" />
                                            </li>
                                            <li class="obligation">
                                                <button>Hold Now</button>
                                                <p>No Obligation</p>
                                            </li>
                                        </ol>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    <div class="new_rental">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>
                                            The Ultimate Tools for <br /><span>Contactless Storage</span>
                                        </h4>
                                    </div>
                                    <div class="col-md-8">
                                        <ul class="rental_cont d-flex align-items-center">
                                            <li>
                                                <img src="{{ asset('Trade_Storage/assets/img/rental1.png') }}" alt="" />
                                                <p>
                                                    Online Payment & Contract So You
                                                    <span>Can Limit Your Contact </span>
                                                </p>
                                            </li>
                                            <li>
                                                <h4>+</h4>
                                            </li>
                                            <li>
                                                <img src="{{ asset('Trade_Storage/assets/img/rental2.png') }}" alt="" />
                                                <p>
                                                    Use <span> YOUR PHONE </span> to Open Gates Doors &
                                                    Elevators
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="result_box2">
                        <div class="result_map">
                            <img src="{{ asset('Trade_Storage/assets/img/map.png') }}" alt="">
                            <a href="">View large map</a>
                        </div>
                        <div class="result_filter">
                            <h4>Filter By</h4>

                            <form action="#">
                                <?php $first = true; ?>
                                @foreach($storage_types as $types)
                                <p>
                                    <input type="radio" class="storage_type" id="{{ $types->slug ?? '' }}" name="storage_types" data-slug="{{ $types->slug ?? '' }}" value="{{ $types->id ?? '' }}" @if($first == true) checked @endif/>
                                    <?php $first = false; ?>
                                    <label for="{{ $types->slug ?? '' }}">{{ $types->name ?? '' }}</label>
                                </p>
                                @endforeach
                            </form>
                        </div>
                        
                        <div class="result_filter" id="sizes_form">
                        <h4>Sizes</h4>
                                @foreach($storage_types[0]->sizes as $sizes)
                                <div class="form-group">
                                    <input type="checkbox" id="{{ $sizes->slug ?? '' }}" name="sizes[]" value="{{ $sizes->id ?? '' }}">
                                    <label for="{{ $sizes->slug ?? '' }}">{{ $sizes->name ?? '' }}</label>
                                </div>
                                @endforeach
                        </div>
                        <div class="result_filter result_filter_last" id="features_form">
                            <h4>Unit Features</h4>
                            @foreach($storage_types[0]->features as $features)
                                <div class="form-group">
                                    <input type="checkbox" id="{{ $features->slug ?? '' }}" name="features[]" value="{{ $features->id ?? '' }}">
                                    <label for="{{ $features->slug ?? '' }}">{{ $features->name ?? '' }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <section class="self_storage">
        <div class="container">
            <div class="slf_storage_main">
                <h3>Nearby Self-Storage Locations</h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="slf_box">
                            <div class="slf_img">
                                <img src="{{ asset('Trade_Storage/assets/img/slf1.png') }}" alt="">
                            </div>
                            <h4>Self Storage Near</h4>
                            <a>1023 Shallowford Rd, <br> Marietta, Ga 30066</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="slf_box">
                            <div class="slf_img">
                                <img src="{{ asset('Trade_Storage/assets/img/slf2.png') }}" alt="">
                            </div>
                            <h4>Self Storage Near</h4>
                            <a>1023 Shallowford Rd, <br> Marietta, Ga 30066</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="slf_box">
                            <div class="slf_img">
                                <img src="{{ asset('Trade_Storage/assets/img/slf3.png') }}" alt="">
                            </div>
                            <h4>Self Storage Near</h4>
                            <a>1023 Shallowford Rd, <br> Marietta, Ga 30066</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="slf_box">
                            <div class="slf_img">
                                <img src="{{ asset('Trade_Storage/assets/img/slf4.png') }}" alt="">
                            </div>
                            <h4>Self Storage Near</h4>
                            <a>1023 Shallowford Rd, <br> Marietta, Ga 30066</a>
                        </div>￼ + View all units at this location
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="north_trade">
        <div class="container">
            <div class="north_cont">
                <h3>North Trade Storage Units Near Sandy Plains Rd.
                    and Canton Rd.</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it look like
                    readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                    default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                    infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                    (injected humour and the like).
                </p>

                <h5>At Public Storage, You'll Always Find...</h5>
                <ul class="norht_list">
                    <li>Keypad Access
                    </li>
                    <li>Friendly Staff
                    </li>
                    <li>Month-to-Month Rent
                    </li>
                    <li>Moving Supplies Available
                    </li>
                    <li>Free Parking
                    </li>
                    <li>Well-Lit Facilities
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="reivew">
        <div class="container">
            <div class="review_main">
                <h3>Reviews <span>(345)</span></h3>
                <ul>
                    <li class="review_box">
                        <div class="stars d-flex gap-1">
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="">
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="">
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="">
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="">
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="">
                        </div>
                        <div class="review_descp d-flex justify-content-between">
                            <h5>Google · Trade Storage · Jeff Chadwick</h5>
                            <h5>January 23, 2024</h5>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $('.storage_type').on('change',function(){
                value = $(this).attr('data-slug');
               $.ajax({
                method: 'post',
                url: '{{ url('getFeatures') }}',
                data: { _token:"{{ csrf_token() }}",value:value },
                success: function(response){
                    checkboxes = '<h4>Unit Features</h4>';
                    $.each(response,function(key,val){
                        checkboxes += ` <div class="form-group">
                                        <input type="checkbox" id="${val.slug}" name="features[]" value="${val.id}">
                                        <label for="${val.slug}">${val.name}</label>
                                    </div>`;
                    })
                    $('#features_form').html(checkboxes);
                }
               })
               $.ajax({
                method: 'post',
                url: '{{ url('getSizes') }}',
                data: { _token:"{{ csrf_token() }}",value:value },
                success: function(response){
                    checkboxes = '<h4>Sizes</h4>';
                    $.each(response,function(key,val){
                       checkboxes += `<div class="form-group">
                                    <input type="checkbox" id="${val.slug}" name="sizes[]" value="${val.id}">
                                    <label for="${val.slug}">${val.name}</label>
                            </div>`;
                    })
                    $('#sizes_form').html(checkboxes);
                }
                })

            })
        })
    </script>
@endsection