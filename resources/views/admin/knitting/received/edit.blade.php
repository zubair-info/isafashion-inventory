@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">				
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Making Knitting Suta Form</h3>
                {{-- <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul> --}}
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">
                    <div class="card-body">
                        <form action="{{route('KnittingReceivedSutaUpdate')}}" method="post" >
                         @csrf
                         <input type="hidden" name="knitting_received_sutabrand_id" value="{{ $knitting_received_sutabrand_id->id}}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                                <div class="col-lg-9">
                                    <input type="number" id="send_chalan_id" value="{{ $knitting_received_sutabrand_id->send_chalan_id}}"  name="send_chalan_id" class="form-control" placeholder="Chalan Id : 11097">
                                    <span style="color:red"  class="send_chalan_id_error" id="send_chalan_id_error" ></span> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Send Company Name</label>
                                <div class="col-lg-9">
                                    <select class="form-control company_id"  name="company_id">  
                                        <option>--Select Option--</option>  
                                    @foreach ($all_company_name as $company)    
                                        <option value="{{$company->id}}" {{ ( $company->id == $knitting_received_sutabrand_id->company_id) ? 'selected' : '' }}>{{$company->company_name}}</option>  
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date</label>
                                <div class="col-lg-9">
                                    <input type="date"  id="date"  value="{{ $knitting_received_sutabrand_id->date}}" name="date" class="form-control date">
                                    <span style="color:red"  id="date_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Name of Suta</label>
                                <div class="col-lg-9">
                                    <select class="form-control suta_id"  name="suta_id"  id="suta_id">  
                                        <option value="">--Select Option--</option>  
                                        @foreach ($all_suta_name as $suta)    
                                            <option value="{{$suta->id}}" {{ ( $suta->id == $knitting_received_sutabrand_id->suta_id) ? 'selected' : '' }}>{{$suta->suta_name}}</option>  
                                        @endforeach
                                    </select>
                                    <span style="color:red"  class="suta_id_error" id="suta_id_error" ></span> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Brand</label>
                                <div class="col-lg-9">
                                
                                    <select class="form-control brand_id" id="brand_id"  name="brand_id">  
                                        <option  value="">--Select Option--</option>  
                                        @foreach ($all_brand_name as $brand)    
                                            <option value="{{$brand->id}}" {{ ( $brand->id == $knitting_received_sutabrand_id->brand_id) ? 'selected' : '' }}>{{$brand->brand_name}}</option>  
                                        @endforeach
                                    </select>
                                    <span style="color:red"  id="brand_id_error" class="brand_id_error" ></span> 
                                </div>
                                
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Kapor</label>
                                <div class="col-lg-9">
                                    <select class="form-control kapor_id"  name="kapor_id" id="kapor_id">  
                                        <option  value="">--Select Option--</option>  
                                        @foreach ($all_kapor_name as $kapor)    
                                            <option value="{{$kapor->id}}" {{ ( $kapor->id == $knitting_received_sutabrand_id->kapor_id) ? 'selected' : '' }}>{{$kapor->kapor_name}}</option>  
                                        @endforeach
                                    </select>
                                    <span style="color:red" class="kapor_id_error"  id="kapor_id_error" ></span> 
                                </div>
                            </div> 
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Weight</label>
                                <div class="col-lg-9">
                                    <input type="number" step="0.0000001" class="form-control weight" id="weight" name="weight" placeholder="Enter Weight : 50" value="{{ $knitting_received_sutabrand_id->weight}}">
                                    <span style="color:red"  id="weight_error" class="weight_error" ></span> 
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Cartoon</label>
                                <div class="col-lg-9">
                                    <input type="number" step="0.0000001" class="form-control cartoon" id="cartoon" name="cartoon" placeholder="Enter Carton : 20"  value="{{ $knitting_received_sutabrand_id->cartoon}}">
                                    <span style="color:red"  id="cartoon_error" class="cartoon_error"></span> 
                                </div>
                            
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Rate</label>
                                <div class="col-lg-9">
                                    <input type="number" step="0.0000001" class="form-control rate" id="rate" name="rate" placeholder="Enter Rate : 148" value="{{ $knitting_received_sutabrand_id->rate}}" >
                                    <span style="color:red"  id="rate_error" class="rate_error" ></span> 
                                </div>
                            </div>                       
                            {{-- <button class="btn btn-info text-right" type="submit" id="submit">Add Knitting Suta </button> --}}
                            <div class="text-right">
                                <button type="button" id="submit" class="btn btn-primary">Update Knitting Suta</button>
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
        $("#submit").on("click", function(){
            var send_chalan_id = $('#send_chalan_id').val();
            var company_id = $('#company_id').val();
            var date = $('#date').val();
            var suta_id = $('.suta_id').val();
            // alert('ok');
            var brand_id = $('.brand_id').val();
            var company_id = $('.company_id').val();
            var kapor_id = $('.kapor_id').val();
            var weight = $('.weight').val();
            var cartoon = $('.cartoon').val();
            var rate = $('.rate').val();

            if(send_chalan_id==''){
                $("#send_chalan_id_error").text('Please enter your Send Chalan Id');
                $("#send_chalan_id").css('border','1px solid red');
                $("#send_chalan_id").focus();


            }else if(company_id==''){
                $("#company_id_error").text('Please enter your company');
                $("#company_id").css('border','1px solid red');
                $("#company_id").focus();
            }else if(date==''){
                $("#date_error").text('Please enter your date');
                $("#date").css('border','1px solid red');
                $("#date").focus();

            }
            else if(suta_id==''){
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

            }else if(weight==''){
                $("#weight_error").text('Please enter your weight Id');
                $("#weight").css('border','1px solid red');
                $("#weight").focus();

            }else if(cartoon==''){
                $("#cartoon_error").text('Please enter your cartoon Id');
                $("#cartoon").css('border','1px solid red');
                $("#cartoon").focus();

            }else if(rate==''){
                $("#rate_error").text('Please enter your rate Id');
                $("#rate").css('border','1px solid red');
                $("#rate").focus();

            }
            else{
                $("#send_chalan_id_error").text('');
                $("#send_chalan_id").css('border','1px solid green');
                $("#send_chalan_id").focus();
                $("#company_id_error").text('');
                $("#company_id").css('border','1px solid green');
                $("#company_id").focus();

                $("#date_error").text('');
                $("#date").css('border','1px solid green');
                $("#date").focus();
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
                // $('#submit').addClass('submit');
                $('#submit').attr( 'type','submit');
            }
        });

    });

 </script>
    
@endsection