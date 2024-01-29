@extends('admin_layout/index')
@section('content')
<div class="nk-content ">
                    <div class="container">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Propertie Details</h3>
                                            
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="html/product-list.html" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                            <a href="html/product-list.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="row pb-5">
                                                <div class="col-lg-6">
                                                    <div class="product-gallery me-xl-1 me-xxl-5">
                                                        <div class="slider-init" id="sliderFor" data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                                           @foreach($propertie_data->media as $media)
                                                            <div class="slider-item rounded">
                                                                <img src="{{ asset($media->image_path) }}" class="w-100" alt="">
                                                            </div>
                                                            @endforeach
                                                            
                                                        </div><!-- .slider-init -->
                                                        <div class="slider-init slider-nav" id="sliderNav" data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor", "centerMode":true, "focusOnSelect": true, 
                                "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
                            }'>                     
                                            @foreach($propertie_data->media as $media)
                                                            <div class="slider-item">
                                                                <div class="thumb">
                                                                    <img src="{{ asset($media->image_path) }}" alt="">
                                                                </div>
                                                            </div>
                                            @endforeach
                                                        
                                                        </div><!-- .slider-nav -->
                                                    </div><!-- .product-gallery -->
                                                </div><!-- .col -->
                                                <div class="col-lg-6">
                                                    <div class="product-info mt-5 me-xxl-5">
                                                        <h2 class="product-title">{{ $propertie_data->address->address ?? '' }} {{ $propertie_data->address->city ?? '' }},{{ $propertie_data->address->state ?? '' }} {{ $propertie_data->address->pincode ?? '' }}</h2>
                                                        <div class="product-rating">
                                                            <ul class="rating">
                                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                                <li><em class="icon ni ni-star-half"></em></li>
                                                            </ul>
                                                            <div class="amount">(2 Reviews)</div>
                                                        </div><!-- .product-rating -->
                                                        <div class="product-excrept text-soft">
                                                            <?php  $data = json_decode($propertie_data->external_option);
                                                                foreach($data as $d){
                                                                    foreach($d as $key => $val){
                                                                        echo '<h4>'.$key.'</h4>';
                                                                        echo '<p>'.$val.'</p>';
                                                                    }
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="product-meta">
                                                            <ul class="d-flex g-3 gx-5">
                                                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalDefault">Add Storage</button>
                                                            </ul>
                                                        </div>
                                                       
                                                        
                                                    </div><!-- .product-info -->
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Content Code -->
                <div class="modal fade zoom" tabindex="-1" id="modalDefault">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                            <div class="modal-header">
                                <h5 class="modal-title">Add Storages</h5>
                            </div>
                            <div class="modal-body">
                            <div class="nk-block nk-block-lg">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <form action="{{ url('admin-dashboard/storage/submitProcc') }}" id="publication_form" method="post" enctype="multipart/form-data" class="gy-3">
                                                @csrf
                                                <input type="hidden" name="propertie_id" value="{{ $propertie_data->id ?? '' }}">
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label">Title</label>
                                                            <span class="form-note">Specify the title of your property storage.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control form-data" id="title" name="title" value="" />
                                                            </div>
                                                            @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label">Storage Type</label>
                                                            <span class="form-note">Specify the storage type.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <select class="form-control form-data" id="category_id" name="category" >
                                                                    @foreach($categories as $cat)
                                                                    <option value="{{ $cat->id ?? '' }}">{{ $cat->name ?? '' }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @error('category')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label">Sizes</label>
                                                            <span class="form-note">Please select the size for your storage.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <ul class="custom-control-group g-3 align-center" id="sizes">
                                                            @if($categories->isNotEmpty())
                                                                @foreach($categories[0]->sizes as $sizes)
                                                            
                                                                <li>
                                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                                        <input type="radio" class="custom-control-input" id="{{ $sizes['name'] }}" name="sizes" value="{{ $sizes['id'] }}">
                                                                        <label class="custom-control-label" for="{{ $sizes['name'] }}">{{ $sizes['name'] }}</label>
                                                                    </div>
                                                                </li>
                                                            
                                                                @endforeach
                                                                @endif
                                                            
                                                            </ul>
                                                        </div>
                                                        @error('sizes')
                                                                <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <hr>  
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label">Features</label>
                                                            <span class="form-note">Please select the features for your storage.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                        <ul class="custom-control-group g-3 align-center" id="features">
                                                            @if($categories->isNotEmpty())
                                                                @foreach($categories[0]->features as $features)
                                                            
                                                                <li>
                                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="{{ $features['name'] }}" name="features[]" value="{{ $features['id'] }}">
                                                                        <label class="custom-control-label" for="{{ $features['name'] }}">{{ $features['name'] }}</label>
                                                                    </div>
                                                                </li>
                                                            
                                                                @endforeach
                                                                @endif
                                                            
                                                            </ul>
                                                        </div>
                                                        @error('features')
                                                                <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <hr>  
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label">Regular Price</label>
                                                            <span class="form-note">Specify the regular price of your storage.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control form-data" id="regular_price" name="regular_price" value=""/>
                                                            </div>
                                                            @error('regular_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label">Discount Price</label>
                                                            <span class="form-note">Specify the discounted price of your storage.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control form-data" id="discount_price" name="discount_price" value=""/>
                                                            </div>
                                                            @error('discount_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-3">
                                                    <div class="col-lg-7 offset-lg-5">
                                                        <div class="form-group mt-2">
                                                            <button type="submit" class="btn btn-lg btn-primary">Add Storage</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- card -->
                                </div><!-- .nk-block -->
                            </div>
                            <div class="modal-footer bg-light">
                            </div>
                        </div>
                    </div>
                </div>
                <script>

                    $('#category_id').change(function(){
                        val = $(this).val();
                        $.ajax({
                            method: 'post',
                            url: '{{ url('admin-dashboard/getsizesandfeatures') }}',
                            data: { _token:"{{ csrf_token() }}",category_id:val },
                            success:function(response){
                               $('#sizes').html('');
                               $('#features').html('');
                                $.each(response[0],function(key,val){
                                    html = `<li>
                                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="${val.name}" name="sizes" value="${val.id}">
                                                                        <label class="custom-control-label" for="${val.name}">${val.name}</label>
                                                                    </div>
                                                                </li>`;
                                   $('#sizes').append(html);
                                })
                                $.each(response[1],function(key,val){
                                    html2 = `<li>
                                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="${val.name}" name="features[]" value="${val.id}">
                                                                        <label class="custom-control-label" for="${val.name}">${val.name}</label>
                                                                    </div>
                                                                </li>`;
                                    $('#features').append(html2);
                                })
                                

                            } 
                        })
                    })
                </script>
                @if($errors->any())
               <script>
               $('#modalDefault').modal({ show:true });
               </script>
                @endif

@endsection