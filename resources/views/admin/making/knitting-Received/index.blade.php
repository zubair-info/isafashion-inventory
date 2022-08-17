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
                        <form action="{{route('KnittingRecivedStore')}}" method="post" >
                            @csrf
                            <div class="form_knitting_received_step_one" id="form_knitting_received_step_one">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                                    <div class="col-lg-9">
                                        
                                        <select class="form-control select2_search send_chalan_id" id="send_chalan_id"  name="send_chalan_id">  
                                            <option value="">--Select Option--</option>  
                                            @foreach ($all_send_chalan_id as $send_chalan_id)    
                                                <option value="{{$send_chalan_id->send_chalan_id}}">{{$send_chalan_id->send_chalan_id}}</option>  
                                            @endforeach
                                        </select>
                                        <span style="color:red" class="send_chalan_id_error"  id="send_chalan_id_error" ></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Date</label>
                                    <div class="col-lg-9">
                                        <input type="date"  name="date" class="form-control date">
                                        <span style="color:red"  class="date_error" id="date_error" ></span>
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
                                            <input type="number" class="form-control received_chalan_id" name="received_chalan_id[]" placeholder="Received Chalan Id : 11048">
                                            <span style="color:red" class="received_chalan_id_error" id="received_chalan_id_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Name of Suta</label>
                                        <div class="col-lg-9">
                                            {{-- <input type="text" name="name_of_suta" class="form-control"> --}}
                                            <select class="form-control suta_id"  name="suta_id[]">  
                                                <option value="">--Select Option--</option>  
                                                @foreach ($all_suta_name as $suta)    
                                                    <option value="{{$suta->id}}">{{$suta->suta_name}}</option>  
                                                @endforeach
                                            </select>
                                            <span style="color:red"  class="suta_id_error" id="suta_id_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Brand</label>
                                        <div class="col-lg-9">
                                           
                                            <select class="form-control brand_id"  name="brand_id[]">  
                                                <option  value="">--Select Option--</option>  
                                                @foreach ($all_brand_name as $brand)    
                                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>  
                                                @endforeach
                                            </select>
                                            <span style="color:red"  class="brand_id_error" id="brand_id_error" ></span>
                                        </div>
                                           
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Kapor</label>
                                        <div class="col-lg-9">
                                            <select class="form-control kapor_id"  name="kapor_id[]">  
                                                <option  value="">--Select Option--</option>  
                                                @foreach ($all_kapor_name as $kapor)    
                                                    <option value="{{$kapor->id}}">{{$kapor->kapor_name}}</option>  
                                                @endforeach
                                            </select>
                                            <span style="color:red"  class="kapor_id_error" id="kapor_id_error" ></span>
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
                                        <label class="col-lg-3 col-form-label">Total</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control total" name="total[]" step=0.001  placeholder="Enter Total : 27.36">
                                            <span style="color:red" class="total_error"  id="total_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Total Used Lekra</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control total_used_lekra" name="total_used_lekra[]" placeholder="Enter Total Used Lekra : 27.36">
                                            <span style="color:red"  class="total_used_lekra_error" id="total_used_lekra_error" ></span>
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
            // alert(send_chalan_id);
            if(send_chalan_id==''){
                $(".send_chalan_id_error").text('Please enter your Send Chalan Id');
                $(".send_chalan_id").css('border','1px solid red');
                $(".send_chalan_id").focus();

            }else if(date==''){
                $(".date_error").text('Please enter your date');
                $(".date").css('border','1px solid red');
                $(".date").focus();

            }else{
                $(".send_chalan_id_error").text('');
                $(".send_chalan_id").css('border','1px solid green');
                $(".send_chalan_id").focus();
                $(".date_error").text('');
                $(".date").css('border','1px solid green');
                $(".date").focus();

                $('#form_knitting_received_step_one').hide();
                $('#form_knitting_received_step_two').show();
                $('#step_2').addClass('active');

            }
           

        });
        $( "#knitting_received_step_two").click(function() {

            var received_chalan_id = $('.received_chalan_id').val();
            // alert(received_chalan_id);
            var suta_id = $('.suta_id').val();
            // alert(suta_id);
            // alert('ok');
            var brand_id = $('.brand_id').val();
            var kapor_id = $('.kapor_id').val();
            var body = $('.body').val();
            var rib = $('.rib').val();
            var color = $('.color').val();
            var roll = $('.roll').val();
            var total = $('.total').val();
            var total_used_lekra = $('.total_used_lekra').val();
            // alert(suta_id);
            if(received_chalan_id==''){
                $(".received_chalan_id_error").text('Please enter your chalan Id');
                $(".received_chalan_id").css('border','1px solid red');
                $(".received_chalan_id").focus();

            }else if(suta_id==''){
                // alert('ok');
                $(".suta_id_error").text('Please enter your suta Id');
                $(".suta_id").css('border','1px solid red');
                $(".suta_id").focus();

            }
            else if(brand_id==''){
                $(".brand_id_error").text('Please enter your brand Id');
                $(".brand_id").css('border','1px solid red');
                $(".brand_id").focus();

            }else if(kapor_id==''){
                $(".kapor_id_error").text('Please enter your kapor Id');
                $(".kapor_id").css('border','1px solid red');
                $(".kapor_id").focus();

            }else if(body==''){
                $(".body_error").text('Please enter your weight Id');
                $(".body").css('border','1px solid red');
                $(".body").focus();

            }else if(rib==''){
                $(".rib_error").text('Please enter your cartoon Id');
                $(".rib").css('border','1px solid red');
                $(".rib").focus();

            }else if(color==''){
                $(".color_error").text('Please enter your rate Id');
                $(".color").css('border','1px solid red');
                $(".color").focus();

            }else if(roll==''){
                $(".roll_error").text('Please enter your rate Id');
                $(".roll").css('border','1px solid red');
                $(".roll").focus();

            }else if(total==''){
                $(".total_error").text('Please enter your rate Id');
                $(".total").css('border','1px solid red');
                $(".total").focus();

            }else if(total_used_lekra==''){
                $(".total_used_lekra_error").text('Please enter your used lekra Id');
                $(".total_used_lekra").css('border','1px solid red');
                $(".total_used_lekra").focus();
            }
            else{
                $(".received_chalan_id_error").text('');
                $(".received_chalan_id").css('border','1px solid green');
                $(".received_chalan_id").focus();
                $(".suta_id_error").text('');
                $(".suta_id").css('border','1px solid green');
                $(".suta_id").focus();
                $(".brand_id_error").text('');
                $(".brand_id").css('border','1px solid green');
                $(".brand_id").focus();
                $(".kapor_id_error").text('');
                $(".kapor_id").css('border','1px solid green');
                $(".kapor_id").focus();
                $(".body_error").text('');
                $(".body").css('border','1px solid green');
                $(".body").focus();
                $(".rib_error").text('');
                $(".rib").css('border','1px solid green');
                $(".rib").focus();
                $(".color_error").text('');
                $(".color").css('border','1px solid green');
                $(".color").focus();
                $(".roll_error").text('');
                $(".roll").css('border','1px solid green');
                $(".roll").focus();

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
                                        <label class="col-lg-3 col-form-label">Received Chalan Id</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control received_chalan_id" name="received_chalan_id[]" placeholder="Received Chalan Id : 11048">
                                            <span style="color:red" class="received_chalan_id_error" id="received_chalan_id_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Name of Suta</label>
                                        <div class="col-lg-9">
                                            {{-- <input type="text" name="name_of_suta" class="form-control"> --}}
                                            <select class="form-control suta_id"  name="suta_id[]">  
                                                <option value="">--Select Option--</option>  
                                                @foreach ($all_suta_name as $suta)    
                                                    <option value="{{$suta->id}}">{{$suta->suta_name}}</option>  
                                                @endforeach
                                            </select>
                                            <span style="color:red"  class="suta_id_error" id="suta_id_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Brand</label>
                                        <div class="col-lg-9">
                                           
                                            <select class="form-control brand_id"  name="brand_id[]">  
                                                <option  value="">--Select Option--</option>  
                                                @foreach ($all_brand_name as $brand)    
                                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>  
                                                @endforeach
                                            </select>
                                            <span style="color:red"  class="brand_id_error" id="brand_id_error" ></span>
                                        </div>
                                           
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Kapor</label>
                                        <div class="col-lg-9">
                                            <select class="form-control kapor_id"  name="kapor_id[]">  
                                                <option  value="">--Select Option--</option>  
                                                @foreach ($all_kapor_name as $kapor)    
                                                    <option value="{{$kapor->id}}">{{$kapor->kapor_name}}</option>  
                                                @endforeach
                                            </select>
                                            <span style="color:red"  class="kapor_id_error" id="kapor_id_error" ></span>
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
                                        <label class="col-lg-3 col-form-label">Total</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control total" name="total[]" step=0.001  placeholder="Enter Total : 27.36">
                                            <span style="color:red" class="total_error"  id="total_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Total Used Lekra</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control total_used_lekra" name="total_used_lekra[]" placeholder="Enter Total Used Lekra : 27.36">
                                            <span style="color:red"  class="total_used_lekra_error" id="total_used_lekra_error" ></span>
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