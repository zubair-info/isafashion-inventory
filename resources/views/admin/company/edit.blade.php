@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Edit Company Form</h3>

            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-4 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{route('companyUpdate')}}" method="post">
                            @csrf

                            <input type="hidden" name="id" class="form-control"  value="{{ $company->id}}">
                            
                            <div class="form-group row">
                                <label class="form-label">Company Name</label>
                                <input type="text" class="form-control" name="company_name">
                            </div>
                       
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Company</button>
                            </div>
                        </form>
                    </div>               
                </div>
            </div>
        </div>
    </div>
    
    
</div>		
    
@endsection
