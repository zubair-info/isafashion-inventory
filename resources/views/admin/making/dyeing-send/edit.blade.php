@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Making Dyeing Send Edit Form</h3>
                {{-- <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul> --}}
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">
                    <div class="card-body">
                        <form action="{{route('KnittingDyeingUpdate')}}" method="POST">
                            @csrf

                            <input type="hidden" name="dyeing_id" class="form-control"  value="{{ $dyeing_send_id->id}}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                                <div class="col-lg-9">
                                    <input type="number" id="send_chalan_id" name="send_chalan_id" value="{{ $dyeing_send_id->send_chalan_id}}" class="form-control send_chalan_id" placeholder="Chalan Id : 11097" >
                                    <span style="color:red"  class="send_chalan_id_error" id="send_chalan_id_error" ></span> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date</label>
                                <div class="col-lg-9">
                                    <input type="date"  id="date" name="date" class="form-control date"  value="{{ $dyeing_send_id->date}}">
                                    <span style="color:red" class="date_error" id="date_error" ></span>
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Company Name</label>
                                <div class="col-lg-9">                                  
                                    <select class="form-control company_id"  id="company_id" name="company_id">  
                                            <option value="">--Select Option--</option>  
                                            @foreach ($all_company_name as $company)    
                                            <option value="{{$company->id}}" {{ ( $company->id == $dyeing_send_id->company_id) ? 'selected' : '' }}>{{$company->company_name}}</option>  
                                        @endforeach
                                    </select>
                                    <span style="color:red"  class="company_id_error" id="company_id_error" ></span>
                                
                                </div>
                            </div>
                           
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Knitting Recived</button>
                            </div>
                        </form>
                    </div>               
           
            </div>
        </div>
    </div>
    
    
</div>		
    
@endsection

@section('footer_script')
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select2_search').select2();
    });

</script>
    
@endsection
