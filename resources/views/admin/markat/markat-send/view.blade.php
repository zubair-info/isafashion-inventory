@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Markat Multiple Send View</h3>
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
                    <div class="table-responsive">

                    
                    <table class="table" style="width:100%">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>Send Chaan Id</th>
                            <th>date</th>
                            <th>Style</th>
                            <th>Lot No</th>
                            <th>Body</th>
                            <th>Balance</th>
                            <th>Action</th>

                          </tr>
                        </thead>
                        {{-- {{dd($all_all_markat_send)}} --}}
            
                        @foreach ($all_markat_send as $key=>$all_markat_send)   
                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$all_markat_send->send_chalan_id	}}</td>
                                    <td>{{$all_markat_send->date}}</td>
                                    <td>{{$all_markat_send->style}}</td>
                                    <td>{{$all_markat_send->lot_no}}</td>
                                    <td>{{$all_markat_send->body}}</td>
                                    <td>{{$all_markat_send->balance}}</td>
                                    <td>
                                        <a  class="btn btn-sm bg-warning-light"href="{{route('markatSendMultipleEdit',$all_markat_send->id)}}">
                                        <i class="fe fe-pencil"></i> Edit
                                         </a>
                                        <a  class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal_{{$all_markat_send->id}}">
                                            <i class="fe fe-trash"></i> Delete
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade delete_modal" id="delete_modal_{{$all_markat_send->id}}" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="form-content p-2">
                                                    <h4 class="modal-title">Delete</h4>
                                                    <p class="mb-4">Are you sure want to delete?</p>
                                                    <button  name="{{$all_markat_send->id }}" type="button" class="btn btn-primary btn_delete">Delete </button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <!-- /Delete Modal -->
                                
                            </tbody>
                         @endforeach
            
                    </table>

                    </div>
                     
            
                      
                </div>
            </div>
        </div>
    </div>
    <!-- /Invoice Container -->

</div>		
    
@endsection

@section('footer_script')
{{--  delete code  --}}
<script>



    $(document).ready(function() {
        $('.btn_delete').click(function() {
            var id=  $(this).attr('name');
            // alert(id);
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "GET",
                dataType: "json",
                url:"/markatSendMultipleDelete/"+id,
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