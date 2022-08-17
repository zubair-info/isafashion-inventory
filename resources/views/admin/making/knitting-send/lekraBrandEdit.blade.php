@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Knitting Send Lekra Brand Edit</h3>
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
                    <div class="card-body">
     
                        <form action="{{route('sendlekraBrandUpdate')}}" method="POST">
                            @csrf
                            <input type="hidden" name="all_lekra_brand_id" value="{{ $all_lekra_brand_id->id}}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Lekra Brand</label>
                                <div class="col-lg-9">
                                    <select class="form-control lekra_brand"  name="lekra_brand">  
                                        <option value="">--Select Option--</option>  
                                        @foreach ($all_lekra_brand_name as $lekra_brand)
                                            <option value="{{$lekra_brand->id}}" {{ ( $lekra_brand->id == $all_lekra_brand_id->lekra_brand_id) ? 'selected' : '' }}>{{$lekra_brand->lekra_brand_name}}</option>  
                                        @endforeach
                                    </select>
                                    <span style="color:red"  class="lekra_brand_error" id="lekra_brand_error" ></span> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Lekra Cartoon</label>
                                <div class="col-lg-9">
                                    <input type="number" step="0.0000001" class="form-control lekra_cartoon" name="lekra_cartoon"  placeholder="Enter Lekra Cartoon : 10" value="{{ $all_lekra_brand_id->lekra_cartoon}}">
                                    <span style="color:red"  class="lekra_cartoon_error" id="lekra_cartoon_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Lekra Rate</label>
                            
                                <div class="col-lg-9">
                                    <input type="text" class="form-control lekra_rate" value="{{ $all_lekra_brand_id->lekra_rate}}" name="lekra_rate"  placeholder="Enter Lekra Rate : 27.36">
                                    <span style="color:red"  class="lekra_rate_error" id="lekra_rate_error" ></span>
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
