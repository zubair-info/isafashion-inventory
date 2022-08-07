@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Home</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">User List</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-12 col-sm-6 col-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">

                        <h4 class="font-weight-bold text-black">User List <span class="float-end">Total User:
                                {{ $total_user }} </span></h4>
   
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">         
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Create at</th>
                                        <th>Action</th>
        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_users as $key => $user)
                                        <tr class="{{ $loop->odd ? 'text-danger' : 'text-success' }}">
                                        <td>{{$key+1}}</td>
                                            {{-- <td>{{ $all_users->firstitem() + $key }}</td> --}}
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            {{-- <td>{{ $user->id }}</td> --}}
                                            <td>
                                                <div class="status-toggle">
                                                    
                                                    <input  data-id="{{$user->id}}" class="check status_check" type="checkbox" id="status_3" >
                                                    <label for="status_3" class="checktoggle">checkbox</label>

                                                </div>
    
                                            </td>
                                            <td>{{ $user->created_at->diffForHumans() }}</td>

                                            <td class="text-left">                                              
                                                <div class="actions">
                                                    <a  class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal_{{$user->id}}">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                       
                                                </div>                                            
                                            </td>                                      
                                            <!-- Delete Modal -->
                                                <div class="modal fade delete_modal" id="delete_modal_{{$user->id}}" aria-hidden="true" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                                        <div class="modal-content">
                                                            {{-- <div class="modal-header">
                                                                <h5 class="modal-title">Delete</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div> --}}
                                                            <div class="modal-body">
                                                                <div class="form-content p-2">
                                                                    <h4 class="modal-title">Delete</h4>
                                                                    <p class="mb-4">Are you sure want to delete?</p>
                                                                    <button  name="{{$user->id }}" type="button" class="btn btn-primary btn_delete">Delete </button>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- /Delete Modal -->
                                        </tr>
                                    @endforeach      
                                </tbody>                    
                            </table>
                            {{-- {{ $all_users->links() }} --}}
                          {{-- {{Auth::check()}} --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    
    
</div>		
    
@endsection

@section('footer_script')
<script>
    $(function() {
      $('.status_check').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var user_id = $(this).attr('data-id'); 
          alert(user_id);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changeStatus',
              data: {'status': status, 'user_id': user_id},
              success: function(data){
                console.log(data.success)
              }
          });
      });
    })
  </script>

  	{{--  delete code  --}}
      <script>

        $(document).ready(function() {
            $('.btn_delete').click(function() {
                var id=  $(this).attr('name');
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url:"/userDelete/"+id,
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data){
                        $('.delete_modal').hide();
                        $('.modal-backdrop').hide();
                        toastr.success(data.success);
                        window.location.reload();

                    }
                });
            });
        });
    </script>


    
@endsection