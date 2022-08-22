@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Making Dyeing Received View</h3>
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
                                <th>Received Chalan Id</th>
                                {{-- <th>Dyeing Send Id</th> --}}
                                {{-- <th>Date</th>/ --}}
                                <th>Style</th>
                                <th>Lot No</th>
                                <th>Body</th>
                                <th>Balance</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            {{-- {{dd($all_cuting_received)}} --}}
                
                            @foreach ($all_cuting_received as $key=>$cuting_received)   
                                <tbody>
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$cuting_received->received_chalan_id}}</td>
                                        {{-- <td>{{$cuting_received->dyeing_send_id}}</td> --}}
                                        {{-- <td>{{$cuting_received->date}}</td> --}}
                                        <td>{{$cuting_received->style}}</td>
                                        <td>{{$cuting_received->lot_no}}</td>
                                        <td>{{$cuting_received->body}}</td>
                                        <td>{{$cuting_received->balance}}</td>
                                        <td>
                                            <a  class="btn btn-sm bg-warning-light"href="{{route('cuttingReceivedMultipleEdit',$cuting_received->id)}}">
                                            <i class="fe fe-pencil"></i> Edit
                                            </a>
                                            <a  class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal_{{$cuting_received->id}}">
                                                <i class="fe fe-trash"></i> Delete
                                        </td>
                                    </tr>

                                    <!-- Delete Modal -->
                                    <div class="modal fade delete_modal" id="delete_modal_{{$cuting_received->id}}" aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document" >
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="form-content p-2">
                                                        <h4 class="modal-title">Delete</h4>
                                                        <p class="mb-4">Are you sure want to delete?</p>
                                                        <button  name="{{$cuting_received->id }}" type="button" class="btn btn-primary btn_delete">Delete </button>
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
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "GET",
                dataType: "json",
                url:"/cuttingRecevedMultipleDelete/"+id,
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