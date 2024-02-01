@extends('admin_layout/index')
@section('content')
<div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Properties list</h3>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner-group">
                                            <div class="card-inner p-0">
                                                <div class="nk-tb-list">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col nk-tb-col-check">
                                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                <input type="checkbox" class="custom-control-input" id="pid">
                                                                <label class="custom-control-label" for="pid"></label>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                                                        <div class="nk-tb-col nk-tb-col-tools">
                                                            <ul class="nk-tb-actions gx-1 my-n1">
                                                                <li class="me-n1">
                                                                    <div class="dropdown">
                                                                        <!-- <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>
                                                                                <li><a href="#"><em class="icon ni ni-bar-c"></em><span>View</span></a></li>
                                                                            </ul>
                                                                        </div> -->
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    @foreach($properties as $propertie)
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col nk-tb-col-check">
                                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                <input type="checkbox" class="custom-control-input" id="pid1">
                                                                <label class="custom-control-label" for="pid1"></label>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span class="tb-product">
                                                                <img src="{{ asset($propertie->media[0]->image_path) }}" alt="" class="thumb">
                                                                <span class="title">{{ $propertie->address->address ?? '' }} {{ $propertie->address->city ?? '' }}, {{ $propertie->address->state ?? '' }} {{ $propertie->address->pincode ?? '' }}</span>
                                                            </span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-col-tools">
                                                            <ul class="nk-tb-actions gx-1 my-n1">
                                                                <li class="me-n1">
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="{{ url('admin-dashboard/properties/edit/'.$propertie->slug) }}"><em class="icon ni ni-edit"></em><span>Edit Propertie</span></a></li>
                                                                                <li><a class="delete" link="{{ url('admin-dashboard/properties/delete/'.$propertie->id) }}"><em class="icon ni ni-activity-round"></em><span>Remove Propertie</span></a></li>
                                                                                <li><a href="{{ url('admin-dashboard/properties/view/'.$propertie->slug) }}"><em class="icon ni ni-eye"></em><span>View Propertie</span></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    @endforeach
                                                </div><!-- .nk-tb-list -->
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->
                               </div></div></div></div></div>
                            </div>
                        </div>
                    </div>
<script>
$('.delete').on('click',function(){
    link = $(this).attr('link');
    Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure to want to delete this property !",
                icon: 'info',
                showCancelButton: true,
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                }).then((result) => {
                if (result.isConfirmed) {
                  location.href = link;
                }
            })
})
</script>
@endsection