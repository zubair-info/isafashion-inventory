@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Knitting received Show!</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Making Knitting received List</h4>
                        {{-- <p class="card-text">
                            This is the most basic example of the datatables with zero configuration. Use the <code>.datatable</code> class to initialize datatables.
                        </p> --}}
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Send Chalan Id</th>
                                        <th>Date</th>
                                        <th>Name of Suta</th>
                                        <th>Brand</th>
                                        <th>Kapor</th>
                                        <th>Received Chalan</th>
                                        <th>Body</th>
                                        <th>Rib</th>
                                        <th>Color</th>
                                        <th>Roll</th>
                                        <th>Total</th>
                                        <th>Total User Lekra</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                {{-- {{dd($all_knitting_received)}} --}}
                                @foreach ($all_knitting_received as $key=>$knitting_received)                                 
                            
                                    <tbody>
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$knitting_received->rel_to_send_chalan_id->send_chalan_id}}</td>
                                            <td>{{$knitting_received->date}}</td>
                                            <td>{{$knitting_received->rel_to_suta->suta_name}}</td>
                                            <td>
                                                {{$knitting_received->rel_to_brand->brand_name}}
                                            </td>
                                            <td> {{$knitting_received->rel_to_kapor->kapor_name}}</td>
                                            <td> {{$knitting_received->received_chalan_id}}</td>
                                            <td>{{$knitting_received->body}}</td>
                                            <td>{{$knitting_received->rib}}</td>
                                            <td>{{$knitting_received->color}}</td>
                                            <td>{{$knitting_received->roll}}</td>
                                            <td>{{$knitting_received->total}}</td>
                                            <td>{{$knitting_received->total_used_lekra}}</td>
                                            <td class="text-left">                                              
                                                <div class="actions">
                                                    <a  class="btn btn-sm bg-success-light" target="_blank"  href="{{route('KnittingRecivedView',$knitting_received->id)}}">
                                                        <i class="fe fe-eye"></i> View
                                                    </a>
                                                    <a  class="btn btn-sm bg-info-light"href="{{route('KnittingRecivedPDFDownload',$knitting_received->id)}}">
                                                        <i class="fa fa-download" aria-hidden="true"></i></i> Download
                                                    </a>
                                                    <a  class="btn btn-sm bg-warning-light"href="{{route('KnittingReceivedEdit',$knitting_received->id)}}">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
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
                    url:"/knittingreceivedDelete/"+id,
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