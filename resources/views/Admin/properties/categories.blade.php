@extends('admin_layout/index')
@section('content')
<div class="col-lg-6 d-none py-3" id="add-section">
                 <div class="card card-bordered h-100">
                     <div class="card-inner">
                         <div class="card-head d-flex justify-content-between">
                             <h5 class="card-title">Storage Types</h5>
                             <button class="remove btn btn-link" ><i class="fas fa-times"></i></button>
                         </div>
                         <form action="{{ url('admin-dashboard/categorySubmit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="">
                             <div class="form-group">
                                 <label class="form-label" for="name">Name</label>
                                 <div class="form-control-wrap">
                                     <input type="text" name="name"  onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)"  class="form-control" id="name" value="">
                                 </div>
                                 @error('name')
				                                <span class="text text-danger">{{ $message }}</span>
		                          @enderror
                             </div>
                             <div class="form-group">
                                 <label class="form-label" for="icon">Icon</label>
                                 <div class="form-control-wrap">
                                     <input type="text" name="icon" class="form-control" id="icon" value="">
                                 </div>
                                 @error('icon')
				                                <span class="text text-danger">{{ $message }}</span>
		                          @enderror
                             </div>
                             <div class="form-group">
                                 <!-- <label class="form-label" for="slug">Slug</label> -->
                                 <div class="form-control-wrap">
                                     <input type="hidden" name="slug" class="form-control" id="slug" value="">
                                 </div>
                                 <!-- @error('slug')
				                                <span class="text text-danger">{{ $message }}</span>
		                          @enderror -->
                             </div>
                            
                             <div class="form-group">
                                 <button type="submit" class="btn btn-primary savebtn">Save</button>
                                 <div class="updatediv" style="display:none;">
                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <button type="button" class="btn btn-primary addnew">Add New</button>
                                 </div>
                             </div>
                             
                         </form>
                     </div>
                 </div>
        </div>
        <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content d-flex justify-content-between">
                            <h4 class="nk-block-title">
                                Storage Types List
                            </h4>
                            <button class="btn btn-primary" id="addnewsecitonbutton">Add new</button>
                        </div>
                    </div>
                    <div class="card card-bordered card-preview">
                        <table class="table table-tranx">
                   <thead class="text-center">
                       <tr class="tb-tnx-head ">
                           <th class="tb-tnx-id"><span class="">#</span></th>
                           <th class="tb-tnx-info text-center">
                               <span class="tb-tnx-desc d-none d-sm-inline-block">
                                   <span>Name</span>
                               </span>
                           </th>
                          <th class="tb-tnx-info text-center">
                               <span class="tb-tnx-desc d-none d-sm-inline-block">
                                   <span>Icon</span>
                               </span>
                           </th>
                          
                           <th class="tb-tnx-action text-center">
                               <span>Action</span>
                           </th>
                       </tr>
                   </thead>
                   <tbody>
                    <?php $count = 1 ?>
                   @foreach($categories as $cat)
                       <tr class="tb-tnx-item">
                           <td class="tb-tnx-id text-center">
                               <a href="#"><span>{{ $count++ }}</span></a>
                           </td>
                           <td class="tb-tnx-info text-center">
                               <div class="tb-tnx-desc">
                                   <span class="title">{{ $cat->name ?? '' }}</span>
                               </div>
                           </td>
                            <td class="tb-tnx-info text-center">
                               <div class="tb-tnx-desc">
                                   <span class="title">{{ $cat->icon ?? '' }}</span>
                               </div>
                           </td> 
                           <td class="tb-tnx-amount is-alt text-center">
                         
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li><a href="{{ url('admin-dashboard/sizes/') }}/{{ $cat->slug ?? '' }}">sizes</a></li>
                                        <li><a href="{{ url('admin-dashboard/features/') }}/{{ $cat->slug ?? '' }}">Features</a></li>
                                        <li><a class="edit-btn" cat-name="{{ $cat->name ?? '' }}" cat-slug="{{ $cat->slug ?? '' }}" cat-id="{{ $cat->id ?? '' }}" cat-icon="{{ $cat->icon ?? '' }}" href="{{ url('/admin-dashboard/branches/') }}/">Edit</a></li>
                                        <li><a class="delete-btn" link="{{ url('admin-dashboard/category/delete/') }}/{{ $cat->id ?? '' }}">delete</a></li>
                                    </ul>
                                </div>
                            </div>
                           </td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
              
           </div>
  </div>
        @error('name')
            <script>
                $('div#add-section').removeClass('d-none');
            </script>
        @enderror
        @error('slug')
        <script>
            $(document).ready(function(){
                $('div#add-section').removeClass('d-none');
                NioApp.Toast('Name must be unique and required !', 'info', {position: 'top-right'});
            });
        </script>
        @enderror
        <script>
             function convertToSlug(str){
                str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
                            .toLowerCase();
                   str = str.replace(/^\s+|\s+$/gm,'');
                   str = str.replace(/\s+/g, '-');   
                   $('#slug').val(str);
                }
        </script>
        <script>
            $('.edit-btn').on('click',function(e){
                e.preventDefault();
                $('div#add-section').removeClass('d-none');
                name = $(this).attr('cat-name');
                slug = $(this).attr('cat-slug');
                id = $(this).attr('cat-id');
                icon = $(this).attr('cat-icon');
                // console.log(name+slug+id+icon);
           
                $('input[name="name"]').val(name);
                $('input[name="slug"]').val(slug);
                $('input[name="id"]').val(id);
                $('input[name="icon"]').val(icon);

                $('.savebtn').hide();
                $('.updatediv').show();
            });
            $('.addnew').click(function(){
                $('input[name="name"]').val('');
                $('input[name="slug"]').val('');
                $('input[name="id"]').val('');
                $('input[name="icon"]').val('');

                $('.savebtn').show();
                $('.updatediv').hide();
            })
            $('button#addnewsecitonbutton').on('click',function(){
                $('div#add-section').removeClass('d-none');
            })
            $('.remove').on('click',function(){
                $('div#add-section').addClass('d-none');
                $('input[name="name"]').val('');
                $('input[name="slug"]').val('');
                $('input[name="id"]').val('');
                $('input[name="icon"]').val('');
            })
        </script>
        <script>
            $('.delete-btn').on('click',function(){
                link = $(this).attr('link');
                Swal.fire({
                title: 'Please Login',
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