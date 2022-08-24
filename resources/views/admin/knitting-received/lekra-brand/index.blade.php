@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">				
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Knitting Lekra Brand Form</h3>
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
                        <form action="{{route('KnittingReceivedLekraBrandStore')}}" method="post" >
                         @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                                <div class="col-lg-9">
                                    <input type="number" id="send_chalan_id" name="send_chalan_id" class="form-control" placeholder="Chalan Id : 11097">
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
                                    <span style="color:red"  id="company_id_error" ></span>
                                
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
                                <label class="col-lg-3 col-form-label">Lekra Brand</label>
                                <div class="col-lg-9">
                                    <select class="form-control lekra_brand"  name="lekra_brand">  
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
                                    <input type="number" step="0.0000001" class="form-control lekra_cartoon" name="lekra_cartoon"  placeholder="Enter Lekra Cartoon : 10" >
                                    <span style="color:red"  class="lekra_cartoon_error" id="lekra_cartoon_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Lekra Rate</label>
                            
                                <div class="col-lg-9">
                                    <input type="text" class="form-control lekra_rate" name="lekra_rate"  placeholder="Enter Lekra Rate : 27.36">
                                    <span style="color:red"  class="lekra_rate_error" id="lekra_rate_error" ></span>
                                </div>
                            </div>
                           
                            <div class="text-right">
                                <button type="button" id="submit" class="btn btn-primary">Add Knitting Lekra</button>
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
            var lekra_brand = $('.lekra_brand').val();
            // alert('ok');
            var lekra_cartoon = $('.lekra_cartoon').val();
            var lekra_rate = $('.lekra_rate').val();

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
            else if(lekra_brand==''){
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
                $("#send_chalan_id_error").text('');
                $("#send_chalan_id").css('border','1px solid green');
                $("#send_chalan_id").focus();
                $("#company_id_error").text('');
                $("#company_id").css('border','1px solid green');
                $("#company_id").focus();

                $("#date_error").text('');
                $("#date").css('border','1px solid green');
                $("#date").focus();

                $(".lekra_brand_error").text('');
                $(".lekra_brand").css('border','1px solid green');
                $(".lekra_brand").focus();

                $(".lekra_cartoon_error").text('');
                $(".lekra_cartoon").css('border','1px solid green');
                $(".lekra_cartoon").focus();
                $(".lekra_rate_error").text('');
                $(".lekra_rate").css('border','1px solid green');
                $(".lekra_rate").focus();

               
                // $('#submit').addClass('submit');
                $('#submit').attr( 'type','submit');
            }
        });

    });

 </script>
    
@endsection