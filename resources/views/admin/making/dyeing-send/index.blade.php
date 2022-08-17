@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">				
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title text-center">Making Knitting Received Form</h3>
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
                    <div class="card-body">
                        <form action="{{route('KnittingDayingSendStore')}}" method="post" >
                            @csrf
                            <div class="form_knitting_received_step_one" id="form_knitting_received_step_one">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                                    <div class="col-lg-9">
                                        <input type="number" id="send_chalan_id" name="send_chalan_id" class="form-control send_chalan_id" placeholder="Chalan Id : 11097">
                                        <span style="color:red"  class="send_chalan_id_error" id="send_chalan_id_error" ></span> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Date</label>
                                    <div class="col-lg-9">
                                        <input type="date"  id="date" name="date" class="form-control date">
                                        <span style="color:red" class="date_error" id="date_error" ></span>
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
                                        <span style="color:red"  class="company_id_error" id="company_id_error" ></span>
                                    
                                    </div>
                                </div>
                                
                                <div class="text-right">
                                    <button id="knitting_received_step_one" type="button" class="btn btn-primary">Next <i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>

                            <div class="form_knitting_received_step_two" id="form_knitting_received_step_two" style="display: none">

                                <div class="form_create" id="form_create_1" form_count="1">
                                    <input type="hidden" name="form_count[]" value="1" class="form-control"> 
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Received Chalan Id</label>
                                        <div class="col-lg-9">
                                            <select class="form-control received_chalan_id"  name="received_chalan_id[]"  id="received_chalan_id">  
                                                <option value="">--Select Option--</option>  
                                                @foreach ($knetting_received_chalan_id as $received_chalan_id)    
                                                    <option value="{{$received_chalan_id->received_chalan_id}}">{{$received_chalan_id->received_chalan_id}}</option>  
                                                @endforeach
                                            </select>
                                            <span style="color:red" class="received_chalan_id_error"> </span>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Color</label>
                                        <div class="col-lg-9">
                                            <select class="form-control color"  name="received_chalan_id[]"  id="received_chalan_id">  
                                                <option value="">--Select Option--</option>  
                                                @foreach ($knitting_received_colors as $knitting_received_color)    
                                                    <option value="{{$knitting_received_color->color}}">{{$knitting_received_color->color}}</option>  
                                                @endforeach
                                            </select>
                                            <span style="color:red" class="color_error"  id="color_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Roll</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control roll" name="roll[]" step=0.001   placeholder="Enter  Roll : 10" >
                                            <span style="color:red" class="roll_error"  id="roll_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Body</label>
                                        <div class="col-lg-9">
                                            <input type="number"  step=0.001 class="form-control body" name="body[]" placeholder="Enter Body : 254.4">
                                            <span style="color:red" class="body_error" id="body_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Rib</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control rib" name="rib[]" step=0.001  placeholder="Enter Rib : 148">
                                            <span style="color:red"  id="rib_error" class="rib_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Total</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control total" name="total[]" step=0.001  placeholder="Enter Total : 27.36">
                                            <span style="color:red" class="total_error"  id="total_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Lost Percentage</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control lost_percentage" name="lost_percentage[]" step=0.001  placeholder="Enter Total : 5">
                                            <span style="color:red" class="lost_percentage_error"  id="lost_percentage_error" ></span>
                                        </div>
                                    </div>
                                                       
                                </div>
                                
                                <div id="knitting_received_form"></div>

                                <button type="button" style="float: right;margin-bottom:8px;" id="form_create_btn"  onclick="add()" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                               
                                <div class="row" style="margin-top:100px;">
                                    <div class="col-md-6 col-6">
                                        <button id="back_step_2" type="button" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                                    </div>
                                    <div class="col-md-6 col-6" style="display: flex;justify-content: flex-end;">
                                        <button type="button" id="knitting_received_step_two"  class="btn btn-primary">Submit</button>
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
      
        $( "#knitting_received_step_one").click(function() {
           
            var send_chalan_id = $('.send_chalan_id').val();
            var date = $('.date').val();
            var company_id = $('.company_id').val();
            // alert(send_chalan_id);
            if(send_chalan_id==''){
                $(".send_chalan_id_error").text('Please enter your send chalan Id');
                $(".send_chalan_id").css('border','1px solid red');
                $(".send_chalan_id").focus();

            }
            else if(date==''){
                $(".date_error").text('Please enter your date');
                $(".date").css('border','1px solid red');
                $(".date").focus();

            }
            else if(company_id==''){
                $(".company_id_error").text('Please enter your company name');
                $(".company_id").css('border','1px solid red');
                $(".company_id").focus();

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

                $('#form_knitting_received_step_one').hide();
                $('#form_knitting_received_step_two').show();
                $('#step_2').addClass('active');

            }
           

        });
        $( "#knitting_received_step_two").click(function() {

            var received_chalan_id = $('.received_chalan_id').val();
            var body = $('.body').val();
            var rib = $('.rib').val();
            var color = $('.color').val();
            var roll = $('.roll').val();
            var total = $('.total').val();
            var lost_percentage = $('.lost_percentage').val();
            if(received_chalan_id==''){
                $(".received_chalan_id_error").text('Please enter your Received Chalan Id');
                $(".received_chalan_id").css('border','1px solid red');
                $(".received_chalan_id").focus();

            }
            else if(color==''){
                $(".color_error").text('Please enter your rate Id');
                $(".color").css('border','1px solid red');
                $(".color").focus();

            }else if(roll==''){
                $(".roll_error").text('Please enter your rate Id');
                $(".roll").css('border','1px solid red');
                $(".roll").focus();

            }else if(body==''){
                $(".body_error").text('Please enter your weight Id');
                $(".body").css('border','1px solid red');
                $(".body").focus();

            }else if(rib==''){
                $(".rib_error").text('Please enter your cartoon Id');
                $(".rib").css('border','1px solid red');
                $(".rib").focus();

            }else if(total==''){
                $(".total_error").text('Please enter your rate Id');
                $(".total").css('border','1px solid red');
                $(".total").focus();

            }else if(lost_percentage==''){
                $(".lost_percentage_error").text('Please enter your lost percentage');
                $(".lost_percentage").css('border','1px solid red');
                $(".lost_percentage").focus();
            }
            else{
                $(".color_error").text('');
                $(".color").css('border','1px solid green');
                $(".color").focus();
                $(".roll_error").text('');
                $(".roll").css('border','1px solid green');
                $(".roll").focus();
                $(".body_error").text('');
                $(".body").css('border','1px solid green');
                $(".body").focus();
                $(".rib_error").text('');
                $(".rib").css('border','1px solid green');
                $(".rib").focus();
                $(".total_error").text('');
                $(".total").css('border','1px solid green');
                $(".total").focus();
                $(".lost_percentage_error").text('');
                $(".lost_percentage").css('border','1px solid green');
                $(".lost_percentage").focus();

                $('#knitting_received_step_two').attr( 'type','submit');
                

                $('#form_knitting_received_step_one').hide();
                $('#form_knitting_received_step_two').show();


            }

        });
        $( "#back_step_2").click(function() {
            $('#form_knitting_received_step_one').show();
            $('#form_knitting_received_step_two').hide();
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
            <div class="form_knitting_received_step_one" id="form_knitting_received_step_one">
                <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Color</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control color" name="color[]" placeholder="Enter Color : Kerela"  >
                                            <span style="color:red" class="color_error"  id="color_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Roll</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control roll" name="roll[]" step=0.001   placeholder="Enter  Roll : 10" >
                                            <span style="color:red" class="roll_error"  id="roll_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Body</label>
                                        <div class="col-lg-9">
                                            <input type="number"  step=0.001 class="form-control body" name="body[]" placeholder="Enter Body : 254.4">
                                            <span style="color:red" class="body_error" id="body_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Rib</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control rib" name="rib[]" step=0.001  placeholder="Enter Rib : 148">
                                            <span style="color:red"  id="rib_error" class="rib_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Total</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control total" name="total[]" step=0.001  placeholder="Enter Total : 27.36">
                                            <span style="color:red" class="total_error"  id="total_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Lost Percentage</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control total" name="lost_percentage[]" step=0.001  placeholder="Enter Total : 5">
                                            <span style="color:red" class="lost_percentage_error"  id="lost_percentage_error" ></span>
                                        </div>
                                    </div>
                                        </div>`);
        count++;


    }
    function form_remove(form_identity){
        $('#form_create_'+form_identity).remove();

    }

    
 </script>
    
@endsection