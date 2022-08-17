@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Making Knitting Send View</h3>
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
                            <th>Suta Name</th>
                            <th>Brand</th>
                            <th>Kapor</th>
                            <th>Body</th>
                            <th>Rib</th>
                            <th>Color</th>
                            <th>Roll</th>
                            <th>Total</th>
                            <th>Used Lekra</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        {{-- {{dd($all_knitting_received_multiple)}} --}}
            
                        @foreach ($all_knitting_received_multiple as $key=>$knitting_received_multiple)   
                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$knitting_received_multiple->received_chalan_id}}</td>
                                    <td>{{$knitting_received_multiple->rel_to_suta->suta_name}}</td>
                                    <td>{{$knitting_received_multiple->rel_to_brand->brand_name}}</td>
                                    <td>{{$knitting_received_multiple->rel_to_kapor->kapor_name}}</td>
                                    <td>{{$knitting_received_multiple->body}}</td>
                                    <td>{{$knitting_received_multiple->rib}}</td>
                                    <td>{{$knitting_received_multiple->color}}</td>
                                    <td>{{$knitting_received_multiple->roll}}</td>
                                    <td>{{$knitting_received_multiple->total}}</td>
                                    <td>{{$knitting_received_multiple->total_used_lekra}}</td>
                                    <td>
                                        <a  class="btn btn-sm bg-warning-light"href="{{route('knittingReceivedMultipleEdit',$knitting_received_multiple->id)}}">
                                        <i class="fe fe-pencil"></i> Edit
                                         </a>
                                        <a  class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal_{{$knitting_received_multiple->id}}">
                                            <i class="fe fe-trash"></i> Delete
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade delete_modal" id="delete_modal_{{$knitting_received_multiple->id}}" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="form-content p-2">
                                                    <h4 class="modal-title">Delete</h4>
                                                    <p class="mb-4">Are you sure want to delete?</p>
                                                    <button  name="{{$knitting_received_multiple->id }}" type="button" class="btn btn-primary btn_delete">Delete </button>
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
                url:"/knittingRecivedMultipleDelete/"+id,
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
<script>

    $(document).ready(function() {
        $('.btn_delete').click(function() {
            var id=  $(this).attr('name');
            // alert(id);
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "GET",
                dataType: "json",
                url:"/knittingSendLekraBrandDelete/"+id,
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