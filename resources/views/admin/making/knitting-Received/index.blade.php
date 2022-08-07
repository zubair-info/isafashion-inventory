@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Welcome Admin!</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">
               
                    <div class="card-header">
                        <h4 class="card-title">Making Knitting Recived Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('KnittingRecivedStore')}}" method="post" >
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Send Chalan Id</label>
                                <div class="col-lg-9">
                                    
                                    <select class="form-control select2_search"  name="send_chalan_id">  
                                        <option>--Select Option--</option>  
                                        @foreach ($all_suta_name as $suta)    
                                            <option value="{{$suta->id}}">{{$suta->suta_name}}</option>  
                                        @endforeach
                                    </select>
                                    {{-- <input type="number" name="send_chalan_id" class="form-control" placeholder="Chalan Id : 11097"> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date</label>
                                <div class="col-lg-9">
                                    <input type="date"  name="date" class="form-control date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Name of Suta</label>
                                <div class="col-lg-9">
                                    {{-- <input type="text" name="name_of_suta" class="form-control"> --}}
                                    <select class="form-control"  name="suta_id">  
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
                                   
                                    <select class="form-control"  name="brand_id">  
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
                                    <select class="form-control"  name="kapor_id">  
                                        <option>--Select Option--</option>  
                                        @foreach ($all_kapor_name as $kapor)    
                                            <option value="{{$kapor->id}}">{{$kapor->kapor_name}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Received Chalan Id</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control" name="received_chalan_id" placeholder="Enter Weight : 50">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Body</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control" name="body" placeholder="Enter Body : 20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Rib</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control" name="rib" placeholder="Enter Rib : 148">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Color</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="color" placeholder="Enter Color : Kerela"  >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Roll</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="roll"  placeholder="Enter  Roll : 10" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Total</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="total" placeholder="Enter Total : 27.36">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Total Used Lekra</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="total_used_lekra" placeholder="Enter Total Used Lekra : 27.36">
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Add Knitting Recived</button>
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
