@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3>Making Knitting Received Show</h3>
                {{-- <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul> --}}
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Chalan Id</th>
                                        <th>Date</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                  
                               @foreach ($all_knitting_received as $key=>$knitting_received)   
                                    <tbody>
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$knitting_received->send_chalan_id}}</td>
                                            <td>{{$knitting_received->date}}</td>                                       
                                            <td class="text-left">                                              
                                                <div class="actions">
                                                    <a  class="btn btn-sm bg-success-light"  href="{{route('KnittingReceivedView',$knitting_received->id)}}">
                                                        <i class="fe fe-eye"></i> View
                                                    </a>
                                                    <a  class="btn btn-sm bg-info-light" target="_blank" href="{{route('KnittingRecivedView',$knitting_received->id)}}">
                                                        <i class="fe fe-eye"></i> Invoice View
                                                    </a>
                                                    <a  class="btn btn-sm bg-success-light"href="{{route('KnittingRecivedPDFDownload',$knitting_received->id)}}">
                                                        <i class="fa fa-download" aria-hidden="true"></i></i> Download
                                                    </a>
                                                    <a  class="btn btn-sm bg-warning-light" href="{{route('KnittingReceivedEdit',$knitting_received->id)}}">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    {{-- <a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_modal_{{$knitting_received->id}}">
                                                        <i class="fe fe-pencil"></i> Edit --}}
                                                    <a  class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal_{{$knitting_received->id}}">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                       
                                                </div>                                            
                                            </td>                                      
                                            <!-- Delete Modal -->
                                                <div class="modal fade delete_modal" id="delete_modal_{{$knitting_received->id}}" aria-hidden="true" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="form-content p-2">
                                                                    <h4 class="modal-title">Delete</h4>
                                                                    <p class="mb-4">Are you sure want to delete?</p>
                                                                    <button  name="{{$knitting_received->id }}" type="button" class="btn btn-primary btn_delete">Delete </button>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- /Delete Modal -->
{{-- {{dd($knitting_received->rel_to_send_chalan_id->send_chalan_id)}} --}}
                                            <!-- Edit Details Modal -->
                                        {{-- <div class="modal fade" id="edit_modal_{{$knitting_received->id}}" aria-hidden="true" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document" >
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Received Form</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('KnittingRecivedUpdate')}}" name="post">
                                                                @csrf

                                                                <div class="row form-row">
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Specialities</label>
                                                                            <input type="text" class="form-control" value="Cardiology">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <label>Image</label>
                                                                        <div class="form-group">
                                                                            
                                                                            <select class="form-control select2_search send_chalan_id" id="send_chalan_id"  name="send_chalan_id" style="width: 218px;">  
                                                                                <option value="">--Select Option--</option>  

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <!-- /Edit Details Modal -->
                                         
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
                    url:"/knittingReceivedDelete/"+id,
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data){
                        $('.delete_modal').hide();
                        $('.modal-backdrop').hide();
                        toastr.error(data.success);
                        window.location.reload();

                    }
                });
            });
        });
    </script>
    
@endsection