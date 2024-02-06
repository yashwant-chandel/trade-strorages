@extends('admin_layout/index')
@section('content')

<div class="col-lg-6 d-none py-3" id="add-section">
                 <div class="card card-bordered h-100">
                     <div class="card-inner">
                         <div class="card-head d-flex justify-content-between">
                             <h5 class="card-title">Site Features</h5>
                             <button class="remove btn btn-link" ><i class="fas fa-times"></i></button>
                         </div>
                         <form action="{{ url('admin-dashboard/featureSubmit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="">
                             <div class="form-group">
                                 <label class="form-label" for="title">Name</label>
                                 <div class="form-control-wrap">
                                     <input type="text" name="title"  class="form-control" id="title" value="">
                                 </div>
                                 @error('title')
				                                <span class="text text-danger">{{ $message }}</span>
		                          @enderror
                             </div>
                             <div class="form-group">
                                 <label class="form-label" for="description">Description</label>
                                 <div class="form-control-wrap">
                                     <textarea type="text" name="description" class="form-control" id="description" value=""></textarea>
                                 </div>
                                 @error('description')
				                                <span class="text text-danger">{{ $message }}</span>
		                          @enderror
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
                                Unit Sizes List
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
                                   <span>Title</span>
                               </span>
                           </th>
                          <th class="tb-tnx-info text-center">
                               <span class="tb-tnx-desc d-none d-sm-inline-block">
                                   <span>Description</span>
                               </span>
                           </th>
                          
                           <th class="tb-tnx-action text-center">
                               <span>Action</span>
                           </th>
                       </tr>
                   </thead>
                   <tbody>
                    <?php $count = 1 ?>
                   @foreach($features as $feature)
                       <tr class="tb-tnx-item">
                           <td class="tb-tnx-id text-center">
                               <a href="#"><span>{{ $count++ }}</span></a>
                           </td>
                           <td class="tb-tnx-info text-center">
                               <div class="tb-tnx-desc">
                                   <span class="title">{{ $feature->title ?? '' }}</span>
                               </div>
                           </td>
                            <td class="tb-tnx-info text-center">
                               <div class="tb-tnx-desc">
                                   <span class="title">{{ $feature->description ?? '' }}</span>
                               </div>
                           </td> 
                           <td class="tb-tnx-amount is-alt text-center">
                         
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li><a class="edit-btn" feature-title="{{ $feature->title ?? '' }}" feature-description="{{ $feature->description ?? '' }}" feature-id="{{ $feature->id ?? '' }}"  href="{{ url('/admin-dashboard/size/') }}/">Edit</a></li>
                                        <li><a href="{{ url('admin-dashboard/featureDelete/') }}/{{ $feature->id ?? '' }}">delete</a></li>
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
                name = $(this).attr('feature-title');
                id = $(this).attr('feature-id');
                description = $(this).attr('feature-description');
                // console.log(name+slug+id+icon);
           
                $('input[name="title"]').val(name);
                $('input[name="id"]').val(id);
                $('textarea[name="description"]').html(description);

                $('.savebtn').hide();
                $('.updatediv').show();
            });
            $('.addnew').click(function(){
                $('input[name="title"]').val('');
                $('input[name="id"]').val('');
                $('textarea[name="description"]').html('');

                $('.savebtn').show();
                $('.updatediv').hide();
            })
            $('button#addnewsecitonbutton').on('click',function(){
                $('div#add-section').removeClass('d-none');
            })
            $('.remove').on('click',function(){
                $('div#add-section').addClass('d-none');
                $('input[name="title"]').val('');
                $('input[name="id"]').val('');
                $('textarea[name="description"]').html('');
            })
        </script>
        @if($errors->any())
        <script>
          $('#add-section').removeClass('d-none');
        </script>
        @endif
@endsection