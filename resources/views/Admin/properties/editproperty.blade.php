@extends('admin_layout/index')
@section('content')
<?php 
 $usStates = array(
    'Alabama' => 'AL',
    'Alaska' => 'AK',
    'Arizona' => 'AZ',
    'Arkansas' => 'AR',
    'California' => 'CA',
    'Colorado' => 'CO',
    'Connecticut' => 'CT',
    'Delaware' => 'DE',
    'Florida' => 'FL',
    'Georgia' => 'GA',
    'Hawaii' => 'HI',
    'Idaho' => 'ID',
    'Illinois' => 'IL',
    'Indiana' => 'IN',
    'Iowa' => 'IA',
    'Kansas' => 'KS',
    'Kentucky' => 'KY',
    'Louisiana' => 'LA',
    'Maine' => 'ME',
    'Maryland' => 'MD',
    'Massachusetts' => 'MA',
    'Michigan' => 'MI',
    'Minnesota' => 'MN',
    'Mississippi' => 'MS',
    'Missouri' => 'MO',
    'Montana' => 'MT',
    'Nebraska' => 'NE',
    'Nevada' => 'NV',
    'New Hampshire' => 'NH',
    'New Jersey' => 'NJ',
    'New Mexico' => 'NM',
    'New York' => 'NY',
    'North Carolina' => 'NC',
    'North Dakota' => 'ND',
    'Ohio' => 'OH',
    'Oklahoma' => 'OK',
    'Oregon' => 'OR',
    'Pennsylvania' => 'PA',
    'Rhode Island' => 'RI',
    'South Carolina' => 'SC',
    'South Dakota' => 'SD',
    'Tennessee' => 'TN',
    'Texas' => 'TX',
    'Utah' => 'UT',
    'Vermont' => 'VT',
    'Virginia' => 'VA',
    'Washington' => 'WA',
    'West Virginia' => 'WV',
    'Wisconsin' => 'WI',
    'Wyoming' => 'WY'
);

 ?>
<div class="nk-block nk-block-lg">
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">Update Property</h5>
            </div>
            <form action="{{ url('admin-dashboard/properties/updateProcc') }}" id="publication_form" method="post" enctype="multipart/form-data" class="gy-3">
                @csrf
                <input type="hidden" name="id" value="{{ $propertie->id ?? '' }}">
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label" for="site-name">Address</label>
                            <span class="form-note">Specify the address of your property.</span>
                        </div>
                    </div>
                    <div class="col-lg-7 row">
                        <div class="form-group col-8">
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-data" id="address" name="address" value="{{ $propertie->address->address ?? '' }}" placeholder="Enter address here"/>
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-data" id="city" name="city" value="{{ $propertie->address->city ?? '' }}" placeholder="Enter city here"/>
                            </div>
                        </div>
                        <div class="form-group col-8">
                            <div class="form-control-wrap">
                                <select name="state" id="state" class="form-control form-data">
                                    @foreach($usStates as $key=>$value)
                                    <option value="{{ $value }}" @if($propertie->address->state == $value) selected @endif>{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-data" id="pincode" name="pincode" value="{{ $propertie->address->pincode ?? '' }}" placeholder="Enter pincode here"/>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label">Url</label>
                            <span class="form-note">Specify the url of your property location.</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-data" id="url" name="url" value="{{ $propertie->map_url ?? '' }}" placeholder="Enter url here"/>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <?php $external_options = json_decode($propertie->external_option); ?>
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label">External option</label>
                            <span class="form-note">Enter your external options of your propertie.</span>
                            <button type="button" class="btn btn-primary " id="add-external-option">Add+</button>
                        </div>
                    </div>
                    <div class="col-lg-7" id="external_div">
                        <?php $count = 0; ?>
                    @foreach($external_options as $options)
                        @foreach($options as $key=>$value)
                        <?php $count = $count+1; ?>
                        <div id="option{{ $count }}">
                        <div class="text-end"><a class="close_external" count="{{ $count }}"><i class="fas fa-window-close"></i></a></div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control form-data" id="title" name="title[]" value="{{ $key ?? '' }}" placeholder="Enter title here">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <textarea class="form-control form-data" id="description" name="description[]" placeholder="Enter description here">{{ $value ?? '' }}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>
                        @endforeach
                    @endforeach
                    </div>
                </div>
                <hr>
                <?php $facility_features = json_decode($propertie->storage_facility_features); ?>
                 <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label">Storage facility feature</label>
                            <span class="form-note">Enter the storage facility feature of your property.</span>
                            <button class="btn btn-primary" id="add-more-feature">Add More+</button>
                        </div>
                    </div>
                    <div class="col-lg-7" id="features_div">
                    <?php $num = 0; ?>
                    @if($facility_features)
                        @foreach($facility_features as $featuers)
                        @foreach($featuers as $key=>$value)
                        <?php $num = $num+1; ?>
                        <div class="feature{{ $num }}">
                        <div class="text-end"><a class="close_features" num="{{ $num }}"><i class="fas fa-window-close"></i></a></div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text"  class="form-control form-data" id="icon" name="icon[]" value="{{ $key ?? '' }}" placeholder="Enter your icon tag">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <textarea type="number" min="1" class="form-control form-data" id="facility_feature" name="facility_feature[]"  placeholder="Enter number feature">{{ $value ?? '' }}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>
                        @endforeach
                    @endforeach
                  @endif
                    </div>
                </div>
                <hr> 
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label">Featured Image</label>
                            <span class="form-note">Please add your featured image of your property.</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="file" class="form-control form-data" id="featured_image" value="" name="featured_image" >
                            </div>
                        </div>
                        <div class="image-row" style="display: flex; flex-wrap: wrap;gap: 1rem;">
                        @foreach($propertie->media as $media)
                            @if($media->featured_image == 1)
                                    <div class="image-container" id="media{{ $media->id ?? '' }}" style="position: relative;margin-right: 1rem;">
                                        <!-- <i data-id="{{ $media->id ?? '' }}" class="fas fa-trash-alt text-dark remove-image" style="position: absolute; cursor: pointer;"></i> -->
                                        <img class="image-fluid" style="max-width: 5rem" src="{{ asset('property_images') ?? ''  }}/{{ $media->image_name ?? '' }}" alt="">
                                    </div>
                            @endif
                        @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label">Gallery Images</label>
                            <span class="form-note">Please select the gallery images for your property.</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                        <div class="form-control-wrap">
                                <input type="file" class="form-control form-data" id="gallery_images" value="" name="gallery_images[]" multiple>
                            </div>
                        </div>
                        <div class="image-row" style="display: flex; flex-wrap: wrap;gap: 1rem;">
                        @foreach($propertie->media as $media)
                            @if($media->featured_image != 1)
                                    <div class="image-container" id="media{{ $media->id ?? '' }}" style="position: relative;margin-right: 1rem;">
                                        <i data-id="{{ $media->id ?? '' }}" class="fas fa-trash-alt text-dark remove-image" style="position: absolute; cursor: pointer;"></i>
                                        <img class="image-fluid" style="max-width: 5rem" src="{{ asset('property_images') ?? ''  }}/{{ $media->image_name ?? '' }}" alt="">
                                    </div>
                            @endif
                        @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row g-3">
                    <div class="col-lg-7 offset-lg-5">
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-lg btn-primary">Update Property</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- card -->
</div><!-- .nk-block -->
<script>
    count = {{ $count }};
    $('#add-external-option').on('click',function(){
        count = count+1;
        html = `<div id="option${count}">
                            <div class="form-group">
                                    <div class="text-end"><a class="close_external" count="${count}"><i class="fas fa-window-close"></i></a></div>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control form-data" id="title" name="title[]" value="" placeholder="Enter title here">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <textarea class="form-control form-data" id="description" name="description[]" placeholder="Enter description here"></textarea>
                                </div>
                            </div>
                            <hr>
                        </div>`;
        $('#external_div').append(html);
        
    })
    $("body").delegate(".close_external",'click',function(e){
        e.preventDefault();
        count = $(this).attr('count');
        $('#option'+count).remove();
    })
    $(".remove-image").on('click',function(){
        id =$(this).attr('data-id');
        $.ajax({
            method: 'post',
            url:"{{ url('admin-dashboard/media/delete/') }}",
            data:{_token:"{{ csrf_token() }}",id:id },
            success:function(response){
                $('#media'+id).remove();
            }
        })
    });

    num = {{ $num }};
    $('#add-more-feature').on("click",function(e){
        e.preventDefault();
        num = num+1;
        html = `<div class="feature${num}">
                            <div class="form-group">
                            <div class="text-end"><a class="close_features" num="${num}"><i class="fas fa-window-close"></i></a></div>
                                <div class="form-control-wrap">
                                    <input type="text"  class="form-control form-data" id="icon" name="icon[]" value="" placeholder="Enter your icon tag">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <textarea type="number" min="1" class="form-control form-data" id="facility_feature" name="facility_feature[]"  placeholder="Enter number feature"></textarea>
                                </div>
                            </div>
                            <hr>
                        </div>`;
        $('#features_div').append(html);
    });
    $("body").delegate(".close_features",'click',function(e){
        e.preventDefault();
        num = $(this).attr('num');
        $('.feature'+num).remove();
    });
</script>
@endsection