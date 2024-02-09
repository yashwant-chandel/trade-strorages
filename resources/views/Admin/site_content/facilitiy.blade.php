@extends('admin_layout/index')
@section('content')

<div class="card card-bordered card-preview">
    <div class="card-inner">
        <div class="nk-content col-6">
            <form method="post" id="myform" enctype="multipart/form-data" action="{{ url('admin-dashboard/site-content/submitProcc') }}">
                @csrf
                <h4>Banner Section</h4>
                <input type="hidden" name="action" value="banner">
                <div class="form-group">
                    <label class="form-label" for="banner_title">Banner Title</label>
                    <input type="text" class="form-control" id="banner_title" name="banner_title" value="">
                    @error('banner_title')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="banner_image">Banner Image</label>
                    <input type="file" class="form-control" id="banner_image" name="banner_image" value="">
                    @error('banner_image')
                    {{ $message }}
                    @enderror
                </div>
                <input type="submit" value="Update" class="btn btn-primary mt-2" id="submit">
            </form>
        </div>
    </div>
</div>
<div class="card card-bordered card-preview mt-3">
    <div class="card-inner">
        <div class="nk-content">
            <form method="post" id="myform" enctype="multipart/form-data" action="{{ url('admin-dashboard/site-content/submitProcc') }}">
                @csrf
                <h4>Second Section</h4>
                <input type="hidden" name="action" value="second_section">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="banner_title">Title</label>
                        <input type="text" class="form-control" id="banner_title" name="banner_title" value="">
                        @error('banner_title')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="row" id="help_steps">
                    <div class="col-md-6">
                        <hr>
                        <div class="form-group">
                            <label class="form-label" for="icons">Icon</label>
                            <input type="file" class="form-control" id="icons" name="icons[]" value="">
                        </div>
                        <div class="form-group">
                            <textarea name="text[]" id="text" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Update" class="btn btn-primary mt-2" id="submit">
                <Button type="button" id="add_more_help_step" class="btn btn-primary mt-2">Add More</Button>
            </form>
        </div>
    </div>
</div>
<div class="card card-bordered card-preview mt-3">
    <div class="card-inner">
        <div class="nk-content">
            <form method="post" id="myform" enctype="multipart/form-data" action="{{ url('admin-dashboard/site-content/submitProcc') }}">
                @csrf
                <h4>Third Section</h4>
                <input type="hidden" name="action" value="third_section">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="banner_title">Title</label>
                            <input type="text" class="form-control" id="banner_title" name="banner_title" value="">
                            @error('banner_title')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="background_image">Background Image</label>
                            <input type="text" class="form-control" id="background_image" name="background_image" value="">
                            @error('background_image')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="left_text">Left Description</label>
                            <textarea name="left_text" id="left_text" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="right_text">Right Description</label>
                            <textarea name="right_text" id="right_text" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
<div class="card card-bordered card-preview mt-3">
    <div class="card-inner">
        <div class="nk-content">
            <form method="post" id="myform" enctype="multipart/form-data" action="{{ url('admin-dashboard/site-content/submitProcc') }}">
                @csrf
                <h4>Fifth Section</h4>
                <input type="hidden" name="action" value="fifth_section">
                <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="banner_title">Title</label>
                            <input type="text" class="form-control" id="banner_title" name="banner_title" value="">
                            @error('banner_title')
                            {{ $message }}
                            @enderror
                        </div>
                        <div id="fifth_feature_div">
                            <div class="form-group">
                                <label class="form-label" for="features">Feature</label>
                                <input type="text" class="form-control" id="features" name="features[]" value=""> 
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-primary" id="fifth_section_add_more">Add More</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    
    ClassicEditor.create( document.querySelector( '#text' ) );   
    ClassicEditor.create( document.querySelector( '#left_text' ) );
    ClassicEditor.create( document.querySelector( '#right_text' ) );
    ClassicEditor.create( document.querySelector( '#process_text3' ) );
    // ClassicEditor.create( document.querySelector( '#fourth_heading' ) );


    $('#for_slider_section').on('change',function(){
        $('.slider_section').toggleClass('d-none');
    });
    $('#for_process_section').on('change',function(){
        $('.process_section').toggleClass('d-none');
    });
</script>
<script>
    $(document).ready(function(){
        count = 0;
        $('#add_more_help_step').on('click',function(){
            count = count+1;
            html = `<div class="col-md-6">
                        <hr>
                        <div class="form-group">
                            <label class="form-label" for="icons">Icon</label>
                            <input type="file" class="form-control" id="icons" name="icons[]" value="">
                        </div>
                        <div class="form-group">
                            <textarea name="text[]" id="text${count}" class="form-control"></textarea>
                        </div>
                    </div>`;
                    $('#help_steps').append(html);

                    ClassicEditor.create( document.querySelector('#text'+count) );
        });
        $('#fifth_section_add_more').on('click',function(){
            html = ` <div class="form-group">
                                <input type="text" class="form-control" id="features" name="features[]" value=""> 
                            </div>`;
            $('#fifth_feature_div').append(html);
        })
    });
</script>

@endsection
