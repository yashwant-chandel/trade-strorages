<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('Trade_Storage/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('Trade_Storage/assets/css/responsive.css') }}" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>Home page</title>
</head>
<body>
<?php 
         $admin = App\Models\User::where('is_admin',1)->first();
         $sitemeta = App\Models\SiteMeta::all();
         $storage_types = App\Models\Category::all();
        
        ?>
    <header class="main_header">
        <div class="header_cont">
            <div class="container">
                <nav class="navbar navbar-expand-xl">
                    <a class="navbar-brand" href="{{ url('') }}">
                        <div class="header_logo">
                            <img src="{{ asset('Trade_Storage/assets/img/Trade-logo.png') }}" alt="" />
                        </div>
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="bars bar1 navbar-toggler-icon"></span>
                        <span class="bars bar2 navbar-toggler-icon"></span>
                        <span class="bars bar3 navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item hrd_text">
                                <a class="nav-link active" aria-current="page" href="{{ url('support') }}">Support</a>
                            </li>
                            <li class="nav-item hrd_text">
                                <a class="nav-link" href="{{ url('company-info ') }}">Company Info</a>
                            </li>
                            <li class="nav-item hrd_text">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link cntc_link" href="tel:{{ $admin->phone ?? '' }}">
                                    <img src="{{ asset('Trade_Storage/assets/img/phone.png') }}" alt="" />
                                    {{ $admin->phone ?? '' }}
                                </a>
                            </li>
                            <li class="nav-item live_wreap">
                                <a class="nav-link cntc_link" href="">
                                    <img src="{{ asset('Trade_Storage/assets/img/live.png') }}" alt="" />
                                    Live Chat
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn nav-link cntc_link" href="">
                                    <img src="{{ asset('Trade_Storage/assets/img/account.png') }}" alt="" />
                                    My Account
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <section class="top_bar">
        <p>What's it like to store with us? <a href="">Ask Us!</a></p>
    </section>
        @yield('content')

       
    <footer class="main_footer">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <div class="footer_logo">
                        <a href="">
                            <img src="{{ asset('Trade_Storage/assets/img/Trade Storage.png') }}" alt="" />
                        </a>
                        <div class="footer_sty">
                            
                            <p>STAY TUNED TO Trade Storage</p>
                            <ul class="social_links d-flex align-items-center gap-3">
                                @foreach($sitemeta as $meta)
                                @if($meta->key == 'facebook' && $meta->value != null)
                                <li>
                                    <a href="//{{ $meta->value ?? '' }}"><img src="{{ asset('Trade_Storage/assets/img/facebook-white.png') }}" alt="" /></a>
                                </li>
                                @elseif($meta->key == 'instagram' && $meta->value != null)
                                <li>
                                    <a href="//{{ $meta->value ?? '' }}"><img src="{{ asset('Trade_Storage/assets/img/instagram-white.png') }}" alt="" /></a>
                                </li>
                                @elseif($meta->key == 'pintrest' && $meta->value != null)
                                <li>
                                    <a href="//{{ $meta->value ?? '' }}"><img src="{{ asset('Trade_Storage/assets/img/pintrest-white.png') }}" alt="" /></a>
                                </li>
                                @elseif($meta->key == 'linkedin' && $meta->value != null)
                                <li>
                                    <a href="//{{ $meta->value ?? '' }}"><img src="{{ asset('Trade_Storage/assets/img/linkedin.png') }}" alt="" /></a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="foter_links">
                        <h2 class="quick_link">Storage Types</h2>
                        <ul>
                            <li>
                                <a href="{{ url('storage-facilities') }}">Self Storage Facilities </a>
                            </li>
                            <!-- <li>
                                <a href="">Business Storage </a>
                            </li>
                            <li>
                                <a href="">Car and RV Storage </a>
                            </li>
                            <li>
                                <a href="">Boat Storage </a>
                            </li>
                            <li>
                                <a href="">Climate Controlled Storage</a>
                            </li>
                            <li>
                                <a href="">Office Storage</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="foter_links">
                        <h2 class="quick_link">Support</h2>
                        <ul>
                            <li>
                                <a href="{{ url('support') }}">Contact </a>
                            </li>
                            <li>
                                <a href="{{ url('help-center') }}">Help Center </a>
                            </li>
                            <li>
                                <a href="{{ url('size-guide') }}">Size Guide </a>
                            </li>
                            <li>
                                <a href="{{ url('blogs') }}">Trade Storage Blog </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="fotter_adress">
                        @if($admin->address)
                        <div class="foter_links">
                            <h2 class="quick_link">Address</h2>
                            <div class="adress">
                                <p>
                                    {{ $admin->address_data->address ?? '' }}, {{ $admin->address_data->city ?? '' }}, {{ $admin->address_data->state ?? '' }} <br />
                                    {{ $admin->address_data->pincode ?? '' }}
                                </p>
                            </div>
                        </div>
                        @endif
                        <div class="foter_links foter_adrs">
                            <h2 class="quick_link">EMAIL</h2>
                            <div class="adress">
                                <a href="mailto:{{ $admin->email ?? '' }}">{{ $admin->email ?? '' }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy_right">
            <p>Copyright ©2024 Trade Storage.</p>
        </div>
    </footer>
    <script>
        $(document).ready(function(){
            $('.search_banner_btn').on('click',function(){
                search_value = $('.search_input_val').val();
                location.href = "{{ url('storage-search?location=') }}"+search_value;
            })
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('Trade_Storage/assets/js/main.js') }}"></script>

</body>
</html>