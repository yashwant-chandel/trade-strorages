@extends('admin_layout/index')
@section('content')

<div class="nk-block nk-block-lg">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <form action="{{ url('admin-dashboard/storage/updateProcc') }}" id="publication_form" method="post" enctype="multipart/form-data" class="gy-3">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $storage->id ?? '' }}">
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
                                                                <input type="text" class="form-control form-data" id="title" name="title" value="{{ $storage->title ?? '' }}" />
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
                                                                        <option value="{{ $cat->id ?? '' }}" @if(isset($storage->category_id)) @if($storage->category_id == $cat->id) selected @endif  @endif>{{ $cat->name ?? '' }}</option>
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
                                                                @foreach($sizes as $size)
                                                            
                                                                <li>
                                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                                        <input type="radio" class="custom-control-input" id="{{ $size['name'] }}" name="sizes" value="{{ $size['id'] }}" @if(isset($storage->size_id)) {{ $storage->size_id }} @if($storage->size_id == $size['id']) checked @endif @endif>
                                                                        <label class="custom-control-label" for="{{ $size['name'] }}">{{ $size['name'] }}</label>
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
                                                                @foreach($features as $feature)
                                                            <?php $featuresss = json_decode($storage->features);
                                                           
                                                            ?>
                                                                <li>
                                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="{{ $feature['name'] }}" name="features[]" value="{{ $feature['id'] }}" @if(isset($featuresss)) @if(in_array($feature['id'],$featuresss)) checked @endif @endif>
                                                                        <label class="custom-control-label" for="{{ $feature['name'] }}" >{{ $feature['name'] }}</label>
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
                                                                <input type="text" class="form-control form-data" id="regular_price" name="regular_price" value="{{ $storage->regular_price ?? '' }}"/>
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
                                                                <input type="text" class="form-control form-data" id="discount_price" name="discount_price" value="{{ $storage->discount_price ?? '' }}"/>
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
                                                            <button type="submit" class="btn btn-lg btn-primary">Update Storage</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- card -->
                                </div><!-- .nk-block -->
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
                                                                            <input type="radio" class="custom-control-input" id="${val.name}" name="sizes" value="${val.id}">
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