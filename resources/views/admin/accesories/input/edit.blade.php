@extends('layouts.dashboard')
@section('content')

<style>
    .product_name_div{
        border-radius: 5px;
        cursor: pointer;
        background: #fff;
        padding: 5px 10px;
        box-shadow: 0px 1px 2px 1px rgb(154 154 204 / 22%);
    }
</style>
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Edit Accessories Inupt Form</h3>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-6 col-sm-12 col-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{route('accessoriesInputUpdate')}}" method="post">
                            @csrf
                        
                            <input type="hidden" name="accessories_input_id" class="form-control"  value="{{ $all_accessories_input->id}}">
                            
                            <div class="form-group row">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control product_name" name="product_name" value="{{ $all_accessories_input->product_name}}" placeholder="Enter Name">
                                <div class="product_name_div mt-1" style="display: none"></div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="form-label">Total Price</label>
                                <input type="text" class="form-control" name="total_price"  value="{{ $all_accessories_input->total_price}}"   placeholder="Enter Price">
                                @error('total_price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="form-label">Total Qty</label>
                                <input type="text" class="form-control" name="total_qty" value="{{ $all_accessories_input->total_qty}}"  placeholder="Enter Total Qty">
                                @error('total_qty')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="form-label">Single Price</label>
                                <input type="text" class="form-control" name="single_price" value="{{ $all_accessories_input->single_price}}"  placeholder="Enter Single Price">
                                @error('single_price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" value="{{ $all_accessories_input->description}}" placeholder="EnterDescription">
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary edit_btn">Update Accessories Input</button>
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
     $('.product_name').keyup(function() {

var product_name = $('.product_name').val();

if (product_name != "") {
        
        $.ajax({
            url: '/inputProductNameSearch/' + product_name,
            dataType: 'json',
            type: 'get',
            success: function(result) {
                // alert(result.data);
                $('.product_name_div').html('');

                $.each(result.data, function(key, item) {


                    $('.product_name_div').append('<li class="list-unstyled"  id="' +
                        item.id + '">' +
                        item.product_name + '</li>');
                        $('.product_name_div').show();

                })

            }

        });

    } else {

        $('.product_name_div').hide();

    }
});

$(document).on('click', '.product_name_div li', function() {
var product_name = $(this).text();
$('.product_name').val(product_name);
// $('.product_name').val(product_name);
$('.product_name_div').hide();

});
</script>
    
@endsection
