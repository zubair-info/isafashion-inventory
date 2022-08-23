@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Markat Multiple Send Edit Form</h3>

            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{route('markatSendMultipleUpdate')}}" method="POST">
                            @csrf
                            <input type="hidden" name="markat_send_multiple_id" class="form-control"  value="{{ $all_markat_multiple_send->id}}">
                            <input type="hidden" name="markat_send_id" class="form-control"  value="{{ $all_markat_multiple_send->markat_send_id}}">

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                                <div class="col-lg-9">
                                    <input type="number" value="{{ $all_markat_multiple_send->send_chalan_id}}" class="form-control send_chalan_id" name="send_chalan_id" placeholder="Send Chalan Id : 11048">
                                    <span style="color:red" class="send_chalan_id_error" id="send_chalan_id_error" ></span>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date</label>
                                <div class="col-lg-9">
                                    <input type="date" value="{{ $all_markat_multiple_send->date}}" name="date" class="form-control date">
                                    <span style="color:red"  class="date_error" id="date_error" ></span>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Style</label>
                                <div class="col-lg-9">
                                    <input type="number" value="{{ $all_markat_multiple_send->style}}" class="form-control style" name="style" step="any"  placeholder="Enter Style : 148">
                                    <span style="color:red"  id="style_error" class="style_error"></span>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Lot No</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control lot_no" value="{{ $all_markat_multiple_send->lot_no}}" name="lot_no" step="any" placeholder="Enter  Lot No : 10" >
                                    <span style="color:red" class="lot_no_error"  id="lot_no_error" ></span>
                                </div>
                            </div>
                                                                                 
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Body</label>
                                <div class="col-lg-9">
                                    <input type="number" step="any"class="form-control body" value="{{ $all_markat_multiple_send->body}}" name="body" placeholder="Enter Body : 254.4">
                                    <span style="color:red" class="body_error" id="body_error" ></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Balance</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control balance" value="{{ $all_markat_multiple_send->balance}}" name="balance" step="any" placeholder="Enter Balance : 148">
                                    <span style="color:red"  id="balance_error"  class="balance_error"></span>
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
