@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">				
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Making Knitting Send Form</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
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
                        <form action="{{route('KnittingSendStore')}}"method="post" >
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
                                        <label class="col-lg-3 col-form-label">Name of Suta</label>
                                        <div class="col-lg-9">
                                            <select class="form-control"  name="suta_id[]" id="suta_id">  
                                                <option>--Select Option--</option>  
                                                @foreach ($all_suta_name as $suta)    
                                                    <option value="{{$suta->id}}">{{$suta->suta_name}}</option>  
                                                @endforeach
                                            </select>
                                            <span style="color:red"  class="suta_id_error" id="send_chalan_id_error" ></span> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Brand</label>
                                        <div class="col-lg-9">
                                        
                                            <select class="form-control"  name="brand[]">  
                                                <option>--Select Option--</option>  
                                                @foreach ($all_brand_name as $brand)    
                                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>  
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>
        
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Kapor</label>
                                        <div class="col-lg-9">
                                            <select class="form-control"  name="kapor[]">  
                                                <option>--Select Option--</option>  
                                                @foreach ($all_kapor_name as $kapor)    
                                                    <option value="{{$kapor->id}}">{{$kapor->kapor_name}}</option>  
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Weight</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control" name="weight[]" placeholder="Enter Weight : 50">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Cartoon</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control" name="cartoon[]" placeholder="Enter Carton : 20">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Rate</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control" name="rate[]" placeholder="Enter Rate : 148">
                                        </div>
                                    </div>                        
                                </div>
                                
                                <div id="new_brand_form"></div>

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
                                        <label class="col-lg-3 col-form-label">Lekra Brand</label>
                                        <div class="col-lg-9">
                                            <select class="form-control"  name="lekra_brand[]">  
                                                <option>--Select Option--</option>  
                                                @foreach ($all_lekra_brand_name as $lekra_brand)
                                                    <option value="{{$lekra_brand->id}}">{{$lekra_brand->lekra_brand_name}}</option>  
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Lekra Cartoon</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control" name="lekra_cartoon[]"  placeholder="Enter Lekra Cartoon : 10" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Lekra Rate</label>
                                    
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="lekra_rate[]"  placeholder="Enter Lekra Rate : 27.36">
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
                                        <button type="submit" id="step_three"  class="btn btn-primary">Submit</button>
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

            $('#form_step_one').hide();
            $('#form_step_two').hide();
            $('#form_step_three').show();
            $('#step_3').addClass('active');
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
                                            <label class="col-lg-3 col-form-label">Name of Suta</label>
                                            <div class="col-lg-9">
                                                <select class="form-control"  name="suta_id[]">  
                                                    <option>--Select Option--</option>  
                                                    @foreach ($all_suta_name as $suta)    
                                                        <option value="{{$suta->id}}">{{$suta->suta_name}}</option>  
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Brand</label>
                                            <div class="col-lg-9">
                                            
                                                <select class="form-control"  name="brand[][">  
                                                    <option>--Select Option--</option>  
                                                    @foreach ($all_brand_name as $brand)    
                                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>  
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                        </div>
            
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Kapor</label>
                                            <div class="col-lg-9">
                                                <select class="form-control"  name="kapor[]">  
                                                    <option>--Select Option--</option>  
                                                    @foreach ($all_kapor_name as $kapor)    
                                                        <option value="{{$kapor->id}}">{{$kapor->kapor_name}}</option>  
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>  

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Weight</label>
                                            <div class="col-lg-9">
                                                <input type="number" class="form-control" name="weight[]" placeholder="Enter Weight : 50">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Cartoon</label>
                                            <div class="col-lg-9">
                                                <input type="number" class="form-control" name="cartoon[]" placeholder="Enter Carton : 20">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Rate</label>
                                            <div class="col-lg-9">
                                                <input type="number" class="form-control" name="rate[]" placeholder="Enter Rate : 148">
                                            </div>
                                        </div>
                                        
                                    </div>`);
        count++;
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
                    <label class="col-lg-3 col-form-label">Lekra Brand</label>
                    <div class="col-lg-9">
                        <select class="form-control"  name="lekra_brand[]">  
                            <option>--Select Option--</option>  
                            @foreach ($all_lekra_brand_name as $lekra_brand)
                                <option value="{{$lekra_brand->id}}">{{$lekra_brand->lekra_brand_name}}</option>  
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Lekra Cartoon</label>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" name="lekra_cartoon[]"  placeholder="Enter Lekra Cartoon : 10" >
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
    
 </script>
    
@endsection