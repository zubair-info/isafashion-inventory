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
                                <label class="col-lg-3 col-form-label">Name of Suta</label>
                                <div class="col-lg-9">
                                    {{-- <input type="text" name="name_of_suta" class="form-control" value="{{ $knitting_send_id->name_of_suta}}"> --}}
                                    <select class="form-control"  name="name_of_suta">  
                                        <option>--Select Option--</option>  
                                        @foreach ($all_suta_name as $suta)    
                                            <option value="{{$suta->id}}" {{ ( $suta->id == $knitting_send_id->name_of_suta) ? 'selected' : '' }}>{{$suta->suta_name}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Brand</label>
                                <div class="col-lg-9">
                                    <select class="form-control"  name="brand">  
                                        <option>--Select Option--</option>  
                                        @foreach ($all_brand_name as $brand)    
                                            <option value="{{$brand->id}}" {{ ( $brand->id == $knitting_send_id->brand) ? 'selected' : '' }}>{{$brand->brand_name}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Kapor</label>
                                <div class="col-lg-9">
                                    <select class="form-control"  name="kapor">  
                                        <option>--Select Option--</option>  
                                        @foreach ($all_kapor_name as $kapor)    
                                            <option value="{{$kapor->id}}" {{ ( $kapor->id == $knitting_send_id->kapor) ? 'selected' : '' }}>{{$kapor->kapor_name}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Weight</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="weight"  value="{{ $knitting_send_id->weight}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Cartoon</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="cartoon" value="{{ $knitting_send_id->cartoon}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Rate</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="rate" value="{{ $knitting_send_id->rate}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Lekra Brand</label>
                               
                                <div class="col-lg-9">
                                    <select class="form-control"  name="lekra_brand">  
                                        <option>--Select Option--</option>  
                                        @foreach ($all_lekra_brand_name as $lekra_brand)
                                            <option value="{{$lekra_brand->id}}" {{ ( $lekra_brand->id == $knitting_send_id->lekra_brand) ? 'selected' : '' }}>{{$lekra_brand->lekra_brand_name}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Lekra Cartoon</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="lekra_cartoon" value="{{ $knitting_send_id->lekra_cartoon}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Lekra Rate</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="lekra_rate"  value="{{ $knitting_send_id->lekra_rate}}" >
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
