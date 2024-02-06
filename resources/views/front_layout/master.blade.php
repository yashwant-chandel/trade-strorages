<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <!-- slick cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <!-- bootstrap cdn -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>

        <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->
        <link rel="stylesheet" href="{{ asset('Trade_Storage/assets/css/main.css') }}" />
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
       
        <title>Landing page</title>
    </head>
    <body>
        <?php 
         $admin = App\Models\User::where('is_admin',1)->first();
         $sitemeta = App\Models\SiteMeta::all();
         $storage_types = App\Models\Category::all();
        
        ?>
        <header class="main_header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="header_logo">
                            <img src="{{ asset('Trade_Storage/assets/img/Trade-logo.png') }}" alt="" />
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="header_links">
                            <ul class="nav_list d-flex">
                                <li>
                                    <a href="">Support</a>
                                </li>
                                <li>
                                    <a href="">Company Info</a>
                                </li>
                            </ul>
                            <ul class="links_contact">
                                <li>
                                    <a href="tel:+1 {{ $admin->phone ?? '' }}">
                                        <img src="{{ asset('Trade_Storage/assets/img/phone.png') }}" alt="" />
                                       {{ $admin->phone ?? '' }}
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('Trade_Storage/assets/img/live.png') }}" alt="" />
                                        Live Chat
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('Trade_Storage/assets/img/account.png') }}" alt="" />
                                        My Account
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

        <footer class="main_footer">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-4">
                        <div class="footer_logo">
                            <a href=""><img src="{{ asset('Trade_Storage/assets/img/Trade Storage.png') }}" alt="" /></a>
                            <p>STAY TUNED TO Trade Storage</p>
                            <ul class="social_links d-flex align-items-center gap-3">
                                @foreach($sitemeta as $meta)
                                @if($meta->key == 'facebook')
                                    @if($meta->value)
                                    <li>
                                        <a href="//{{ $meta->value ?? '' }}"><img src="{{ asset('Trade_Storage/assets/img/facebook-white.png') }}" alt=""/></a>
                                    </li>
                                    @endif
                                @elseif($meta->key == 'instagram')
                                    @if($meta->value)
                                    <li>
                                        <a href="//{{ $meta->value ?? '' }}"><img src="{{ asset('Trade_Storage/assets/img/instagram-white.png') }}" alt=""/></a>
                                    </li>
                                    @endif
                                @elseif($meta->key == 'pintrest')
                                    @if($meta->value)
                                    <li>
                                        <a href="//{{ $meta->value ?? '' }}"><img src="{{ asset('Trade_Storage/assets/img/pintrest-white.png') }}" alt=""/></a>
                                    </li>
                                    @endif
                                @elseif($meta->key == 'linkedin')
                                    @if($meta->value)
                                    <li>
                                        <a href="//{{ $meta->value ?? '' }}"><img src="{{ asset('Trade_Storage/assets/img/linkedin.png') }}" alt=""/></a>
                                    </li>
                                    @endif
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="foter_links">
                            <h2 class="quick_link">Storage Types</h2>
                            <ul>
                                @foreach($storage_types as $types)
                                <li>
                                    <a href="">{{ $types->name ?? '' }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="foter_links">
                            <h2 class="quick_link">Support</h2>
                            <ul>
                                <li>
                                    <a href="">Contact </a>
                                </li>
                                <li>
                                    <a href="">Help Center </a>
                                </li>
                                <li>
                                    <a href="">Size Guide </a>
                                </li>
                                <li>
                                    <a href="">Trade Storage Blog </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="fotter_adress">
                            <div class="foter_links">
                                <h2 class="quick_link">Address</h2>
                                <div class="adress">
                                    @if($admin->address_data)
                                    <p>{{ $admin->address_data->address ?? '' }}, {{ $admin->address_data->city ?? '' }}, {{ $admin->address_data->state ?? '' }} <br> {{ $admin->address_data->pincode ?? '' }}</p>
                                    @endif
                                </div>
                            </div>
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
            <div class="copyright">
                <p>Copyright ©2024 Trade Storage.</p>
            </div>
        </footer>

         <!-- bootstrap cdn -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- slick cdn -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="{{ asset('Trade_Storage/assets/js/main.js') }}"></script>
    </body>
</html>
