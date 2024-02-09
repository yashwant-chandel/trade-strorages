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
                <h5 class="card-title">Add Property</h5>
            </div>
            <form action="{{ url('admin-dashboard/testimonials/addProcc') }}" id="publication_form" method="post" enctype="multipart/form-data" class="gy-3">
                @csrf
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label" for="name">Name</label>
                            <span class="form-note">Specify the name of your Testimonials.</span>
                        </div>
                    </div>
                    <div class="col-lg-7 row">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-data" id="name" name="name" value="{{ $testimonial->name ?? '' }}" placeholder="Enter name here"/>
                            </div>
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label">Position</label>
                            <span class="form-note">Specify the position of your property Testimonials.</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-data" id="position" name="position" value="{{ $testimonial->position ?? '' }}" placeholder="Enter position here"/>
                            </div>
                        </div>
                        @error('position')
                            <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label">Image</label>
                            <span class="form-note">Upload image here.</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="file" class="form-control form-data" id="image" name="image" />
                            </div>
                        </div>
                        @if($testimonial)
                        <img src="{{ asset('site_images/'.$testimonial->image) }}" alt="" width="50%">
                        @endif
                        @error('image')
                            <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label">Text</label>
                            <span class="form-note">Enter text here.</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <textarea class="form-control form-data" id="text" name="text" ><?php if(isset($testimonial->text)){ echo $testimonial->text; } ?></textarea>
                            </div>
                        </div>
                        @error('text')
                            <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row g-3">
                    <div class="col-lg-7 offset-lg-5">
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-lg btn-primary">Add Testimonials</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- card -->
</div><!-- .nk-block -->
@endsection