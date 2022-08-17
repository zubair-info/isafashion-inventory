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
                        <h4 class="card-title">Making Knitting Recived Edit Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('KnittingRecivedUpdate')}}" method="POST">
                            @csrf

                            <input type="hidden" name="id" class="form-control"  value="{{ $all_received_chalan_id->id}}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">received Chalan Id</label>
                                <div class="col-lg-9">                                                             
                                    <select class="form-control select2_search"  name="send_chalan_id">  
                                        <option>--Select Option--</option>  
                                        
                                        @foreach ($all_send_chalan_id as $send_chalan_id)    
                                            <option value="{{$send_chalan_id->send_chalan_id}}"  {{ ( $send_chalan_id->send_chalan_id == $all_received_chalan_id->send_chalan_id) ? 'selected' : '' }}>{{$send_chalan_id->send_chalan_id}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date</label>
                                <div class="col-lg-9">
                                    <input type="date"  name="date" class="form-control date"   value="{{ $all_received_chalan_id->date}}">
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
