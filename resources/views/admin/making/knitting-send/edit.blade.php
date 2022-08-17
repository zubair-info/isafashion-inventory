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
        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Making Knitting Send Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('KnittingSendUpdate')}}" method="post">
                            @csrf

                            <input type="hidden" name="id" class="form-control"  value="{{ $knitting_send_id->id}}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                                <div class="col-lg-9">
                                    <input type="text" name="send_chalan_id" class="form-control"  value="{{ $knitting_send_id->send_chalan_id}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date</label>
                                <div class="col-lg-9">
                                    <input type="date"  name="date" value="{{ $knitting_send_id->date}}" class="form-control date">
                                </div>
                            </div>
                       
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Send Company Name</label>
                                <div class="col-lg-9">
                                    <select class="form-control"  name="send_company_name">  
                                        <option>--Select Option--</option>  
                                    @foreach ($all_company_name as $company)    
                                        <option value="{{$company->id}}" {{ ( $company->id == $knitting_send_id->send_company_name) ? 'selected' : '' }}>{{$company->company_name}}</option>  
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>               
                </div>
            </div>
        </div>
    </div>
    
    
</div>		
    
@endsection
