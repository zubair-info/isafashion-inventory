@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Knitting Received Lekra Brand </h3>
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
                            <th>Send Chalan Id</th>
                            <th>Company Name</th>
                            <th>Date</th>
                            <th>Lekra Name</th>
                            <th>Lekra Cartoon</th>
                            <th>Lekra Rate</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        {{-- {{dd($all_knitting_received_lekra_brand)}} --}}
            
                        @foreach ($all_knitting_received_lekra_brand as $key=>$knitting_received_lekra_brand)   
                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$knitting_received_lekra_brand->send_chalan_id}}</td>
                                    <td>{{$knitting_received_lekra_brand->rel_to_company->company_name}}</td>
                                    <td>{{$knitting_received_lekra_brand->date}}</td>
                                    <td>{{$knitting_received_lekra_brand->rel_to_lekra_brand->lekra_brand_name}}</td>
                                    <td>{{$knitting_received_lekra_brand->lekra_cartoon}}</td>
                                    <td>{{$knitting_received_lekra_brand->lekra_rate}}</td>

                                    <td>
                                        <a  class="btn btn-sm bg-warning-light"href="{{route('knittingReceivedSutaBrandEdit',$knitting_received_lekra_brand->id)}}">
                                        <i class="fe fe-pencil"></i> Edit
                                         </a>
                                        <a target="_blank"  class="btn btn-sm bg-warning-light" href="{{route('KnittingReceivedLekraBrandPDFview',$knitting_received_lekra_brand->id)}}">
                                        <i class="fe fe-eye"></i> Invoice
                                         </a>
                                        <a target="_blank"  class="btn btn-sm bg-warning-light" href="{{route('KnittingReceivedLekraBrandPDFdown',$knitting_received_lekra_brand->id)}}">
                                            <i class="fa fa-download" aria-hidden="true"></i> Download
                                         </a>
                                        <a  class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal_{{$knitting_received_lekra_brand->id}}">
                                            <i class="fe fe-trash"></i> Delete </a>
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade delete_modal" id="delete_modal_{{$knitting_received_lekra_brand->id}}" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="form-content p-2">
                                                    <h4 class="modal-title">Delete</h4>
                                                    <p class="mb-4">Are you sure want to delete?</p>
                                                    <button  name="{{$knitting_received_lekra_brand->id }}" type="button" class="btn btn-primary btn_delete">Delete </button>
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
                url:"/knittingReceivedLekraBrandDelete/"+id,
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