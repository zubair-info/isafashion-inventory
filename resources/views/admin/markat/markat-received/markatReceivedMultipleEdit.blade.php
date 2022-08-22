@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Markat Multiple Edit Form</h3>

            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{route('markatRecivedMultipleUpdate')}}" method="POST">
                            @csrf
                            <input type="hidden" name="markat_received_multiple_id" class="form-control"  value="{{ $all_markat_multiple_received->id}}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Kapor</label>
                                <div class="col-lg-9">
                                    <select class="form-control kapor_id"  name="kapor_id" id="kapor_id">  
                                        <option  value="">--Select Option--</option>  
                                        @foreach ($all_kapor_name as $kapor)    
                                            <option value="{{$kapor->id}}" {{ ( $kapor->id == $all_markat_multiple_received->kapor_id) ? 'selected' : '' }}>{{$kapor->kapor_name}}</option>  
                                        @endforeach
                                    </select>
                                    <span style="color:red" class="kapor_id_error"  id="kapor_id_error" ></span> 
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Rate</label>
                                <div class="col-lg-9">
                                    <input type="number" step="any" value="{{ $all_markat_multiple_received->rate}}" class="form-control rate" id="rate" name="rate" placeholder="Enter Rate : 148" >
                                    <span style="color:red"  id="rate_error" class="rate_error" ></span> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Roll</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control roll" name="roll" step="any"   placeholder="Enter  Roll : 10"  value="{{ $all_markat_multiple_received->roll}}"  >
                                    <span style="color:red" class="roll_error"  id="roll_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Body</label>
                                <div class="col-lg-9">
                                    <input type="number"   step="any"  class="form-control body" name="body" placeholder="Enter Body : 254.4"  value="{{ $all_markat_multiple_received->body}}" >
                                    <span style="color:red" class="body_error" id="body_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Balance</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control balance" name="balance"  step="any"   placeholder="Enter Rib : 148"  value="{{ $all_markat_multiple_received->balance}}" >
                                    <span style="color:red"  id="balance_error" class="balance_error"></span>
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
