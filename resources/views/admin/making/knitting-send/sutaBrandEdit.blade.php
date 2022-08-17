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
                    <div class="card-body">
                        <form action="{{route('sutaBrandUpdate')}}" method="POST">
                            @csrf
                            <input type="hidden" name="suta_brand_id" class="form-control"  value="{{ $all_suta_brand_id->id}}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Name of Suta</label>
                                <div class="col-lg-9">
                                    <select class="form-control suta_id"  name="suta_id"  id="suta_id">  
                                        <option value="">--Select Option--</option>  
                                        @foreach ($all_suta_name as $suta)    
                                            <option value="{{$suta->id}}" {{ ( $suta->id == $all_suta_brand_id->suta_id) ? 'selected' : '' }}>{{$suta->suta_name}}</option>  
                                        @endforeach
                                    </select>
                                    <span style="color:red"  class="suta_id_error" id="suta_id_error" ></span> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Brand</label>
                                <div class="col-lg-9">
                                
                                    <select class="form-control brand_id" id="brand_id"  name="brand_id">  
                                        <option  value="">--Select Option--</option>  
                                        @foreach ($all_brand_name as $brand)    
                                            <option value="{{$brand->id}}" {{ ( $brand->id == $all_suta_brand_id->brand_id) ? 'selected' : '' }}>{{$brand->brand_name}}</option>  
                                        @endforeach
                                    </select>
                                    <span style="color:red"  id="brand_id_error" class="brand_id_error" ></span> 
                                </div>
                                
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Kapor</label>
                                <div class="col-lg-9">
                                    <select class="form-control kapor_id"  name="kapor_id" id="kapor_id">  
                                        <option  value="">--Select Option--</option>  
                                        @foreach ($all_kapor_name as $kapor)    
                                            <option value="{{$kapor->id}}" {{ ( $kapor->id == $all_suta_brand_id->kapor_id) ? 'selected' : '' }}>{{$kapor->kapor_name}}</option>  
                                        @endforeach
                                    </select>
                                    <span style="color:red" class="kapor_id_error"  id="kapor_id_error" ></span> 
                                </div>
                            </div> 
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Weight</label>
                                <div class="col-lg-9">
                                    <input type="number" step="0.0000001" class="form-control weight" id="weight" name="weight" placeholder="Enter Weight : 50" value="{{ $all_suta_brand_id->weight}}">
                                    <span style="color:red"  id="weight_error" class="weight_error" ></span> 
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Cartoon</label>
                                <div class="col-lg-9">
                                    <input type="number" step="0.0000001" class="form-control cartoon" id="cartoon" name="cartoon" placeholder="Enter Carton : 20"  value="{{ $all_suta_brand_id->cartoon}}">
                                    <span style="color:red"  id="cartoon_error" class="cartoon_error"></span> 
                                </div>
                            
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Rate</label>
                                <div class="col-lg-9">
                                    <input type="number" step="0.0000001" class="form-control rate" id="rate" name="rate" placeholder="Enter Rate : 148" value="{{ $all_suta_brand_id->rate}}" >
                                    <span style="color:red"  id="rate_error" class="rate_error" ></span> 
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
