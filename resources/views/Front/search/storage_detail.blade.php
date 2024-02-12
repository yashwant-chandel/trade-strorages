@extends('front_layout.master')
@section('content')
    <section>
        <div class="container">
            <ul class="find_breadcrumb">
                <li><a href="">Home</a><span>|</span></li>
                <li><a href="">Locations </a><span>|</span></li>
                <li>
                <a class="active_crumb" >{{ $propertie->address->address ?? '' }}, {{ $propertie->address->city ?? '' }}, {{ $propertie->address->state ?? '' }} {{ $propertie->address->pincode ?? '' }}</a>
                </li>
            </ul>
        </div>
    </section>

    <section class="find">
        <div class="container">
            <div class="find_main">
                <div class="row">
                    <div class="col-md-5">
                        <div class="find_box">
                        <form action="{{ url('storage-search') }}" method="get">
                            <h2>Find Storage Near You</h2>
                            <div class="find_search">
                                <input class="find_serch" type="text" placeholder="1023 Shallowford Rd, Mari..." />
                                <input class="find_btn_txt" type="submit" name="" id="" value="Search" />
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="find_box">
                            <ul class="find_list">
                            @foreach($site_features as $features)
                                 <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt="" />{{ $features->title ?? '' }}</li>
                            @endforeach
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
                <div class="col-lg-5">
                    <div class="public_store_box">
                        <div class="public_arows">
                            <div class="left_arow">
                                <img src="assets/img/leftarow.png" alt="" />
                            </div>
                            <div class="right_arow">
                                <img src="assets/img/rigtharow.png" alt="" />
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
                <div class="col-lg-7">
                    <div class="public_conten d-flex">
                        <div class="public_adres">
                            <h3>Address</h3>
                            <p>{{ $propertie->address->address ?? '' }} <br> {{ $propertie->address->city ?? '' }}, {{ $propertie->address->state ?? '' }} {{ $propertie->address->pincode ?? '' }}</p>
                            <div class="star_public d-flex gap-1 align-items-center">
                                <span>4.8</span><img src="{{ asset('Trade_Storage/assets/img/Star1.png') }}" alt="" />
                                <p>345 Reviews</p>
                            </div>

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
            <h3 class="rdetail_title"><span> Reserve Today </span>Month-to-Month Rent, No obligations</h3>
            <div class="row">
                <div class="col-lg-9">
                    <div class="result_box">
                        <div class="result_book">
                            <div class="result_hold">
                                <ul id="storages_ul">

                                @foreach($propertie->storages as $storage)
                                    <li>
                                        <ol>
                                        <li class="sizing">
                                                <h5>{{ $storage->title ?? '' }}</h5>
                                                <?php $features = json_decode($storage->features); ?>
                                                @foreach($features as $feat)
                                                <?php $featureget = App\Models\Feature::find($feat); ?>
                                                <div class="climate d-flex gap-2">
                                                    <img src="{{ asset('Trade_Storage/assets/img/climate1.png') }}" alt="" />
                                                    <p>{{ $featureget->name ?? '' }}</p>
                                                </div>
                                                @endforeach
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

                        <!-- <div class="new_rental">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>
                                            The Ultimate Tools for <br />
                                            <span>Contactless Storage</span>
                                        </h4>
                                    </div>
                                    <div class="col-md-8">
                                        <ul class="rental_cont d-flex align-items-center">
                                            <li>
                                                <img src="assets/img/rental1.png" alt="" />
                                                <p>
                                                    Online Payment & Contract So You
                                                    <span>Can Limit Your Contact </span>
                                                </p>
                                            </li>
                                            <li>
                                                <h4>+</h4>
                                            </li>
                                            <li>
                                                <img src="assets/img/rental2.png" alt="" />
                                                <p>Use <span> YOUR PHONE </span> to Open Gates Doors & Elevators</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="result_box2">
                        <div class="result_map">
                            <img src="assets/img/map.png" alt="" />
                            <a href="">View large map</a>
                        </div>
                        <div class="result_filter">
                            <h4>Filter By</h4>

                            <form action="#">
                                <?php $first = true; ?>
                                @foreach($storage_types as $types)
                                <p>
                                    <input type="radio" class="storage_type" id="{{ $types->slug ?? '' }}" name="storage_types" data-slug="{{ $types->slug ?? '' }}" value="{{ $types->id ?? '' }}" />
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
                                    <input type="checkbox" id="{{ $sizes->slug ?? '' }}" class="sizes" name="sizes[]" value="{{ $sizes->id ?? '' }}">
                                    <label for="{{ $sizes->slug ?? '' }}">{{ $sizes->name ?? '' }}</label>
                                </div>
                                @endforeach
                        </div>
                        <div class="result_filter result_filter_last" id="features_form">
                            <h4>Unit Features</h4>
                            @foreach($storage_types[0]->features as $features)
                                <div class="form-group">
                                    <input type="checkbox" id="{{ $features->slug ?? '' }}" class="features" name="features[]" value="{{ $features->id ?? '' }}">
                                    <label for="{{ $features->slug ?? '' }}">{{ $features->name ?? '' }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@if($near_by_properties->isNotEmpty())
    <section class="self_storage">
        <div class="container">
            <div class="slf_storage_main">
                <h3>Nearby Self-Storage Locations</h3>
                <div class="row">
                    @foreach($near_by_properties as $near)
                    <div class="col-md-3">
                        <div class="slf_box">
                            <div class="slf_img">
                                <img src="{{ asset('Trade_Storage/assets/img/slf1.png') }}" alt="" />
                            </div>
                            <h4>Storage Near</h4>
                            <a href="{{ url('storage-search/'.$near->slug) }}">{{ $near->address->address ?? '' }}, <br> {{ $near->address->city ?? '' }}, {{ $near->address->state ?? '' }} {{ $near->address->pincode ?? '' }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
    <section class="north_trade">
        <div class="container">
            <div class="north_cont">
                <h3>North Trade Storage Units Near Sandy Plains Rd. and Canton Rd.</h3>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                    to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
                    letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for
                    'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                </p>

                <h5>At Public Storage, You'll Always Find...</h5>
                <ul class="norht_list">
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> Keypad Access</li>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> Friendly Staff</li>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> Month-to-Month Rent</li>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> Moving Supplies Available</li>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> Free Parking</li>
                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> Well-Lit Facilities</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="reivew p_100 pt-0">
        <div class="container">
            <div class="review_main">
                <h3>Reviews <span>(345)</span></h3>
                <ul>
                    <li class="review_box">
                        <div class="stars d-flex gap-1">
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="" />
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="" />
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="" />
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="" />
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="" />
                        </div>
                        <div class="review_descp d-flex justify-content-between">
                            <h5>Google · Trade Storage · Jeff Chadwick</h5>
                            <h5>January 23, 2024</h5>
                        </div>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
                    </li>
                    <li class="review_box">
                        <div class="stars d-flex gap-1">
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="" />
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="" />
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="" />
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="" />
                            <img src="{{ asset('Trade_Storage/assets/img/star2.png') }}" alt="" />
                        </div>
                        <div class="review_descp d-flex justify-content-between">
                            <h5>Google · Trade Storage · Jeff Chadwick</h5>
                            <h5>January 23, 2024</h5>
                        </div>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            category = '';
            sizes = [];
            features = [];
            slug = "{{ $propertie->slug ?? '' }}";
            $('.storage_type').on('change',function(){
                value = $(this).attr('data-slug');
                category = $(this).val();
               $.ajax({
                method: 'post',
                url: '{{ url('getFeatures') }}',
                data: { _token:"{{ csrf_token() }}",value:value },
                success: function(response){
                    checkboxes = '<h4>Unit Features</h4>';
                    $.each(response,function(key,val){
                        checkboxes += ` <div class="form-group">
                                        <input type="checkbox" id="${val.slug}" class="features" name="features[]" value="${val.id}">
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
                                    <input type="checkbox" id="${val.slug}" class="sizes" name="sizes[]" value="${val.id}">
                                    <label for="${val.slug}">${val.name}</label>
                            </div>`;
                    })
                    $('#sizes_form').html(checkboxes);
                }
                })
                ajaxRequest(sizes,features,slug,category);

            })
        })
            $("body").delegate(".sizes",'change',function(){
                 val = $(this).val();
                if($(this).prop('checked')){
                    sizes.push(val);
                }else{
                    sizes = jQuery.grep(sizes, function(value) {
                            return value != val;
                    });
                }
                ajaxRequest(sizes,features,slug,category);

            })
            $("body").delegate(".features",'change',function(){
                val = $(this).val();
                if($(this).prop('checked')){
                    features.push(val);
                }else{
                    features = jQuery.grep(features, function(value) {
                            return value != val;
                    });
                }
                ajaxRequest(sizes,features,slug,category);
            })

            function ajaxRequest(sizes,features,slug,category){
              $.ajax({
                    method: 'post',
                    url: "{{ url('filterResponse') }}",
                    data: { _token:"{{ csrf_token() }}",sizes:sizes,features:features,slug:slug,category:category },
                    success:function(response){
                        html = '';
                       if(response.success){
                        count = 0;
                        $.each(response.success,function(key,val){
                            features = response.features[count];
                            feature_html = '';
                            $.each(features,function(key,val){
                                feature_html += `<div class="climate d-flex gap-2">
                                                    <img src="{{ asset('Trade_Storage/assets/img/climate1.png') }}" alt="" />
                                                    <p>${val.name}</p>
                                                </div>`;
                            })
                            html += `<li>
                                        <ol>
                                            <li class="sizing">
                                                <h5>${val.title}</h5>
                                                    ${feature_html}
                                            </li>
                                            <li class="sale">
                                                <div class="price">
                                                    <h3>
                                                        <sup>$</sup>${val.discount_price}<span>/mo</span>
                                                        <span class="doller">$${val.regular_price}</span>
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
                                    </li>`;
                            count = count+1;
                        });
                        $('#storages_ul').html(html);
                       }else if(response.error){
                            $('#storages_ul').html(response.error);
                       }
                    }
                })  
            } 

            // function getStorageFeature(ids){
            //     $.ajax({
            //         method: 'post',
            //         url:'{{ url('') }}'
            //     })
            // }
    </script>
@endsection