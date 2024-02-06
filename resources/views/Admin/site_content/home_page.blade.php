@extends('admin_layout/index')
@section('content')

<div class="card card-bordered card-preview">
    <div class="card-inner">
        <div class="nk-content col-8">
            <form method="post" id="myform" enctype="multipart/form-data" action="{{ url('admin-dashboard/site-content/submitProcc') }}">
                @csrf
                <h4>First Section</h4>
                <div class="form-group">
                    <label class="form-label" for="banner_title">Banner Title</label>
                    <input type="text" class="form-control" id="banner_title" name="banner_title" value="{{ $homecontent->banner_title ?? '' }}">
                    @error('banner_title')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="banner_sub_title">Banner Subtitle</label>
                    <input type="text" class="form-control" id="banner_sub_title" name="banner_sub_title" value="{{ $homecontent->banner_subtitle ?? '' }}">
                    @error('banner_sub_title')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="banner_offer_image">Banner offer Image</label>
                    <input type="file" class="form-control" id="banner_offer_image" name="banner_offer_image">
                    @error('banner_offer_image')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="banner_image">Banner image</label>
                    <input type="file" class="form-control" id="banner_image" name="banner_image" value="">
                    @error('banner_image')
                    {{ $message }}
                    @enderror
                </div>
                <hr>
                <h4>Second Section</h4>
                <div class="form-group">
                    <label class="form-label" for="second_section_heading">Second section heading</label>
                    <input type="text" class="form-control" id="second_section_heading" name="second_section_heading" value="{{ $homecontent->second_section_heading ?? '' }}">
                    @error('second_section_heading')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="second_section_text">Second section text</label>
                    <textarea class="form-control" id="second_section_text" name="second_section_text">{{ $homecontent->second_section_text ?? '' }}</textarea>
                    @error('second_section_text')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <input type="checkbox" name="for_slider_section" id="for_slider_section" class="">
                    <label class="form-label" for="for_slider_section">Check if you want to update slider of images</label>
                </div>
                <div class="slider_section d-none">
                    <div class="form-group">
                        <label class="form-label" for="">First Image</label>
                        <input type="file" class="form-control" id="slider_image" name="slider_image[]" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="slider_text" name="slider_text[]" value="">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Second Image</label>
                        <input type="file" class="form-control" id="slider_image" name="slider_image[]" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="slider_text" name="slider_text[]" value="">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Third Image</label>
                        <input type="file" class="form-control" id="slider_image" name="slider_image[]" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="slider_text" name="slider_text[]" value="">
                    </div>   
                </div>
                <hr>
                <h4>Third Section</h4>
                <div class="form-group">
                    <label class="form-label" for="third_section_heading">Third section Heading</label>
                    <input class="form-control" id="third_section_heading" name="third_section_heading" value="{{ $homecontent->third_section_title ?? '' }}">
                    @error('third_section_heading')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="third_section_text">Third section text</label>
                    <textarea class="form-control" id="third_section_text" name="third_section_text" value="">{{ $homecontent->third_section_text ?? '' }}</textarea>
                    @error('third_section_text')
                    {{ $message }}
                    @enderror
                </div>
                <hr>
                <h4>The Process Section</h4>
                <div class="form-group">
                    <label class="form-label" for="process_section_heading">Process section heading</label>
                    <input class="form-control" id="process_section_heading" name="process_section_heading" value="{{ $homecontent->process_section_title ?? '' }}">
                    @error('process_section_heading')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <input type="checkbox" name="for_process_section" id="for_process_section" class="">
                    <label class="form-label" for="for_process_section">Check if you want to update process images and text</label>
                </div>
                <div class="process_section d-none">
                    <div class="form-group">
                        <label class="form-label" for="">First Image</label>
                        <input type="file" class="form-control" id="process_image" name="process_image[]" value="">
                    </div>
                    <div class="form-group">
                        <textarea  class="form-control" id="process_text1" name="process_text[]" value=""></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Second Image</label>
                        <input type="file" class="form-control" id="process_image" name="process_image[]" value="">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="process_text2" name="process_text[]" ></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Third Image</label>
                        <input type="file" class="form-control" id="process_image" name="process_image[]" value="">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="process_text3" name="process_text[]" value=""></textarea>
                    </div>   
                </div>
                <hr>
                <input type="submit" value="Save" class="btn btn-primary mt-2" id="submit">
            </form>
        </div>
    </div><!-- .card-preview -->
</div>

<script>
    
    ClassicEditor.create( document.querySelector( '#third_section_text' ) );   
    ClassicEditor.create( document.querySelector( '#second_section_text' ) );
    ClassicEditor.create( document.querySelector( '#process_text1' ) );
    ClassicEditor.create( document.querySelector( '#process_text2' ) );
    ClassicEditor.create( document.querySelector( '#process_text3' ) );
    // ClassicEditor.create( document.querySelector( '#fourth_heading' ) );


    $('#for_slider_section').on('change',function(){
        $('.slider_section').toggleClass('d-none');
    });
    $('#for_process_section').on('change',function(){
        $('.process_section').toggleClass('d-none');
    });
</script>

@endsection
