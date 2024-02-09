@extends('front_layout.master')
@section('content')
<section class="blogs_wrapper blogs_dt_wreap p_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blogs_right">
                        <div class="blogs_dt">
                            <img src="{{ asset('blog_images/'.$blog_data->image) }}" class="img-fluid" alt="" />
                            <div class="blg_dt_cong">
                                <span>{{ $blog_data->category->name ?? '' }}</span>
                                <strong>{{ $blog_data->created_at ?? '' }}</strong>
                            </div>
                            <h4>{{ $blog_data->title ?? '' }}</h4>
                            <?php print_r($blog_data->description); ?>
                            <!-- <div class="prv_next_wreap">
                                <ul class="list-unstyled m-0">
                                    <li>
                                        <a href="javascript:void(0)" class="btn"><i class="fa-solid fa-arrow-left"></i> Previous Post</a>
                                    </li>
                                    <li class="active">
                                        <a href="javascript:void(0)" class="btn">Next Post <i class="fa-solid fa-arrow-right"></i></a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="blogs_side">
                        <div class="info_list">
                            <h5>Search</h5>
                            <div class="blog_list">
                                <form>
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </form>
                            </div>
                        </div>
                        @if($related_blogs->isNotEmpty())
                        <div class="recent-post">
                            <div class="post-data">
                                <h5>Related Posts</h5>
                            </div>

                            <ul class="fit_text list-unstyled m-0">
                                @foreach($related_blogs as $blogs)
                                <li>
                                    <div class="re_post">
                                        <img src="{{ asset('blog_images/'.$blogs->image) }}" alt="">
                                    </div>
                                    <div class="recent_text">
                                        <a href="#">{{ $blogs->title ?? '' }}</a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="category-box">
                            <div class="text">
                                <h5>Categories</h5>
                            </div>
                            <div class="category-text">
                                <ul class="list-unstyled m-0"> 
                                    @foreach($categories as $category)
                                    <li>
                                        <a href="{{ url('blogs/'.$category->slug) }}"><i class="fa-solid fa-angle-right"></i> {{ $category->name ?? '' }}</a>
                                        <span>({{ count($category->blogs) }})</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="blogs_find">
                            <h4>Find Storage Near You</h4>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter City, State or Zip" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2">Search</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection