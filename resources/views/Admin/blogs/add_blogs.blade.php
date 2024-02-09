@extends('admin_layout/index')
@section('content')
<style>
    .ck{
        height:300px;
    }
</style>
<div class="card card-bordered h-100">
                     <div class="card-inner ">
                         <div class="card-head d-flex justify-content-between">
                             <h5 class="card-title">Blog Categories</h5>
                             <button class="remove btn btn-link" ><i class="fas fa-times"></i></button>
                         </div>
                         <form action="{{ url('admin-dashboard/blogs/submitProcc') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $blog->id ?? '' }}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="title" class="form-control" id="title" value="{{ $blog->title ?? '' }}">
                                        </div>
                                        @error('title')
                                                <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="image">Upload image</label>
                                        <div class="form-control-wrap">
                                            <input type="file" name="image" class="form-control" id="image" >
                                        </div>
                                        @error('image')
                                                <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="category">Category</label>
                                        <div class="form-control-wrap">
                                            <select name="category" id="category" class="form-control">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id ?? '' }}">{{ $category->name ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category')
                                                <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                @if(isset($blog->image))
                                    <div class="col-lg-6 mt-2">
                                        <img src="{{ asset('blog_images/'.$blog->image) }}" alt="">
                                    </div>
                                @endif
                                <div class="col-lg-12 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="image">Description</label>
                                        <div class="form-control-wrap">
                                            <textarea name="description" class="form-control" id="description" ><?php if(isset($blog->description)){ echo $blog->description; } ?></textarea>
                                        </div>
                                        @error('description')
                                                <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                             </div>
                            <div class="form-group mt-3">
                                 <button type="submit" class="btn btn-primary savebtn">Post</button>
                                 
                            </div>
                             </div>
                             
                         </form>
                     </div>
                 </div>
                 <script>
                    ClassicEditor.create( document.querySelector( '#description' ) );   
                 </script>
@endsection