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
                        <form action="{{route('knittingRecivedMultipleUpdate')}}" method="POST">
                            @csrf
                            <input type="hidden" name="knitting_received_multiple_id" class="form-control"  value="{{ $all_knitting_received_multiple->id}}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Received Chalan Id</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control received_chalan_id" name="received_chalan_id" placeholder="Received Chalan Id : 11048" value="{{ $all_knitting_received_multiple->received_chalan_id}}">
                                    <span style="color:red" class="received_chalan_id_error" id="received_chalan_id_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Name of Suta</label>
                                <div class="col-lg-9">
                                    <select class="form-control suta_id"  name="suta_id"  id="suta_id">  
                                        <option value="">--Select Option--</option>  
                                        @foreach ($all_suta_name as $suta)    
                                            <option value="{{$suta->id}}" {{ ( $suta->id == $all_knitting_received_multiple->suta_id) ? 'selected' : '' }}>{{$suta->suta_name}}</option>  
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
                                            <option value="{{$brand->id}}" {{ ( $brand->id == $all_knitting_received_multiple->brand_id) ? 'selected' : '' }}>{{$brand->brand_name}}</option>  
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
                                            <option value="{{$kapor->id}}" {{ ( $kapor->id == $all_knitting_received_multiple->kapor_id) ? 'selected' : '' }}>{{$kapor->kapor_name}}</option>  
                                        @endforeach
                                    </select>
                                    <span style="color:red" class="kapor_id_error"  id="kapor_id_error" ></span> 
                                </div>
                            </div> 
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Body</label>
                                <div class="col-lg-9">
                                    <input type="number"  value="{{ $all_knitting_received_multiple->body}}" step=0.001 class="form-control body" name="body" placeholder="Enter Body : 254.4">
                                    <span style="color:red" class="body_error" id="body_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Rib</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control rib" value="{{ $all_knitting_received_multiple->rib}}" name="rib" step=0.001  placeholder="Enter Rib : 148">
                                    <span style="color:red"  id="rib_error" class="rib_error"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Color</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control color" value="{{ $all_knitting_received_multiple->color}}" name="color" placeholder="Enter Color : Kerela"  >
                                    <span style="color:red" class="color_error"  id="color_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Roll</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control roll" value="{{ $all_knitting_received_multiple->roll}}" name="roll" step=0.001   placeholder="Enter  Roll : 10" >
                                    <span style="color:red" class="roll_error"  id="roll_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Total</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control total" value="{{ $all_knitting_received_multiple->total}}" name="total" step=0.001  placeholder="Enter Total : 27.36">
                                    <span style="color:red" class="total_error"  id="total_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Total Used Lekra</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control total_used_lekra" value="{{ $all_knitting_received_multiple->total_used_lekra}}" name="total_used_lekra" placeholder="Enter Total Used Lekra : 27.36">
                                    <span style="color:red"  class="total_used_lekra_error" id="total_used_lekra_error" ></span>
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
