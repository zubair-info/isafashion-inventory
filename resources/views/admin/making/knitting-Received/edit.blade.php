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
               
                    <div class="card-header">
                        <h4 class="card-title">Making Knitting Recived Edit Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('KnittingRecivedUpdate')}}" method="POST">
                            @csrf

                            <input type="hidden" name="id" class="form-control"  value="{{ $all_received_chalan_id->id}}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">received Chalan Id</label>
                                <div class="col-lg-9">                                                             
                                    <select class="form-control select2_search"  name="send_chalan_id">  
                                        <option>--Select Option--</option>  
                                        @foreach ($all_send_chalan_id as $send_chalan_id)    
                                            <option value="{{$send_chalan_id->id}}" {{ ( $send_chalan_id->id == $all_received_chalan_id->send_chalan_id) ? 'selected' : '' }}>{{$send_chalan_id->send_chalan_id}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date</label>
                                <div class="col-lg-9">
                                    <input type="date"  name="date" class="form-control date"   value="{{ $all_received_chalan_id->date}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Name of Suta</label>
                                <div class="col-lg-9">
                                    <select class="form-control"  name="suta_id"  value="{{$all_received_chalan_id->suta_id}}">  
                                        <option>--Select Option--</option>  
                                        @foreach ($all_suta_name as $suta)    
                                            <option value="{{$suta->id}}" {{ ( $suta->id == $all_received_chalan_id->suta_id) ? 'selected' : '' }}>{{$suta->suta_name}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Brand</label>
                                <div class="col-lg-9">
                                   
                                    <select class="form-control"  name="brand_id">  
                                        <option>--Select Option--</option>  
                                        @foreach ($all_brand_name as $brand)    
                                            <option value="{{$brand->id}}" {{ ( $brand->id == $all_received_chalan_id->brand_id) ? 'selected' : '' }}>{{$brand->brand_name}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                                   
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Kapor</label>
                                <div class="col-lg-9">
                                    <select class="form-control"  name="kapor_id">  
                                        <option>--Select Option--</option>  
                                        @foreach ($all_kapor_name as $kapor)    
                                            <option value="{{$kapor->id}}" {{ ( $kapor->id == $all_received_chalan_id->kapor_id) ? 'selected' : '' }}>{{$kapor->kapor_name}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Received Chalan Id</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control" name="received_chalan_id" placeholder="Received Chalan Id : 11048" value="{{$all_received_chalan_id->received_chalan_id}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Body</label>
                                <div class="col-lg-9">
                                    <input type="number"  step=0.001 class="form-control" name="body" placeholder="Enter Body : 254.4" value="{{$all_received_chalan_id->body}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Rib</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control" name="rib" step=0.001  placeholder="Enter Rib : 148" value="{{$all_received_chalan_id->rib}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Color</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="color" placeholder="Enter Color : Kerela" value="{{$all_received_chalan_id->color}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Roll</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control" name="roll" step=0.001   placeholder="Enter  Roll : 10" value="{{$all_received_chalan_id->roll}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Total</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control" name="total" step=0.001  placeholder="Enter Total : 27.36" value="{{$all_received_chalan_id->total}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Total Used Lekra</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="total_used_lekra" placeholder="Enter Total Used Lekra : 27.36" value="{{$all_received_chalan_id->total_used_lekra}}">
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
