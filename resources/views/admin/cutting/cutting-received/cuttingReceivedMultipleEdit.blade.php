@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Cutting Received Multiple Edit</h3>

            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{route('cuttingReceivedMultipleUpdate')}}" method="POST">
                            @csrf
                            <input type="hidden" name="cutting_received_multiple_id" class="form-control"  value="{{ $all_cutting_multiple_received->id}}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Received Chalan Id</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control received_chalan_id" value="{{ $all_cutting_multiple_received->received_chalan_id}}" name="received_chalan_id" placeholder="Received Chalan Id : 11048">
                                    <span style="color:red" class="received_chalan_id_error" id="received_chalan_id_error" ></span>
                                </div>
                            </div>
                            
                            {{-- <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date</label>
                                <div class="col-lg-9">
                                    <input type="date"  name="date" value="{{ $all_cutting_multiple_received->date}}" class="form-control date">
                                    <span style="color:red"  class="date_error" id="date_error" ></span>
                                </div>
                            </div> --}}

                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Style</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control style" value="{{ $all_cutting_multiple_received->style}}" name="style" step="any"  placeholder="Enter Style : 148">
                                    <span style="color:red"  id="style_error" class="style_error"></span>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Lot No</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control lot_no" value="{{ $all_cutting_multiple_received->lot_no}}" name="lot_no" step="any"   placeholder="Enter  Lot No : 10" >
                                    <span style="color:red" class="lot_no_error"  id="lot_no_error" ></span>
                                </div>
                            </div>
                                                                                 
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Body</label>
                                <div class="col-lg-9">
                                    <input type="number"  step="any" value="{{ $all_cutting_multiple_received->body}}" class="form-control body" name="body" placeholder="Enter Body : 254.4">
                                    <span style="color:red" class="body_error" id="body_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Balance</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control balance" value="{{ $all_cutting_multiple_received->balance}}" name="balance" step="any"  placeholder="Enter Rib : 148">
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

 