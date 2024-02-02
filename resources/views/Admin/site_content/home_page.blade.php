@extends('admin_layout/index')
@section('content')

<div class="card card-bordered card-preview">
    <div class="card-inner">
        <div class="nk-content col-8">
            @if ($message = Session::get('success'))
                <div class="alert alert-success col-8">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <form method="post" id="myform" enctype="multipart/form-data" action="">
                @csrf
                <h4>First Section</h4>
                <div class="form-group">
                    <label class="form-label" for="title">Banner Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="">
                    @error('title')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="sub_title">Banner Subtitle</label>
                    <input type="text" class="form-control" id="sub_title" name="sub_title" value="">
                    @error('sub_title')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="banner_text">Banner offertext</label>
                    <textarea class="form-control" id="banner_text" name="banner_text"></textarea>
                    @error('banner_text')
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
                    <label class="form-label" for="sec_heading">Second section heading</label>
                    <textarea class="form-control" id="sec_heading" name="sec_heading"></textarea>
                    @error('sec_heading')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="sec_text">Second section text</label>
                    <textarea class="form-control" id="sec_text" name="sec_text"></textarea>
                    @error('sec_text')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="sec_title">Second section title</label>
                    <input type="text" class="form-control" id="sec_title" name="third_sub_title" value="">
                    @error('sec_title')
                    {{ $message }}
                    @enderror
                </div>
                <div class="multiimage">

                </div>
                <br>
                <button class="btn btn-primary addmore" type="button">Add more</button> 
                <br>
                <hr>
                <h4>Third Section</h4>
                <div class="form-group">
                    <label class="form-label" for="third_heading">Third section Heading</label>
                    <textarea class="form-control" id="third_heading" name="third_heading" value=""></textarea>
                    @error('third_heading')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="third_text">Third section text</label>
                    <textarea class="form-control" id="third_text" name="third_text" value=""></textarea>
                    @error('third_text')
                    {{ $message }}
                    @enderror
                </div>
                <hr>
                <h4>Fourth Section</h4>
                <div class="form-group">
                    <label class="form-label" for="fourth_heading">Fourth section heading</label>
                    <textarea class="form-control" id="fourth_heading" name="fourth_heading"></textarea>
                    @error('fourth_heading')
                    {{ $message }}
                    @enderror
                </div>
                <div class="multiimage">

                </div>
                <br>
                <button class="btn btn-primary addmore" type="button">Add more</button> 
                <br>
                <hr>
                <input type="submit" value="Save" class="btn btn-primary mt-2" id="submit">
            </form>
        </div>
    </div><!-- .card-preview -->
</div>

<script>
    
    ClassicEditor.create( document.querySelector( '#banner_text' ) );   
    ClassicEditor.create( document.querySelector( '#sec_heading' ) );
    ClassicEditor.create( document.querySelector( '#sec_text' ) );
    ClassicEditor.create( document.querySelector( '#third_heading' ) );
    ClassicEditor.create( document.querySelector( '#third_text' ) );
    ClassicEditor.create( document.querySelector( '#fourth_heading' ) );

    $('.addmore').click(function(e){
        e.preventDefault();
        
        var html = '<div class="form-group"><label class="form-label" for="third_img">Third Section Image</label><input type="file" class="form-control" id="third_img" name="third_img[]" value=""><label class="form-label" for="third_img_txt">Third Section Image Text</label><input type="text" class="form-control" id="third_img_txt" name="third_img_txt[]" value=""></div>';

        $('.multiimage').append(html);
    })

</script>

@endsection
