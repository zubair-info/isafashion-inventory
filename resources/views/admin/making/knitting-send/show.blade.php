@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Knitting Send Show!</h3>
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
                        <h4 class="card-title">Making Knitting Send List</h4>
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
                                        <th>Chalan Id</th>
                                        <th>Date</th>
                                        <th>Name of Suta</th>
                                        <th>Brand</th>
                                        <th>Kapor</th>
                                        <th>Weight</th>
                                        <th>Cartoon</th>
                                        <th>Rate</th>
                                        <th>Lekra Brand</th>
                                        <th>Lekra Cartoon</th>
                                        <th>Lekra Rate</th>
                                        <th>Company Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                @foreach ($all_knitting_send as $key=>$knitting_send)                                 
                            
                                    <tbody>
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$knitting_send->send_chalan_id}}</td>
                                            <td>{{$knitting_send->date}}</td>
                                            <td>{{$knitting_send->rel_to_suta->suta_name}}</td>
                                            <td>
                                                {{$knitting_send->rel_to_brand->brand_name}}
                                            </td>
                                            <td> {{$knitting_send->rel_to_kapor->kapor_name}}</td>
                                            <td>{{$knitting_send->weight}}</td>
                                            <td>{{$knitting_send->cartoon}}</td>
                                            <td>{{$knitting_send->rate}}</td>
                                            <td>{{$knitting_send->lekra_brand}}</td>
                                            <td>{{$knitting_send->lekra_cartoon}}</td>
                                            <td>{{$knitting_send->lekra_rate}}</td>
                                            <td>
                                                {{$knitting_send->rel_to_company->company_name}}
                                            </td>
                                            <td class="text-left">                                              
                                                <div class="actions">
                                                    <a  class="btn btn-sm bg-danger-light"href="{{route('KnittingSendEdit',$knitting_send->id)}}">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a  class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal_{{$knitting_send->id}}">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                       
                                                </div>                                            
                                            </td>                                      
                                            <!-- Delete Modal -->
                                                <div class="modal fade delete_modal" id="delete_modal_{{$knitting_send->id}}" aria-hidden="true" role="dialog">
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
                                                                    <button  name="{{$knitting_send->id }}" type="button" class="btn btn-primary btn_delete">Delete </button>
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
                    url:"/knittingSendDelete/"+id,
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