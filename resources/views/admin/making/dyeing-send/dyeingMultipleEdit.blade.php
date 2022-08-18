@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Dyeing Multiple Edit</h3>

            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{route('dyeingSendMultipleUpdate')}}" method="POST">
                            @csrf
                            <input type="hidden" name="dyeing_send_multiple_id" class="form-control"  value="{{ $all_dyeing_multiple_send->id}}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Received Chalan Id</label>
                                <div class="col-lg-9">
                                    <select class="form-control received_chalan_id"  name="received_chalan_id"  id="received_chalan_id"> 
                                        
                                  
                                        <option value="">--Select Option--</option>  
                                        @foreach ($knetting_received_chalan_id as $received_chalan_id)    
                                            <option value="{{$received_chalan_id->received_chalan_id}}" {{ ( $received_chalan_id->received_chalan_id == $all_dyeing_multiple_send->received_chalan_id) ? 'selected' : '' }}>{{$received_chalan_id->received_chalan_id}}</option>  
                                        @endforeach
                                    </select>
                                    <span style="color:red" class="received_chalan_id_error"> </span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Color</label>
                                <div class="col-lg-9">
                                    
                                    <select class="form-control color"  name="color"  id="color_id">  
                                        <option data-display="- Please select -" value="" >Choose A Option</option>
                                        {{-- <option value="">--Select Option--</option>  
                                        @foreach ($knitting_received_colors as $knitting_received_color)    
                                            <option value="{{$knitting_received_color->color}}">{{$knitting_received_color->color}}</option>  
                                        @endforeach --}}
                                    </select>
                                    <span style="color:red" class="color_error"  id="color_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Roll</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control roll" name="roll" step=0.001   placeholder="Enter  Roll : 10" value="{{ $all_dyeing_multiple_send->roll}}">
                                    <span style="color:red" class="roll_error"  id="roll_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Body</label>
                                <div class="col-lg-9">
                                    <input type="number"  step=0.001 class="form-control body" name="body" placeholder="Enter Body : 254.4" value="{{ $all_dyeing_multiple_send->body}}">
                                    <span style="color:red" class="body_error" id="body_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Rib</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control rib" name="rib" step=0.001  placeholder="Enter Rib : 148" value="{{ $all_dyeing_multiple_send->rib}}">
                                    <span style="color:red"  id="rib_error" class="rib_error"></span>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Total</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control total" name="total" step=0.001  placeholder="Enter Total : 27.36" value="{{ $all_dyeing_multiple_send->total}}">
                                    <span style="color:red" class="total_error"  id="total_error" ></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Lost Percentage</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control lost_percentage" name="lost_percentage" step=0.001  placeholder="Enter Total : 5" value="{{ $all_dyeing_multiple_send->lost_percentage}}">
                                    <span style="color:red" class="lost_percentage_error"  id="lost_percentage_error" ></span>
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

@section('footer_script')

<script>
    // get size by color id /product id
$('.received_chalan_id').change(function() {
  // function add();
  var received_chalan_id = $('.received_chalan_id').val();

  // alert(product_id);
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
      type: 'POST',
      url: '/getColor',
      data: {
          'received_chalan_id': received_chalan_id,
      },
      success: function(data) {
          // alert(data);
          $('#color_id').html(data);
      }
  });
});
</script>
    
@endsection
