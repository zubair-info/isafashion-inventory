@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Welcome Admin!</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-4 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Suta Name Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('sutaNameStore')}}"method="post" >
                            @csrf
                          
                            <div class="form-group row">
                                <label class="form-label">Suta Name</label>
                                <input type="text" class="form-control" name="suta_name"  placeholder="Enter Suta Name : 30/1">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Add suta</button>
                            </div>
                        </form>
                    </div>               
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Suta Name List</h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Suta Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                @foreach ($all_suta_name as $key=>$suta)                                 
                            
                                    <tbody>
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$suta->suta_name}}</td>
                                            <td class="text-left">                                              
                                                <div class="actions">
                                                    {{-- <a  class="btn btn-sm bg-danger-light"href="{{route('sutaNameEdit',$suta->id)}}">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a> --}}
                                                    <a  class="btn btn-sm bg-danger-light" data-toggle="modal" href="#edit_modal_{{$suta->id}}">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                       
                                                    
                                                    <a  class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal_{{$suta->id}}">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                       
                                                </div>                                            
                                            </td>    
                                            
                                             <!-- Edit Modal -->
                                             <div class="modal fade delete_modal" id="edit_modal_{{$suta->id}}" aria-hidden="true" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document" >
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="form-content p-2">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="card-header">
                                                                            <h4 class="card-title">Edit Suta Form</h4>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <form action="{{route('sutaUpdate')}}" method="post">
                                                                                @csrf
                                                    
                                                                                <input type="hidden" name="id" class="form-control"  value="{{ $suta->id}}"  placeholder="Enter Suta Name : 30/1">
                                                                                
                                                                                <div class="form-group row">
                                                                                    <label class="form-label">Suta Name</label>
                                                                                    <input type="text" class="form-control" name="suta_name"  value="{{ $suta->suta_name}}">
                                                                                </div>
                                                                           
                                                                                <div class="text-right">
                                                                                    <button type="submit" class="btn btn-primary edit_btn">Update Suta</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>               
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- /edit Modal -->
                                            <!-- Delete Modal -->
                                                <div class="modal fade delete_modal" id="delete_modal_{{$suta->id}}" aria-hidden="true" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="form-content p-2">
                                                                    <h4 class="modal-title">Delete</h4>
                                                                    <p class="mb-4">Are you sure want to delete?</p>
                                                                    <button  name="{{$suta->id }}" type="button" class="btn btn-primary btn_delete">Delete </button>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- /Delete Modal -->
                                         
                                        </tr>                                   
                                    </tbody>
                                @endforeach
                            </table>
                        </div>                
                </div>
            </div>
        </div>
    </div>    
</div>		  
@endsection

@section('footer_script')

	{{--  delete code  --}}
    <script>

        $(document).ready(function() {
            $('.btn_delete').click(function() {
                var id=  $(this).attr('name');
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url:"/sutaDelete/"+id,
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