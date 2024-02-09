@extends('front_layout.master')
@section('content')
<section class="banner_wrapper" style="background-image: url({{ asset('Trade_Storage/assets/img/banner_2.png') }});">
        <div class="container">
            <div class="banner_content">
                <h2>Trade Storage Blog</h2>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter City, State or Zip " id="search-form" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">Search</span>
                </div>
            </div>
        </div>
    </section>

    <section class="blogs_wrapper p_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blogs_right">
                        <span>News</span>
                        <h3>Most Recent Blog Posts</h3>
                        <div class="blog_grid">
                            @foreach($blogs as $blog)
                            <a href="{{ url('blogs-detail/'.$blog->slug) }}">
                            <div class="blog_list"> 
                                <img src="{{ asset('Trade_Storage/assets/img/blogs_2.png') }}" alt="">
                                <span>{{ $blog->category->name ?? '' }}</span>
                                <h4>{{ $blog->title ?? '' }}</h4>
                            </div>
                            </a>
                            @endforeach
                            @if($blogs->isEmpty())
                            <h4>Currently there is no blog.</h4>
                            @endif
                        </div>
                        <!-- <div class="pagenavigation_wreap">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <i class="fa-solid fa-arrow-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link active" href="#" aria-label="Next">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div> -->
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
                        <div class="recent-post d-none">
                            <div class="post-data">
                                <h5>Related Posts</h5>
                            </div>
                            <ul class="fit_text list-unstyled m-0">
                                <li>
                                    <div class="re_post">
                                        <img src="{{ asset('Trade_Storage/assets/img/blogs_1.png') }}" alt="">
                                    </div>
                                    <div class="recent_text">
                                        <a href="#">Lorem Ipsum is simply dummy text of the printing.</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="re_post">
                                        <img src="{{ asset('Trade_Storage/assets/img/blogs_1.png') }}" alt="">
                                    </div>
                                    <div class="recent_text">
                                        <a href="#">Lorem Ipsum is simply dummy text of the printing.</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="re_post">
                                        <img src="{{ asset('Trade_Storage/assets/img/blogs_1.png') }}" alt="">
                                    </div>
                                    <div class="recent_text">
                                        <a href="#">Lorem Ipsum is simply dummy text of the printing.</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="re_post">
                                        <img src="{{ asset('Trade_Storage/assets/img/blogs_1.png') }}" alt="">
                                    </div>
                                    <div class="recent_text">
                                        <a href="#">Lorem Ipsum is simply dummy text of the printing.</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
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