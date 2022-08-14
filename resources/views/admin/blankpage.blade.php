@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Welcome Admin!</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-3 col-sm-6 col-4">
            <div class="card">
                <div class="card-title">
                    <h4>Student Registration Form</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('KnittingSendStore')}}"method="post" >
                        @csrf
                        <div class="form_step_one" id="form_step_one">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                                <div class="col-lg-9">
                                    <input type="number" name="send_chalan_id" class="form-control" placeholder="Chalan Id : 11097">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date</label>
                                <div class="col-lg-9">
                                    <input type="date"  name="date" class="form-control date">
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Company Name</label>
                                <div class="col-lg-9">                                  
                                    <select class="form-control"  name="send_company_name">  
                                            <option>--Select Option--</option>  
                                        @foreach ($all_company_name as $company)    
                                            <option value="{{$company->id}}">{{$company->company_name}}</option>  
                                        @endforeach
                                    </select>
                                
                                </div>
                            </div>
                            
                               
                            <div class="text-right">
                                <button id="step_one" type="button" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                                    
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
    
</div>		
    
@endsection