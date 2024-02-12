@extends('front_layout.master')
@section('content')

<section class="banner_wrapper" style="background-image: url({{ url('Trade_Storage/assets/img/size-guide-ban.png') }});">
        <div class="container">
            <div class="banner_content">
                <h1>Size Guide</h1>
                <p>Picking a storage unit size can be tricky. We're here to help make it easier.</p>
            </div>
        </div>
    </section>

    <section class="support_sec size_guide_sec p_100">
        <div class="container">
            <div class="support_content size_content">
                <div class="support_tabs">
                    <div class="supr-row">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <div class="suport_links">
                                    <p>Small Self Storage Units</p>
                                    <span class="tbs_arw">
                                        <img src="{{ url('Trade_Storage/assets/img/arw-z.png') }}" class="img-fluid" alt="" />
                                    </span>
                                </div>
                            </button>

                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                <div class="suport_links">
                                    <p>Medium Self Storage Units</p>
                                    <span class="tbs_arw">
                                        <img src="{{ url('Trade_Storage/assets/img/arw-z.png') }}" class="img-fluid" alt="" />
                                    </span>
                                </div>
                            </button>

                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                <div class="suport_links">
                                    <p>Large Self Storage Units</p>
                                    <span class="tbs_arw">
                                        <img src="{{ url('Trade_Storage/assets/img/arw-z.png') }}" class="img-fluid" alt="" />
                                    </span>
                                </div>
                            </button>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                <div class="suport_links">
                                    <p>Vehicle Storage Units</p>
                                    <span class="tbs_arw">
                                        <img src="{{ url('Trade_Storage/assets/img/arw-z.png') }}" class="img-fluid" alt="" />
                                    </span>
                                </div>
                            </button>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="support_tabs_content">
                                    <h3>Small Self Storage Units</h3>
                                    <p>
                                        Our small self-storage units range from 5’x5’ to 5’x10’ and are great for storing boxes, small furniture or the contents of one room. Whether you’re storing seasonal items or just need to clear
                                        out a little extra space for some unexpected house guests, we’ve got you covered.
                                    </p>
                                    <div class="size_guide_units">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="smal_units">
                                                    <h6>Lockers - Great Value</h6>
                                                    <div class="size-img">
                                                        <img src="{{ url('Trade_Storage/assets/img/sml-unit1.png') }}" class="img-fluid" alt="" />
                                                    </div>
                                                    <p>
                                                        Learn more about<br />
                                                        our lockers
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="smal_units">
                                                    <h6>5’x5’ - Large Closet</h6>
                                                    <div class="size-img">
                                                        <img src="{{ url('Trade_Storage/assets/img/sml-unit1.png') }}" class="img-fluid" alt="" />
                                                    </div>
                                                    <p>
                                                        See what fits in a<br />
                                                        5’x5’ unit
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="smal_units">
                                                    <h6>5’x10’ - One Room</h6>
                                                    <div class="size-img">
                                                        <img src="{{ url('Trade_Storage/assets/img/sml-unit1.png') }}" class="img-fluid" alt="" />
                                                    </div>
                                                    <p>
                                                        See what fits in a<br />
                                                        5’x10’ unit
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="support_tabs_content">
                                    <h3>Small Self Storage Units</h3>
                                    <p>
                                        Our small self-storage units range from 5’x5’ to 5’x10’ and are great for storing boxes, small furniture or the contents of one room. Whether you’re storing seasonal items or just need to clear
                                        out a little extra space for some unexpected house guests, we’ve got you covered.
                                    </p>
                                    <div class="size_guide_units">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="smal_units">
                                                    <h6>Lockers - Great Value</h6>
                                                    <div class="size-img">
                                                        <img src="{{ url('Trade_Storage/assets/img/sml-unit1.png') }}" class="img-fluid" alt="" />
                                                    </div>
                                                    <p>
                                                        Learn more about<br />
                                                        our lockers
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="smal_units">
                                                    <h6>5’x5’ - Large Closet</h6>
                                                    <div class="size-img">
                                                        <img src="{{ url('Trade_Storage/assets/img/sml-unit1.png') }}" class="img-fluid" alt="" />
                                                    </div>
                                                    <p>
                                                        See what fits in a<br />
                                                        5’x5’ unit
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="smal_units">
                                                    <h6>5’x10’ - One Room</h6>
                                                    <div class="size-img">
                                                        <img src="{{ url('Trade_Storage/assets/img/sml-unit1.png') }}" class="img-fluid" alt="" />
                                                    </div>
                                                    <p>
                                                        See what fits in a<br />
                                                        5’x10’ unit
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <div class="support_tabs_content">
                                    <h3>Small Self Storage Units</h3>
                                    <p>
                                        Our small self-storage units range from 5’x5’ to 5’x10’ and are great for storing boxes, small furniture or the contents of one room. Whether you’re storing seasonal items or just need to clear
                                        out a little extra space for some unexpected house guests, we’ve got you covered.
                                    </p>
                                    <div class="size_guide_units">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="smal_units">
                                                    <h6>Lockers - Great Value</h6>
                                                    <div class="size-img">
                                                        <img src="{{ url('Trade_Storage/assets/img/sml-unit1.png') }}" class="img-fluid" alt="" />
                                                    </div>
                                                    <p>
                                                        Learn more about<br />
                                                        our lockers
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="smal_units">
                                                    <h6>5’x5’ - Large Closet</h6>
                                                    <div class="size-img">
                                                        <img src="{{ url('Trade_Storage/assets/img/sml-unit1.png') }}" class="img-fluid" alt="" />
                                                    </div>
                                                    <p>
                                                        See what fits in a<br />
                                                        5’x5’ unit
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="smal_units">
                                                    <h6>5’x10’ - One Room</h6>
                                                    <div class="size-img">
                                                        <img src="{{ url('Trade_Storage/assets/img/sml-unit1.png') }}" class="img-fluid" alt="" />
                                                    </div>
                                                    <p>
                                                        See what fits in a<br />
                                                        5’x10’ unit
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <div class="support_tabs_content">
                                    <h3>Small Self Storage Units</h3>
                                    <p>
                                        Our small self-storage units range from 5’x5’ to 5’x10’ and are great for storing boxes, small furniture or the contents of one room. Whether you’re storing seasonal items or just need to clear
                                        out a little extra space for some unexpected house guests, we’ve got you covered.
                                    </p>
                                    <div class="size_guide_units">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="smal_units">
                                                    <h6>Lockers - Great Value</h6>
                                                    <div class="size-img">
                                                        <img src="{{ url('Trade_Storage/assets/img/sml-unit1.png') }}" class="img-fluid" alt="" />
                                                    </div>
                                                    <p>
                                                        Learn more about<br />
                                                        our lockers
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="smal_units">
                                                    <h6>5’x5’ - Large Closet</h6>
                                                    <div class="size-img">
                                                        <img src="{{ url('Trade_Storage/assets/img/sml-unit1.png') }}" class="img-fluid" alt="" />
                                                    </div>
                                                    <p>
                                                        See what fits in a<br />
                                                        5’x5’ unit
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="smal_units">
                                                    <h6>5’x10’ - One Room</h6>
                                                    <div class="size-img">
                                                        <img src="{{ url('Trade_Storage/assets/img/sml-unit1.png') }}" class="img-fluid" alt="" />
                                                    </div>
                                                    <p>
                                                        See what fits in a<br />
                                                        5’x10’ unit
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection