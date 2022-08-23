@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Markat Send Show</h3>
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
                                        <th>Received Chalan Id</th>
                                        <th>Company Name</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                  
                               @foreach ($all_markat_send as $key=>$markat_send)   
                                    <tbody>
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$markat_send->received_chalan_id	}}</td>
                                             <td>                                                
                                                 {{$markat_send->rel_to_company->company_name}} 
                                             </td>                                         
                                            <td class="text-left">                                              
                                                <div class="actions">
                                                    <a  class="btn btn-sm bg-success-light"  href="{{route('markatSendView',$markat_send->id)}}">
                                                        <i class="fe fe-eye"></i> View
                                                    </a>
                                                    <a  class="btn btn-sm bg-info-light" target="_blank" href="{{route('markatSendPDFView',$markat_send->id)}}">
                                                        <i class="fe fe-eye"></i> Invoice
                                                    </a>
                                                    <a  class="btn btn-sm bg-success-light"href="{{route('markatSendPDFDownload',$markat_send->id)}}">
                                                        <i class="fa fa-download" aria-hidden="true"></i></i> Download
                                                    </a>
                                                    <a  class="btn btn-sm bg-warning-light"href="{{route('MarketSendEdit',$markat_send->id)}}">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a  class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal_{{$markat_send->id}}">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                       
                                                </div>                                            
                                            </td>                                      
                                            <!-- Delete Modal -->
                                                <div class="modal fade delete_modal" id="delete_modal_{{$markat_send->id}}" aria-hidden="true" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="form-content p-2">
                                                                    <h4 class="modal-title">Delete</h4>
                                                                    <p class="mb-4">Are you sure want to delete?</p>
                                                                    <button  name="{{$markat_send->id }}" type="button" class="btn btn-primary btn_delete">Delete </button>
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
                // alert(id);
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url:"/marketSendDelete/"+id,
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