@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Marakt Received Edit Form</h3>

            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">

                    <div class="card-body">
                        <form action="{{route('markatRecivedUpdate')}}" method="POST">
                            @csrf

                            <input type="hidden" name="markat_received_id" class="form-control"  value="{{ $all_markat_received->id}}">

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Chalan Id</label>
                                <div class="col-lg-9">
                                    <input type="text" name="received_chalan_id" class="form-control"  value="{{ $all_markat_received->received_chalan_id}}">
                                </div>
                            </div>
                       
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Company Name</label>
                                <div class="col-lg-9">
                                    <select class="form-control company_id"  name="company_id">  
                                        <option>--Select Option--</option>  
                                    @foreach ($all_company_name as $company)    
                                        <option value="{{$company->id}}" {{ ( $company->id == $all_markat_received->company_id) ? 'selected' : '' }}>{{$company->company_name}}</option>  
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date</label>
                                <div class="col-lg-9">
                                    <input type="date"  name="date" class="form-control date"   value="{{ $all_markat_received->date}}">
                                </div>
                            </div>
                           
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Marakt Recived</button>
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
