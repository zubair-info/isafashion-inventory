@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Cuting Send Multiple Edit Form</h3>

            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">

                    <div class="card-body">
                        <form action="{{route('cuttingSendMultipleUpdate')}}" method="POST">
                            @csrf

                            <input type="hidden" name="cutting_send_multiple_id" class="form-control"  value="{{ $all_cutting_multiple_send->id}}">

                          
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Roll</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control roll" value="{{ $all_cutting_multiple_send->roll}}" name="roll[]" step=0.001   placeholder="Enter  Roll : 10" >
                                    <span style="color:red" class="roll_error"  id="roll_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Balance</label>
                                <div class="col-lg-9">
                                    <input type="number" value="{{ $all_cutting_multiple_send->balance}}" class="form-control balance" name="balance[]" step=0.00001  placeholder="Enter Rib : 148">
                                    <span style="color:red"  id="balance_error" class="balance_error"></span>
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
