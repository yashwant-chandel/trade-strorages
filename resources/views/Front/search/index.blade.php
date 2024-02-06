@extends('front_layout.master')
@section('content')

<?php
if(isset($_GET['storage_type'])){
    $storage_type_selected = $_GET['storage_type'];
}else{
    $storage_type_selected = '';
}

?>
<ul class="find_breadcrumb">
      <li><a href="/">Home</a><span>|</span></li>
      <li><a href="">Locations </a><span>|</span></li>
      <li>
        <a class="active_crumb" href=""
          >@if(isset($_GET['location'])) {{ $_GET['location'] }} @endif</a
        >
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
                  <input
                    type="text"
                    placeholder="1023 Shallowford Rd, Mari..."
                  />
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

    <section class="result">
      <div class="container">
        <h3>
          Results for Storage locations near @if(isset($_GET['location'])) {{ $_GET['location'] }} @endif
        </h3>
        <div class="row">
          <div class="col-md-9">
            <div class="result_box">
              <div class="featured">
                <div class="reslut_select">
                  <select
                    name="location"
                    id="featured"
                    class="custom-select sources"
                    placeholder="Featured"
                  >
                    <option value="1">one</option>
                    <option value="2">two</option>
                    <option value="3">three</option>
                    <option value="4">Founder</option>
                    <option value="5">sixes</option>
                  </select>
                </div>
                <div class="reslut_select reslut_select2">
                  <label for="#Closest">Sort by</label>
                  <select
                    name="location"
                    id="Closest"
                    class="custom-select sources"
                    placeholder="Closest"
                  >
                    <option value="1">one</option>
                    <option value="2">two</option>
                    <option value="3">three</option>
                    <option value="4">Founder</option>
                    <option value="5">sixes</option>
                  </select>
                  <div class="size_chart">
                    <a href="">Size Guide</a>
                  </div>
                </div>
              </div>
            </div>
            @if($properties->isNotEmpty())
            @foreach($properties as $propertie)
            <div class="result_book">
              <div class="result_descp">
                <div class="result_img">
                  <img src="{{ asset('property_images/'.$propertie->featured_image->image_name) }}" alt="" />
                  <span>1</span>
                </div>
                <a href="{{ url('storage-search/'.$propertie->slug) }}">
                <address>
                  {{ $propertie->address->address ?? '' }},<br />
                  {{ $propertie->address->city ?? '' }},
                  {{ $propertie->address->state ?? '' }}
                  {{ $propertie->address->pincode ?? '' }}
                </address>
                </a>
                <div class="stars d-flex align-items-center gap-1">
                  <img src="{{ asset('Trade_Storage/assets/img/Star1.png') }}" alt="" />
                  <img src="{{ asset('Trade_Storage/assets/img/Star1.png') }}" alt="" />
                  <img src="{{ asset('Trade_Storage/assets/img/Star1.png') }}" alt="" />
                  <img src="{{ asset('Trade_Storage/assets/img/Star1.png') }}" alt="" />
                  <img src="{{ asset('Trade_Storage/assets/img/Star1.png') }}" alt="" />
                </div>
                <div class="miles">
                  <p>1.7 miles</p>
                </div>
              </div>
              <div class="result_hold">
                <ul>
                  @foreach($propertie->storages as $storages)
                  <li>
                    <ol>
                      <li class="sizing">
                        <h5>{{ $storages->title ?? '' }}</h5>
                        <?php 
                        $features = json_decode($storages->features);
                        ?>
                        @foreach($features as $feature)
                        <?php $featureget = App\Models\Feature::find($feature); ?>
                        <div class="climate d-flex gap-2">
                          <img src="{{ asset('Trade_Storage/assets/img/climate1.png') }}" alt="" />
                          <p>{{ $featureget->name ?? '' }}</p>
                        </div>
                        @endforeach
                      </li>
                      <li class="sale">
                        <div class="price">
                          <h3>
                            <sup>$</sup>{{ $storages->discount_price ?? '' }}<span>/mo</span>
                            <span class="doller">${{ $storages->regular_price ?? '' }}</span>
                          </h3>
                          <p>Online only price</p>
                          <img
                            style="display: block; margin-bottom: 5px"
                            src="{{ asset('Trade_Storage/assets/img/sale.png') }}"
                            alt=""
                          />
                          <img src="{{ asset('Trade_Storage/assets/img/prices.png') }}" alt="" />
                        </div>
                      </li>
                      <!-- <li class="rent_img">
                        <img src="{{ asset('Trade_Storage/assets/img/rent_img.png') }}" alt="" />
                      </li> -->
                      <li class="obligation">
                        <button>Hold Now</button>
                        <p>No Obligation</p>
                      </li>
                    </ol>
                  </li>
                  @endforeach
                  <div class="view_units">
                    <img src="" alt="" />
                    <a href=""
                      ><span>+</span> View all units at this location</a
                    >
                  </div>
                </ul>
              </div>
            </div>
            @endforeach
            @endif
            <!-- <div class="new_rental">
              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <h4>
                      The Ultimate Tools for <br /><span
                        >Contactless Storage</span
                      >
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
                        <img src="{{ asset('/Trade_Storage/assets/img/rental2.png') }}" alt="" />
                        <p>
                          Use <span> YOUR PHONE </span> to Open Gates Doors &
                          Elevators
                        </p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- <div class="result_book">
                <div class="result_descp">
                  <div class="result_img">
                    <img src="{{ asset('Trade_Storage/assets/img/rs1.png') }}" alt="" />
                    <span>1</span>
                  </div>
                  <address>
                    1023 Shallowford Rd, <br />
                    Marietta, Ga 30066
                  </address>
                  <div class="stars d-flex align-items-center gap-1">
                    <img src="{{ asset('Trade_Storage/assets/img/Star1.png') }}" alt="" />
                    <img src="{{ asset('Trade_Storage/assets/img/Star1.png') }}" alt="" />
                    <img src="{{ asset('Trade_Storage/assets/img/Star1.png') }}" alt="" />
                    <img src="{{ asset('Trade_Storage/assets/img/Star1.png') }}" alt="" />
                    <img src="{{ asset('Trade_Storage/assets/img/Star1.png') }}" alt="" />
                  </div>
                  <div class="miles">
                    <p>1.7 miles</p>
                  </div>
                </div>
                <div class="result_hold">
                  <ul>
                    <li>
                      <ol>
                        <li class="sizing">
                          <h5>Small 5’x5’</h5>
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
                              <sup>$</sup>35<span>/mo</span>
                              <span class="doller">$46</span>
                            </h3>
                            <p>Online only price</p>
                            <img
                              style="display: block; margin-bottom: 5px"
                              src="{{ asset('Trade_Storage/assets/img/sale.png') }}"
                              alt=""
                            />
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
                    <div class="view_units">
                      <img src="" alt="" />
                      <a href=""
                        ><span>+</span> View all units at this location</a
                      >
                    </div>
                  </ul>
                </div>
              </div> -->
          </div>
          <div class="col-md-3">
            <div class="result_box2">
              <div class="result_map">
                <img src="{{ asset('Trade_Storage/assets/img/map.png') }}" alt="">
                <a href="">View large map</a>
              </div>
              @if($storage_types->isNotEmpty())
              
              <div class="result_filter">
                <h4>Filter By</h4>
                <form action="#">
                    @foreach($storage_types as $types)
                  <p>
                    <input type="radio" class="storage_type" id="{{ $types->slug ?? '' }}" name="radio-group" value="{{ $types->slug ?? '' }}" @if($storage_type_selected == $types->slug) checked @endif />
                    <label for="{{ $types->slug ?? '' }}">{{ $types->name ?? '' }}</label>
                  </p>
                  @endforeach
                </form>
              </div>
              @endif
              <div class="result_filter result_filter_last">
                <h4>Unit Features</h4>
                <form id="features_form">
                    <div class="form-group">
                      <input type="checkbox" id="html">
                      <label for="html">Climate Controlled</label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" id="css">
                      <label for="css">Drive Up Access</label>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
        $(document).ready(function(){
            $('.storage_type').on('change',function(){
                value = $(this).val();
               $.ajax({
                method: 'post',
                url: '{{ url('getFeatures') }}',
                data: { _token:"{{ csrf_token() }}",value:value },
                success: function(response){
                    checkboxes = '';
                    $.each(response,function(key,val){
                        checkboxes += ` <div class="form-group">
                                        <input type="checkbox" id="${val.slug}" name="features[]" value="${val.slug}">
                                        <label for="${val.slug}">${val.name}</label>
                                    </div>`;
                    })
                    $('#features_form').html(checkboxes);
                }
               })

            })
        })
    </script>
@endsection