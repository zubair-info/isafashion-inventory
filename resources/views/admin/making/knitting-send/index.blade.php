@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">				
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title text-center">Making Knitting Send Form</h3>
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
                        <div class="step" id="step_3">
                            <span class="icon">3</span>
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
                        <form action="{{route('KnittingSendStore')}}" method="post" >
                            @csrf
                            <div class="form_step_one" id="form_step_one">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                                    <div class="col-lg-9">
                                        <input type="number" id="send_chalan_id" name="send_chalan_id" class="form-control" placeholder="Chalan Id : 11097">
                                        <span style="color:red"  class="send_chalan_id_error" id="send_chalan_id_error" ></span> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Date</label>
                                    <div class="col-lg-9">
                                        <input type="date"  id="date" name="date" class="form-control date">
                                        <span style="color:red"  id="date_error" ></span>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Company Name</label>
                                    <div class="col-lg-9">                                  
                                        <select class="form-control"  id="company_id" name="company_id">  
                                                <option value="">--Select Option--</option>  
                                            @foreach ($all_company_name as $company)    
                                                <option value="{{$company->id}}">{{$company->company_name}}</option>  
                                            @endforeach
                                        </select>
                                        <span style="color:red"  id="company_id_error" ></span>
                                    
                                    </div>
                                </div>
                                
                                   
                                <div class="text-right">
                                    <button id="step_one" type="button" class="btn btn-primary">Next <i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>

                            <div class="form_step_two" id="form_step_two" style="display: none">

                                
                                <div class="form_create" id="form_create_1" form_count="1">
                                    <input type="hidden" name="form_count[]" value="1" class="form-control"> 

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                                        <div class="col-lg-9">
                                            
                                            <select class="form-control select2_search  knitting_received_suta_chalan_id" id="knitting_received_suta_chalan_id"  name="knitting_received_suta_chalan_id[]" style="width: 100%;">  
                                                <option value="">--Select Option--</option>  
                                                @foreach ($all_knitting_received_suta_chalan_id as $knitting_received_suta_chalan_id)    
                                                    <option value="{{$knitting_received_suta_chalan_id->send_chalan_id}}">{{$knitting_received_suta_chalan_id->send_chalan_id}}</option>  
                                                @endforeach
                                            </select>
                                            <span style="color:red" class="knitting_received_suta_chalan_id_error"  id="knitting_received_suta_chalan_id_error" ></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Name of Suta</label>
                                        <div class="col-lg-9">
                                            <select class="form-control suta_id"  name="suta_id[]"  id="suta_id">  
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
                                        
                                            <select class="form-control brand_id" id="brand_id"  name="brand_id[]">  
                                                <option  value="">--Select Option--</option>  
                                                @foreach ($all_brand_name as $brand)    
                                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>  
                                                @endforeach
                                            </select>
                                            <span style="color:red"  id="brand_id_error" class="brand_id_error" ></span> 
                                        </div>
                                        
                                    </div>
        
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Kapor</label>
                                        <div class="col-lg-9">
                                            <select class="form-control kapor_id"  name="kapor_id[]" id="kapor_id">  
                                                <option  value="">--Select Option--</option>  
                                                @foreach ($all_kapor_name as $kapor)    
                                                    <option value="{{$kapor->id}}">{{$kapor->kapor_name}}</option>  
                                                @endforeach
                                            </select>
                                            <span style="color:red" class="kapor_id_error"  id="kapor_id_error" ></span> 
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Weight</label>
                                        <div class="col-lg-9">
                                            <input type="number" step="any" class="form-control weight" id="weight_1" name="weight[]" placeholder="Enter Weight : 50">
                                            <span style="color:red"  id="weight_error" class="weight_error" ></span> 
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Cartoon</label>
                                        <div class="col-lg-9">
                                            <input type="number" step="any" class="form-control cartoon" id="cartoon" name="cartoon[]" placeholder="Enter Carton : 20">
                                            <span style="color:red"  id="cartoon_error" class="cartoon_error"></span> 
                                        </div>
                                    
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Rate</label>
                                        <div class="col-lg-9">
                                            <input type="number" step="any" class="form-control rate" id="rate" name="rate[]" placeholder="Enter Rate : 148" >
                                            <span style="color:red"  id="rate_error" class="rate_error" ></span> 
                                        </div>
                                    </div>                        
                                </div>
                                
                                <div id="new_brand_form">
                                    
                                </div>

                                <button type="button" style="float: right;margin-bottom:8px;" id="form_create_btn"  onclick="add()" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                               
                                <div class="row" style="margin-top:100px;">
                                    <div class="col-md-6 col-6">
                                        <button id="back_step_2" type="button" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                                    </div>
                                    <div class="col-md-6 col-6" style="display: flex;justify-content: flex-end;">
                                        <button type="button" id="step_two"  class="btn btn-primary">Next  <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        

                            <div class="form_step_three" id="form_step_three" style="display: none">
                                <input type="hidden" name="lekra_brand_form_count[]" value="1" class="form-control"> 
                                <div class="form_create" id="form_create_1" lekra_brand_form_count="1"> 
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                                        <div class="col-lg-9">                                          
                                            <select class="form-control select2_search  knitting_received_lekra_chalan_id" id="knitting_received_lekra_chalan_id"  name="knitting_received_lekra_chalan_id[]" style="width: 100%;">  
                                                <option value="">--Select Option--</option>  
                                                @foreach ($all_knitting_received_lekra_chalan_id as $knitting_received_lekra_chalan_id)    
                                                    <option value="{{$knitting_received_lekra_chalan_id->send_chalan_id}}">{{$knitting_received_lekra_chalan_id->send_chalan_id}}</option>  
                                                @endforeach
                                            </select>
                                            <span style="color:red" class="knitting_received_lekra_chalan_id_error"  id="knitting_received_lekra_chalan_id_error" ></span>
                                        </div>
                                    </div>  
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Lekra Brand</label>
                                        <div class="col-lg-9">
                                            <select class="form-control lekra_brand"  name="lekra_brand[]">  
                                                <option value="">--Select Option--</option>  
                                                @foreach ($all_lekra_brand_name as $lekra_brand)
                                                    <option value="{{$lekra_brand->id}}">{{$lekra_brand->lekra_brand_name}}</option>  
                                                @endforeach
                                            </select>
                                            <span style="color:red"  class="lekra_brand_error" id="lekra_brand_error" ></span> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Lekra Cartoon</label>
                                        <div class="col-lg-9">
                                            <input type="number" step="any"class="form-control lekra_cartoon" name="lekra_cartoon[]"  placeholder="Enter Lekra Cartoon : 10" >
                                            <span style="color:red"  class="lekra_cartoon_error" id="lekra_cartoon_error" ></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Lekra Rate</label>
                                    
                                        <div class="col-lg-9">
                                            <input type="number" step="any" class="form-control lekra_rate" name="lekra_rate[]"  placeholder="Enter Lekra Rate : 27.36">
                                            <span style="color:red"  class="lekra_rate_error" id="lekra_rate_error" ></span>
                                        </div>
                                    </div>
                                </div>

                                <div id="new_lekra_brand_form"></div>

                                <button type="button" style="float: right;margin-bottom:8px;" id="form_create_btn"  onclick="lekra_brand_add()" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                                <div class="row" style="margin-top:100px;">
                                    <div class="col-md-6 col-6">
                                        <button id="back_step_3" type="button" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                                    </div>
                                    <div class="col-md-6 col-6" style="display: flex;justify-content: flex-end;">
                                        <button type="button" id="step_three"  class="btn btn-primary">Submit</button>
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
      
        $( "#step_one").click(function() {
            var send_chalan_id = $('#send_chalan_id').val();
            var knitting_received_suta_chalan_id = $('#knitting_received_suta_chalan_id').val();

            var date = $('#date').val();
            var company_id = $('#company_id').val();
            if(send_chalan_id==''){
                $("#send_chalan_id_error").text('Please enter your Send Chalan Id');
                $("#send_chalan_id").css('border','1px solid red');
                $("#send_chalan_id").focus();


            }else if(date==''){
                $("#date_error").text('Please enter your date');
                $("#date").css('border','1px solid red');
                $("#date").focus();

            }else if(company_id==''){
                $("#company_id_error").text('Please enter your date');
                $("#company_id").css('border','1px solid red');
                $("#company_id").focus();
            }
            else{
                $("#send_chalan_id_error").text('');
                $("#send_chalan_id").css('border','1px solid green');
                $("#send_chalan_id").focus();
                $("#date_error").text('');
                $("#date").css('border','1px solid green');
                $("#date").focus();
                $("#company_id_error").text('');
                $("#company_id").css('border','1px solid green');
                $("#company_id").focus();

                $('#form_step_one').hide();
                $('#form_step_two').show();
                $('#form_step_thre').hide();
                $('#step_2').addClass('active');


            }
           

        });
        $( "#step_two").click(function() {
         
            if(steptwocheck()) {
               
                $("#knitting_received_suta_chalan_id_error").text('');
                $("#knitting_received_suta_chalan_id").css('border','1px solid green');
                $("#knitting_received_suta_chalan_id").focus();
                $(".suta_id_error").text('');
                $(".suta_id").css('border','1px solid green');
                $(".suta_id").focus();
                $(".brand_id_error").text('');
                $(".brand_id").css('border','1px solid green');
                $(".brand_id").focus();
                $(".kapor_id_error").text('');
                $(".kapor_id").css('border','1px solid green');
                $(".kapor_id").focus();
                $("#weight_error").text('');
                $("#weight").css('border','1px solid green');
                $("#weight").focus();
                $("#cartoon_error").text('');
                $("#cartoon").css('border','1px solid green');
                $("#cartoon").focus();
                $("#rate_error").text('');
                $("#rate").css('border','1px solid green');
                $("#rate").focus();
                $('#form_step_one').hide();
                $('#form_step_two').hide();
                $('#form_step_three').show();
                $('#step_3').addClass('active');
            }
        });
       
        function steptwocheck(){
            for(var i=1;  i < count; i++){                
                var suta_id = $('#form_create_'+i+' .suta_id').val();
                var brand_id = $('#form_create_'+i+' .brand_id').val();
                var company_id = $('#form_create_'+i+' .company_id').val();
                var kapor_id = $('#form_create_'+i+' .kapor_id').val();
                var weight = $('#form_create_'+i+' .weight').val();
                var cartoon = $('#form_create_'+i+' .cartoon').val();
                var rate = $('#form_create_'+i+' .rate').val();
                var knitting_received_suta_chalan_id = $('#form_create_'+i+' #knitting_received_suta_chalan_id').val();
                if(knitting_received_suta_chalan_id==''){
                    $('#form_create_'+i+' #knitting_received_suta_chalan_id_error').text('Please enter your Suta Send Chalan Id');
                    $('#form_create_'+i+' #knitting_received_suta_chalan_id').css('border','1px solid red');
                    $('#form_create_'+i+' #knitting_received_suta_chalan_id').focus();
                    return 0;
                }else if(suta_id==''){
                    $('#form_create_'+i+' .suta_id_error').text('Please enter your suta Id');
                    $('#form_create_'+i+' .suta_id').css('border','1px solid red');
                    $('#form_create_'+i+' .suta_id').focus();
                    return 0;
                }else if(brand_id==''){
                    $('#form_create_'+i+' .brand_id_error').text('Please enter your brand Id');
                    $('#form_create_'+i+' .brand_id').css('border','1px solid red');
                    $('#form_create_'+i+' .brand_id').focus();
                    return 0;
                }else if(kapor_id==''){
                    $('#form_create_'+i+' .kapor_id_error').text('Please enter your kapor Id');
                    $('#form_create_'+i+' .kapor_id').css('border','1px solid red');
                    $('#form_create_'+i+' .kapor_id').focus();
                    return 0;
                }else if(weight==''){
                    $('#form_create_'+i+' #weight_error').text('Please enter your weight Id');
                    $('#form_create_'+i+' #weight').css('border','1px solid red');
                    $('#form_create_'+i+' #weight').focus();
                    return 0;
                }else if(cartoon==''){
                    $('#form_create_'+i+' #cartoon_error').text('Please enter your cartoon Id');
                    $('#form_create_'+i+' #cartoon').css('border','1px solid red');
                    $('#form_create_'+i+' #cartoon').focus();
                    return 0;
                }else if(rate==''){
                    $('#form_create_'+i+' #rate_error').text('Please enter your rate Id');
                    $('#form_create_'+i+' #rate').css('border','1px solid red');
                    $('#form_create_'+i+' #rate').focus();
                    return 0;
                }               
            }
            return 1; 
        }
        $( "#step_three").click(function() {
            var knitting_received_lekra_chalan_id = $('.knitting_received_lekra_chalan_id').val();
            var lekra_brand = $('.lekra_brand').val();
            var lekra_cartoon = $('.lekra_cartoon').val();
            var lekra_rate = $('.lekra_rate').val();

            
            if(knitting_received_lekra_chalan_id==''){
                $("#knitting_received_lekra_chalan_id_error").text('Please enter your Lekra Send Chalan Id');
                $("#knitting_received_lekra_chalan_id").css('border','1px solid red');
                $("#knitting_received_lekra_chalan_id").focus();


            }else if(lekra_brand==''){
                // alert('ok');
                $(".lekra_brand_error").text('Please enter your lekra brand Id');
                $(".lekra_brand").css('border','1px solid red');
                $(".lekra_brand").focus();

            }
            else if(lekra_cartoon==''){
                $(".lekra_cartoon_error").text('Please enter your brand Id');
                $(".lekra_cartoon").css('border','1px solid red');
                $(".lekra_cartoon").focus();

            }else if(lekra_rate==''){
                $(".lekra_rate_error").text('Please enter your kapor Id');
                $(".lekra_rate").css('border','1px solid red');
                $(".lekra_rate").focus();

            }
            else{
                $("#knitting_received_lekra_chalan_id_error").text('');
                $("#knitting_received_lekra_chalan_id").css('border','1px solid green');
                $("#knitting_received_lekra_chalan_id").focus();
                $(".lekra_brand_error").text('');
                $(".lekra_brand").css('border','1px solid green');
                $(".lekra_brand").focus();

                $(".lekra_cartoon_error").text('');
                $(".lekra_cartoon").css('border','1px solid green');
                $(".lekra_cartoon").focus();
                $(".lekra_rate_error").text('');
                $(".lekra_rate").css('border','1px solid green');
                $(".lekra_rate").focus();

                $('#step_three').attr( 'type','submit');

            }

            });

        $( "#back_step_2").click(function() {
            $('#form_step_one').show();
            $('#form_step_two').hide();
            $('#form_step_three').hide();
            $('#step_2').removeClass('active');
            // $('#step_2').removeClass('active');
            // $('#step_2').addClass('');
        });
        $( "#back_step_3").click(function() {
            $('#form_step_one').hide();
            $('#form_step_two').show();
            $('#form_step_three').hide();
            $('#step_3').removeClass('active');
            // $('#step_2').removeClass('active');
            // $('#step_2').addClass('');
        });
    });
    // `+count+`
    var count = 2;
    function add(){        
        $('#new_brand_form').append(`<div class="form_create" id="form_create_`+count+`" form_count="`+count+`">         
            <input type="hidden" name="form_count[]" value=" `+count+`" class="form-control"> 
            <button type="button" class="btn btn-danger" onclick="form_remove(`+count+`)"><i class="fa fa-minus"></i> Remove</button>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                    <div class="col-lg-9">
                        <select class="form-control select2_search  knitting_received_suta_chalan_ids" id="knitting_received_suta_chalan_id"  name="knitting_received_suta_chalan_id[]" style="width: 100%;">  
                            <option value="">--Select Option--</option>  
                            @foreach ($all_knitting_received_suta_chalan_id as $knitting_received_suta_chalan_id)    
                                <option value="{{$knitting_received_suta_chalan_id->send_chalan_id}}">{{$knitting_received_suta_chalan_id->send_chalan_id}}</option>  
                            @endforeach
                        </select>                 
                        
                        <span style="color:red" class="knitting_received_suta_chalan_ids_error"  id="knitting_received_suta_chalan_ids_error" ></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Name of Suta</label>
                    <div class="col-lg-9">
                        <select class="form-control suta_id"  name="suta_id[]" required>  
                            <option  value="">--Select Option--</option>  
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
                    
                        <select class="form-control brand_id"  name="brand_id[]" >  
                            <option  value="">--Select Option--</option>  
                            @foreach ($all_brand_name as $brand)    
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>  
                            @endforeach
                        </select>
                        <span style="color:red"  id="brand_id_error" class="brand_id_error" ></span> 
                    </div>
                    
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Kapor</label>
                    <div class="col-lg-9">
                        <select class="form-control kapor"  name="kapor_id[]">  
                            <option  value="">--Select Option--</option>  
                            @foreach ($all_kapor_name as $kapor)    
                                <option value="{{$kapor->id}}">{{$kapor->kapor_name}}</option>  
                            @endforeach
                        </select>
                        <span style="color:red" class="kapor_id_error"  id="kapor_id_error" ></span> 
                    </div>
                </div>  

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Weight</label>
                    <div class="col-lg-9">
                        <input type="number"  step="any" class="form-control weight" name="weight[]" id='weight_`+count+`' placeholder="Enter Weight : 50">
                        <span style="color:red"  id="weight_error" class="weight_error" ></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Cartoon</label>
                    <div class="col-lg-9">
                        <input type="number" step="any" class="form-control cartoon" name="cartoon[]" placeholder="Enter Carton : 20">
                        <span style="color:red"  id="cartoon_error" class="cartoon_error"></span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Rate</label>
                    <div class="col-lg-9">
                        <input type="number" step="any" class="form-control rate" name="rate[]" placeholder="Enter Rate : 148">
                        <span style="color:red"  id="rate_error" class="rate_error" ></span> 
                    </div>
                </div>
                
        </div>`);

        weightstockcheck(count);
        count++;
        // weightstockcheck();

    }
    function form_remove(form_identity){
        $('#form_create_'+form_identity).remove();
    }
    var count = 2;
    function lekra_brand_add(){
        $('#new_lekra_brand_form').append(`<div class="form_create" id="form_create_`+count+`" lekra_brand_form_count="1">  
            <input type="hidden" name="lekra_brand_form_count[]" value=" `+count+`" class="form-control">  
            <button type="button" class="btn btn-danger" onclick="form_remove(`+count+`)"><i class="fa fa-minus"></i> Remove</button>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                    <div class="col-lg-9">                                          
                        <select class="form-control select2_search  send_chalan_id_slekra_brand" id="knitting_received_suta_chalan_id"  name="knitting_received_lekra_chalan_id[]" style="width: 100%;">  
                            <option value="">--Select Option--</option>  
                            @foreach ($all_knitting_received_lekra_chalan_id as $send_chalan_id_slekra_brand)    
                                <option value="{{$knitting_received_lekra_chalan_id->send_chalan_id}}">{{$knitting_received_lekra_chalan_id->send_chalan_id}}</option>  
                            @endforeach
                        </select>
                        <span style="color:red" class="knitting_received_lekra_chalan_id_error"  id="knitting_received_lekra_chalan_id_error" ></span>
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Lekra Brand</label>
                    <div class="col-lg-9">
                        <select class="form-control"  name="lekra_brand[]">  
                            <option  value="">--Select Option--</option>  
                            @foreach ($all_lekra_brand_name as $lekra_brand)
                                <option value="{{$lekra_brand->id}}">{{$lekra_brand->lekra_brand_name}}</option>  
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Lekra Cartoon</label>
                    <div class="col-lg-9">
                        <input type="number" step="0.0000001" class="form-control" name="lekra_cartoon[]"  placeholder="Enter Lekra Cartoon : 10" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Lekra Rate</label>
                
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="lekra_rate[]" name="lekra_cartoon"  placeholder="Enter Lekra Rate : 27.36">
                    </div>
                </div>
            </div>`);
        count++;
    }
    function form_remove(form_identity){
        $('#form_create_'+form_identity).remove();

    }

    weightstockcheck(1);
    function weightstockcheck(count){
        // console.log(count);
        $('#weight_'+count).keyup(function(){
            var weight= $('#weight_'+count).val();
            // console.log(weight);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/weightStockCount',
                data: {
                    'weight': weight,
                },
                success: function(data) {
                    // alert(data);

                }

            });

        });
   
    }


 </script>
    
@endsection