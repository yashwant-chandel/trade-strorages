@extends('front_layout.master')
@section('content')

<?php
if(isset($_GET['storage_type'])){
    $storage_type_selected = $_GET['storage_type'];
}else{
    $storage_type_selected = '';
}
if(isset($_GET['location'])){
    $location = $_GET['location'];
}else{
    $location = null;

}

?>
    <section>
        <div class="container">
            <ul class="find_breadcrumb">
                <li><a href="">Home</a><span>|</span></li>
                <li><a href="">Locations </a><span>|</span></li>
                <li>
                <a class="active_crumb" href=""
          >@if(isset($_GET['location'])) {{ $_GET['location'] }} @endif</a
        >
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
                            <h2>Find Storage Near You</h2>
                            <div class="find_search">
                            <form action="{{ url('storage-search') }}" method="get">
                                <input  class="find_serch" type="text" name="location" placeholder="Enter city, state or zipcode" value="{{ $location ?? '' }}" />
                                <input class="find_btn_txt" type="submit" name="" id="" value="Search" />
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="find_box">
                            <ul class="find_list">
                                @foreach($site_features as $features)
                                    <li><img src="{{ asset('Trade_Storage/assets/img/list_icons.png') }}" alt=""> {{ $features->title ?? '' }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="result p_100">
        <div class="container">
            <h3>
                 Results for Storage locations near @if(isset($_GET['location'])) {{ $_GET['location'] }} @endif
            </h3>
            <div class="row">
                <div class="col-lg-9" id="properties_div">
                    <div class="result_box">
                        <div class="featured">
                        <div class="reslut_select" select_type="sizes" id="sizes_box">
                                <select name="sizes" id="sizes" name="sizes" class="custom-select sources" placeholder="Sizes" >
                                    @foreach($sizes_filter as $sizesf)
                                        <option value="{{ $sizesf->id ?? '' }}"@if(isset($_GET['sizes'])) @if($sizesf->slug == $_GET['sizes']) selected @endif @endif>{{ $sizesf->name ?? '' }}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="reslut_select reslut_select2">
                                    <label for="orderBy">Sort by</label>
                                    <select name="orderby" id="orderBy" class="custom-select sources" placeholder="Closest" >
                                        <option value="closeest">Closest</option>
                                        <option value="sizes">Sizes</option>
                                    </select>
                                    <div class="size_chart">
                                        <a href="">Size Guide</a>
                                    </div>
                                    </div>
                        </div>
                    </div>
                    <div class="properties">
                    @if($properties->isNotEmpty())
                    @foreach($properties as $propertie)
                    <div class="result_book">
                        <div class="result_descp">
                            <div class="result_img">
                                <img src="{{ asset('property_images/'.$propertie->featured_image->image_name) }}" alt="" />
                                <span>{{ count($propertie->storages) }}</span>
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
                            <?php $count = 0; ?>
                            @foreach($propertie->storages as $storages)
                            <?php $count++; ?>
                                <li @if($count > 3) class="storage{{ $propertie->id ?? '' }}  d-none " @endif>
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
                            @if(count($propertie->storages) > 3)
                                <div class="view_units">
                                    <img src="" alt="" />
                                    <a href="" class="view_all_btn" data-id ="{{ $propertie->id ?? '' }}" ><span>+</span> View all units at this location</a>
                                </div>
                            @endif
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    </div>
                    <div class="new_rental">
                        <div class="new_txt"><p>NEW</p></div>
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
                                            <p>Use <span> YOUR PHONE </span> to Open Gates Doors & Elevators</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="result_box2">
                        <div class="result_map">
                            <img src="{{ asset('Trade_Storage/assets/img/map.png') }}" alt="" />
                            <a href="">View large map</a>
                        </div>
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
                        <div class="result_filter result_filter_last">
                            <h4>Unit Features</h4>
                            <form id="features_form">
                            @foreach($feature_filter as $featuref)
                                <div class="form-group">
                                <input type="checkbox" class="features_filter" id="{{ $featuref->slug ?? '' }}" name="features" value="{{ $featuref->id ?? '' }}">
                                <label for="{{ $featuref->slug ?? '' }}">{{ $featuref->name ?? ''}}</label>
                                </div> 
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
          features = [];
          size = null;
          category = null;
          location1 = "{{ $location }}";
         
            $('.storage_type').on('change',function(){
                value = $(this).val();
                category = value;
               $.ajax({
                method: 'post',
                url: '{{ url('getFeatures') }}',
                data: { _token:"{{ csrf_token() }}",value:value },
                success: function(response){
                    checkboxes = '';
                    $.each(response,function(key,val){
                        checkboxes += ` <div class="form-group">
                                        <input type="checkbox" id="${val.slug}" class="features_filter" name="features" value="${val.id}">
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
                  
                    checkboxes = '';
                    select_box = ''
                    span_html =''
                    $.each(response,function(key,val){
                      select_box += `<option value="${val.id}">${val.name}</option>`;
                      span_html += `<span class="custom-option undefined" data-value="${val.id}">${val.name}</span>`;
                    })
                   html = `<div class="custom-select-wrapper">
                          <select name="sizes" id="sizes" class="custom-select sources" placeholder="Sizes" style="display: none;">
                                 ${select_box}       
                            </select>
                      <div class="custom-select sources">
                          <span class="custom-select-trigger">Sizes</span>
                              <div class="custom-options">
                               ${span_html} 
                               </div>
                        </div>
                    </div>`;
                    $('#sizes_box').html(html);
                }
                })
               ajaxRequest(category,features,size,location1)
            })
            $('body').delegate('.features_filter','change',function(){
              val = $(this).val();
              console.log(val);
              if($(this).prop('checked')){
              features.push(val);
              }else{
                features = jQuery.grep(features, function(value) {
                            return value != val;
                    });
              }
              ajaxRequest(category,features,size,location1)
            })
            ////sizes filter code
            $("body").delegate('.custom-option','click',function(){
               parent = $(this).parent().parent().parent().parent();
                if(parent.attr('select_type') == 'sizes'){
                  size = $(this).attr('data-value');
                  
                  ajaxRequest(category,features,size,location1);
                }
            });
        })

        function ajaxRequest(category,features,size,location1){
            $.ajax({
              method: 'post',
              url: '{{ url('inexFilterResponse') }}',
              data:{ _token:"{{ csrf_token() }}",category:category,features:features,size:size,location:location1 },
              success:function(response){
                propertie = '';
                $.each(response,function(key,value){
                  storages = '';
                  storages_data = value.storages;
                  num = 0;
                 $.each(storages_data,function(key1,value1){
                  if(num > 3){
                    classname = `storage${value.id} d-none`;
                  }else{
                    classname = '';
                  }
                  features = getFeatures(value1.id);
                  console.log(features);
                  features_html = '';
                  $.each(features,function(key2,value2){
                    features_html += `<div class="climate d-flex gap-2">
                                    <img src="{{ asset('Trade_Storage/assets/img/climate1.png') }}" alt="" />
                                    <p>${value2.name}</p>
                                    </div>`;
                  })
                  num = num+1;
                          storages += `<li ${classname}>
                                                <ol>
                                                  <li class="sizing">
                                                    <h5>${value1.title}</h5>
                                                        ${features_html}
                                                  </li>
                                                  <li class="sale">
                                                    <div class="price">
                                                      <h3>
                                                        <sup>$</sup>${value1.discount_price}<span>/mo</span>
                                                        <span class="doller">$${value1.discount_price}</span>
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
                                              </li>`;
                                      
                        });
       
                        
                          if(value.storages.length > 3){
                            extra_div = `<div class="view_units">
                                                <img src="" alt="" />
                                                <a class="view_all_btn" data-id ="${value.id}" href=""
                                                  ><span>+</span> View all units at this location</a
                                                >
                                              </div>`
                          }else{
                            extra_div = ''
                          }

                          propertie += ` <div class="result_book">
                                  <div class="result_descp">
                                    <div class="result_img">
                                      <img src="{{ asset('property_images/') }}/${value.featured_image.image_name}" alt="" />
                                      <span>${value.storages.length}</span>
                                    </div>
                                    <a href="{{ url('storage-search/') }}/${value.slug}">
                                    <address>
                                      ${value.address.address},<br />
                                      ${value.address.city},
                                      ${value.address.state}
                                      ${value.address.pincode}
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
                                      ${storages}
                                      ${extra_div}
                                    </ul>
                                  </div>
                                </div>`;
                })
                // console.log(propertie);
                // $('.result_book').remove();
                $('.properties').html(propertie);
                
              }
            })

        }
        
        function getFeatures(storage_id){
            return new Promise(function (resolve, reject) {
            $.ajax({
                method: 'post',
                url: '{{ url('inexFilterResponse') }}',
                data: { _token:"{{ csrf_token() }}",id:storage_id,action:'getfeatures' },
                success:function(response){
                  resolve(response);
                }
            })
        });

        }
      
        $(document).ready(function(){
          $("body").delegate('.view_all_btn','click',function(e){
            e.preventDefault();
            id = $(this).attr('data-id');
           $('.storage'+id).toggleClass('d-none');
        //    $(this).toggle

          })
        })
    </script>
    @endsection