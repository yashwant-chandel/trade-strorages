@extends('admin_layout/index')
@section('content')

<div class="card card-bordered card-preview">
    <div class="card-inner">
        <div class="nk-content col-6">
            <form method="post" id="myform" enctype="multipart/form-data" action="{{ url('admin-dashboard/facilitiesContent/submitProcc') }}">
                @csrf
                <h4>Banner Section</h4>
                <input type="hidden" name="action" value="banner">
                <div class="form-group">
                    <label class="form-label" for="banner_text">Banner Text</label>
                    <input type="text" class="form-control" id="banner_title" name="banner_text" value="{{ $data->banner_text ?? '' }}">
                    @error('banner_text')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="banner_image">Banner Image</label>
                    <input type="file" class="form-control" id="banner_image" name="image" value="">
                    @error('banner_image')
                    {{ $message }}
                    @enderror
                    @if($data->banner_image)
                        <img src="{{ asset('site_images/'.$data->banner_image) }}" alt="">
                    @endif
                </div>
                <input type="submit" value="Update" class="btn btn-primary mt-2" id="submit">
            </form>
        </div>
    </div>
</div>
<div class="card card-bordered card-preview mt-3">
    <div class="card-inner">
        <div class="nk-content">
            <form method="post" id="myform" enctype="multipart/form-data" action="{{ url('admin-dashboard/facilitiesContent/submitProcc') }}">
                @csrf
                <h4>Second Section</h4>
                <input type="hidden" name="action" value="second_section">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="second_section_title">Title</label>
                        <input type="text" class="form-control" id="second_section_title" name="second_section_title" value="{{ $data->second_section_title ?? '' }}">
                        @error('banner_title')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="row" id="help_steps">
                    @if($data->second_section_description)
                    <?php $description_steps = json_decode($data->second_section_description);
                  
                    ?>
                        @for($x=0; $x< count($description_steps->images); $x++)
                        <div class="col-md-6">
                            <hr>
                            <div class="form-group">
                                <label class="form-label" for="icons">Icon</label>
                                <input type="file" class="form-control" id="icons" name="icons[]" value="">
                            </div>
                            <div class="form-group">
                                <?php $text = json_decode($description_steps->text); ?>
                                <textarea name="text[]" id="text{{ $x }}" class="form-control"><?php echo $text[$x]; ?></textarea>
                            </div>
                        </div>
                        <script>
                             ClassicEditor.create( document.querySelector( '#text{{ $x }}' ) );
                        </script>
                        @endfor
                    @else
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
                    @endif
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
            <form method="post" id="myform" enctype="multipart/form-data" action="{{ url('admin-dashboard/facilitiesContent/submitProcc') }}">
                @csrf
                <h4>Third Section</h4>
                <input type="hidden" name="action" value="third_section">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="third_section_title">Title</label>
                            <input type="text" class="form-control" id="third_section_title" name="third_section_title" value="{{ $data->third_section_title ?? '' }}">
                            @error('third_section_title')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="background_image">Background Image</label>
                            <input type="file" class="form-control" id="background_image" name="background_image" value="">
                            @error('background_image')
                            {{ $message }}
                            @enderror
                        </div>
                        @if($data->third_section_image)
                            <img src="{{ asset('site_images/'.$data->third_section_image) }}" alt="">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="left_text">Left Description</label>
                            <textarea name="left_text" id="left_text" class="form-control">{{ $data->third_section_left_text ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="right_text">Right Description</label>
                            <textarea name="right_text" id="right_text" class="form-control">{{ $data->third_section_right_text ?? '' }}</textarea>
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
            <form method="post" id="myform" enctype="multipart/form-data" action="{{ url('admin-dashboard/facilitiesContent/submitProcc') }}">
                @csrf
                <h4>Fourth Section</h4>
                <input type="hidden" name="action" value="fourth_section">
                <div class="row" id="fourth_section_div">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="fourth_section_title">Title</label>
                                <input type="text" class="form-control" id="fourth_section_title" name="fourth_section_title" value="{{ $data->fourth_section_title ?? '' }}">
                                @error('fourth_section_title')
                                {{ $message }}
                                @enderror
                            </div>
                    </div>
                    <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="features">Right image</label>
                                    <input type="file" class="form-control" id="image" name="image" value=""> 
                                </div>
                                @if($data->fourth_section_right_image)
                                    <img src="{{ asset('site_images/'.$data->fourth_section_right_image) }}" alt="">
                                @endif
                    </div>
                    @if($data->fourth_section_left_text)
                        <?php $fourth_text = json_decode($data->fourth_section_left_text); ?>
                        @foreach($fourth_text as $text)
                            <div class="col-md-6">
                                <div class="form-group">
                                            <label class="form-label" for="left_title">Left Content</label>
                                            <input type="text" class="form-control" id="left_title" name="left_title[]" value="">
                                </div>
                                <div class="form-group">
                                            <textarea type="file" class="form-control" id="left_description" name="left_description[]" value=""></textarea>
                                </div>
                            </div>
                        @endforeach
                    @else
                    <div class="col-md-6">
                        <div class="form-group">
                                    <label class="form-label" for="left_title">Left Content</label>
                                    <input type="text" class="form-control" id="left_title" name="left_title[]" value="">
                        </div>
                        <div class="form-group">
                                    <textarea type="file" class="form-control" id="left_description" name="left_description[]" value=""></textarea>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-6">
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-primary" id="fourth_section_add_more">Add More</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="card card-bordered card-preview mt-3">
    <div class="card-inner">
        <div class="nk-content">
            <form method="post" id="myform" enctype="multipart/form-data" action="{{ url('admin-dashboard/facilitiesContent/submitProcc') }}">
                @csrf
                <h4>Fifth Section</h4>
                <input type="hidden" name="action" value="fifth_section">
                <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fifth_section_title">Banner Text</label>
                            <input type="text" class="form-control" id="fifth_section_title" name="fifth_section_title" value="{{ $data->fifth_section_title ?? '' }}">
                            @error('fifth_section_title')
                            {{ $message }}
                            @enderror
                        </div>
                        <div id="fifth_feature_div">
                            @if($data->fifth_section_text)
                            <?php $fifth_section_data = json_decode($data->fifth_section_text); ?>
                            @foreach($fifth_section_data as $data)
                                <div class="form-group">
                                    <label class="form-label" for="features">Feature</label>
                                    <input type="text" class="form-control" id="features" name="features[]" value=""> 
                                </div>
                            @endforeach
                            @else
                                <div class="form-group">
                                    <label class="form-label" for="features">Feature</label>
                                    <input type="text" class="form-control" id="features" name="features[]" value=""> 
                                </div>
                            @endif
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
    ClassicEditor.create( document.querySelector( '#left_description' ) );
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
        num = 0;
        $("#fourth_section_add_more").click(function(){
            html = `<div class="col-md-6">
                        <div class="form-group">
                                    <label class="form-label" for="left_title">Left Content</label>
                                    <input type="text" class="form-control" id="left_title" name="left_title[]" value="">
                        </div>
                        <div class="form-group">
                                    <textarea type="file" class="form-control" id="left_description${num}" name="left_description[]" value=""></textarea>
                        </div>
                    </div>`;
            $('#fourth_section_div').append(html);
             ClassicEditor.create( document.querySelector('#left_description'+num) );
             num = num+1;
        });
    });
</script>

@endsection
