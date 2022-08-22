@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">				
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title text-center">Cutting Received Form</h3>
                {{-- <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul> --}}
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-8 col-sm-12 col-12 m-auto">
            <div class="card form_tab">
                <div class="card-body">
                    <div class="form_tab_step" id="step_1">                    
                        <div class="step active">
                            <span class="icon">1</span>                                   
                        </div>
                        <div class="step " id="step_2">                       
                            <span class="icon">2</span>                        
                        </div>            
                    </div>              
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-sm-12 col-12 m-auto">
            <div class="card">
                {{-- {{$knetting_received_chalan_id}} --}}
                    <div class="card-body">
                        <form action="{{route('cuttingReceivedStore')}}" method="post" >
                            @csrf
                            <div class="form_cutting_received_step_one" id="form_cutting_received_step_one">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                                    <div class="col-lg-9">                                  
                                        <select class="form-control select2_search send_chalan_id"  id="send_chalan_id" name="send_chalan_id">  
                                                <option value="">--Select Option--</option>  
                                            @foreach ($cutting_send_chalan_id as $send_chalan_id)    
                                                <option value="{{$send_chalan_id->send_chalan_id}}">{{$send_chalan_id->send_chalan_id}}</option>  
                                            @endforeach
                                        </select>
                                        <span style="color:red"  class="send_chalan_id_error" id="send_chalan_id_error" ></span>
                                    
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Company Name</label>
                                    <div class="col-lg-9">                                  
                                        <select class="form-control company_id"  id="company_id" name="company_id">  
                                                <option value="">--Select Option--</option>  
                                            @foreach ($all_company_name as $company)    
                                                <option value="{{$company->id}}">{{$company->company_name}}</option>  
                                            @endforeach
                                        </select>
                                        <span style="color:red" class="company_id_error"  id="company_id_error" ></span>
                                    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Date</label>
                                    <div class="col-lg-9">
                                        <input type="date"  id="date" name="date" class="form-control date">
                                        <span style="color:red" class="date_error" id="date_error" ></span>
                                    </div>
                                </div>
                                
                                <div class="text-right">
                                    <button id="cutting_received_step_one" type="button" class="btn btn-primary">Next <i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>

                            <div class="form_cutting_received_step_two" id="form_cutting_received_step_two" style="display: none">

                                <div class="form_create" id="form_create_1" form_count="1">
                                    <input type="hidden" name="form_count[]" value="1" class="form-control"> 
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Received Chalan Id</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control received_chalan_id" name="received_chalan_id[]" placeholder="Received Chalan Id : 11048">
                                            <span style="color:red" class="received_chalan_id_error" id="received_chalan_id_error" ></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Style</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control style" name="style[]"  step="any"   placeholder="Enter Style : 148">
                                            <span style="color:red"  id="style_error" class="style_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Lot No</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control lot_no" name="lot_no[]" step="any"   placeholder="Enter  Lot No : 10" >
                                            <span style="color:red" class="lot_no_error"  id="lot_no_error" ></span>
                                        </div>
                                    </div>
                                                                                         
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Body</label>
                                        <div class="col-lg-9">
                                            <input type="number"   step="any"  class="form-control body" name="body[]" placeholder="Enter Body : 254.4">
                                            <span style="color:red" class="body_error" id="body_error" ></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Balance</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control balance" name="balance[]"  step="any"   placeholder="Enter Rib : 148">
                                            <span style="color:red"  id="balance_error" class="balance_error"></span>
                                        </div>
                                    </div>

                                                       
                                </div>
                                
                                <div id="knitting_received_form"></div>

                                <button type="button" style="float: right;margin-bottom:8px;" id="form_create_btn"  onclick="return add();" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                                {{-- <button type="button" style="float: right;margin-bottom:8px;" id="form_create_btn"  onSubmit='return add();' class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</button> --}}
                               
                                <div class="row" style="margin-top:100px;">
                                    <div class="col-md-6 col-6">
                                        <button id="back_step_2" type="button" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                                    </div>
                                    <div class="col-md-6 col-6" style="display: flex;justify-content: flex-end;">
                                        <button type="button" id="cutting_received_step_two"  class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
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
     $(document).ready(function() {
      
        $( "#cutting_received_step_one").click(function() {
           
            var send_chalan_id = $('.send_chalan_id').val();
            var date = $('.date').val();
            var company_id = $('.company_id').val();
            // alert(company_id);
            if(send_chalan_id==''){
                $(".send_chalan_id_error").text('Please enter your send chalan Id');
                $(".send_chalan_id").css('border','1px solid red');
                $(".send_chalan_id").focus();

            } else if(company_id==''){
                $(".company_id_error").text('Please enter your company name');
                $(".company_id").css('border','1px solid red');
                $(".company_id").focus();

            }
            else if(date==''){
                $(".date_error").text('Please enter your date');
                $(".date").css('border','1px solid red');
                $(".date").focus();

            }
           
            else{
                $(".send_chalan_id_error").text('');
                $(".send_chalan_id").css('border','1px solid green');
                $(".send_chalan_id").focus();
                $(".date_error").text('');
                $(".date").css('border','1px solid green');
                $(".date").focus();
                $(".company_id_error").text('');
                $(".company_id").css('border','1px solid green');
                $(".company_id").focus();

                $('#form_cutting_received_step_one').hide();
                $('#form_cutting_received_step_two').show();
                $('#step_2').addClass('active');

            }
           

        });
        $( "#cutting_received_step_two").click(function() {

            var received_chalan_id = $('.received_chalan_id').val();
            // var date = $('.date').val();
            // var color = $('.color').val();
            var style = $('.style').val();
            var lot_no = $('.lot_no').val();
            var body = $('.body').val();
            var balance = $('.balance').val();
           
            if(received_chalan_id==''){
                $(".received_chalan_id_error").text('Please enter your chalan Id');
                $(".received_chalan_id").css('border','1px solid red');
                $(".received_chalan_id").focus();

            }
            // else if(date==''){
            //     $("#date_error").text('Please enter your date');
            //     $("#date").css('border','1px solid red');
            //     $("#date").focus();

            // }

            
            else if(style==''){
                $(".style_error").text('Please enter your style ');
                $(".style").css('border','1px solid red');
                $(".style").focus();

            }else if(lot_no==''){
                $(".lot_no_error").text('Please enter your lot no');
                $(".lot_no").css('border','1px solid red');
                $(".lot_no").focus();

            }
            else if(body==''){
                $(".body_error").text('Please enter your body');
                $(".body").css('border','1px solid red');
                $(".body").focus();

            }else if(balance==''){
                $(".balance_error").text('Please enter your balance');
                $(".balance").css('border','1px solid red');
                $(".balance").focus();

            }
            else{
                $(".received_chalan_id_error").text('');
                $(".received_chalan_id").css('border','1px solid green');
                $(".received_chalan_id").focus();

                $("#date_error").text('');
                $("#date").css('border','1px solid green');
                $("#date").focus();

                $(".style_error").text('');
                $(".style").css('border','1px solid green');
                $(".style").focus();


                $(".lot_no_error").text('');
                $(".lot_no").css('border','1px solid green');
                $(".lot_no").focus();
               
                $(".body_error").text('');
                $(".body").css('border','1px solid green');
                $(".body").focus();

                $(".balance_error").text('');
                $(".balance").css('border','1px solid green');
                $(".balance").focus();
               


                $('#cutting_received_step_two').attr( 'type','submit');

                $('#form_cutting_received_step_two').hide();
                $('#form_cutting_received_step_two').show();
            }

        });
        $( "#back_step_2").click(function() {
            $('#form_cutting_received_step_one').show();
            $('#form_cutting_received_step_two').hide();
            $('#step_2').removeClass('active');
            // $('#step_2').removeClass('active');
            // $('#step_2').addClass('');
        });
    
    });
    // `+count+`
    var count = 2;
    function add(){
        
        $('#knitting_received_form').append(`<div class="form_create" id="form_create_`+count+`" form_count="`+count+`">
            

            <input type="hidden" name="form_count[]" value=" `+count+`" class="form-control"> 
            <button type="button" class="btn btn-danger" onclick="form_remove(`+count+`)"><i class="fa fa-minus"></i> Remove</button>
            <div class="form_cutting_received_step_one" id="form_cutting_received_step_one">
                
               
                <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Received Chalan Id</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control received_chalan_id" name="received_chalan_id[]" placeholder="Received Chalan Id : 11048">
                                            <span style="color:red" class="received_chalan_id_error" id="received_chalan_id_error" ></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Style</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control style" name="style[]" step="any"   placeholder="Enter Style : 148">
                                            <span style="color:red"  id="style_error" class="style_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Lot No</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control lot_no" name="lot_no[]" step="any"   placeholder="Enter  Lot No : 10" >
                                            <span style="color:red" class="lot_no_error"  id="lot_no_error" ></span>
                                        </div>
                                    </div>
                                                                                         
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Body</label>
                                        <div class="col-lg-9">
                                            <input type="number"   step="any"  class="form-control body" name="body[]" placeholder="Enter Body : 254.4">
                                            <span style="color:red" class="body_error" id="body_error" ></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Balance</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control balance" name="balance[]"  step="any"   placeholder="Enter Rib : 148">
                                            <span style="color:red"  id="balance_error" class="balance_error"></span>
                                        </div>
                                    </div>
              
            </div>`);
        count++;
        // add_form();
      
    }

    // function testing_click(){
    //     var received_chalan_id = $('.received_chalan_id').val();
    //     alert(received_chalan_id);
    // }
    function form_remove(form_identity){
        $('#form_create_'+form_identity).remove();

    }

    
    
 </script>
    
@endsection