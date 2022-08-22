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
        <div class="col-xl-10 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">

                    
                    <table class="table" style="width:100%">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>Suta Name</th>
                            <th>Brand</th>
                            <th>Kapor</th>
                            <th>Weight</th>
                            <th>Carton</th>
                            <th>Rate</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        {{-- {{dd($all_suta_brand)}} --}}
            
                        @foreach ($all_suta_brand as $key=>$suta_brand)   
                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$suta_brand->rel_to_suta->suta_name}}</td>
                                    <td>{{$suta_brand->rel_to_brand->brand_name}}</td>
                                    <td>{{$suta_brand->rel_to_kapor->kapor_name}}</td>
                                    <td>{{$suta_brand->weight}}</td>
                                    <td>{{$suta_brand->cartoon}}</td>
                                    <td>{{$suta_brand->rate}}</td>
                                    <td>
                                        <a  class="btn btn-sm bg-warning-light"href="{{route('SutaBrandEdit',$suta_brand->id)}}">
                                        <i class="fe fe-pencil"></i> Edit
                                         </a>
                                        <a  class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal_{{$suta_brand->id}}">
                                            <i class="fe fe-trash"></i> Delete
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade delete_modal" id="delete_modal_{{$suta_brand->id}}" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="form-content p-2">
                                                    <h4 class="modal-title">Delete</h4>
                                                    <p class="mb-4">Are you sure want to delete?</p>
                                                    <button  name="{{$suta_brand->id }}" type="button" class="btn btn-primary btn_delete">Delete </button>
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
                    <table class="table" style="width:100%;margin-top:20px;">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>Lekra Name</th>
                            <th>Lekra Cartoon</th>
                            <th>Lekra Rate</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        {{-- {{dd($all_suta_brand)}} --}}
            
                          @foreach ($all_lekra_brand as $key=>$lekra_brand)   
                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$lekra_brand->rel_to_lekra_brand->lekra_brand_name}}</td>
                                    <td>{{$lekra_brand->lekra_cartoon}}</td>
                                    <td>{{$lekra_brand->lekra_rate}}</td>
                                    <td>
                                        <a  class="btn btn-sm bg-warning-light"href="{{route('lekraBrandEdit',$lekra_brand->id)}}">
                                        <i class="fe fe-pencil"></i> Edit
                                         </a>
                                        <a  class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal_{{$lekra_brand->id}}">
                                            <i class="fe fe-trash"></i> Delete
                                    </td>
                                </tr>  
                                  <!-- Delete Modal -->
                                <div class="modal fade delete_modal" id="delete_modal_{{$lekra_brand->id}}" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="form-content p-2">
                                                    <h4 class="modal-title">Delete</h4>
                                                    <p class="mb-4">Are you sure want to delete?</p>
                                                    <button  name="{{$lekra_brand->id }}" type="button" class="btn btn-primary btn_delete">Delete </button>
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
                url:"/knittingSendSutaBrandDelete/"+id,
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
                    toastr.error(data.success);
                    window.location.reload();

                }
            });
        });
    });
</script>
    
@endsection