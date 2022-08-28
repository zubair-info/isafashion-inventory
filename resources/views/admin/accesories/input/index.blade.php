@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <!-- Page Header -->
    {{-- <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Accessories Input Form</h3>
            </div>
        </div>
    </div> --}}
    <!-- /Page Header -->
    <style>
        .product_name_div{
            border-radius: 5px;
            cursor: pointer;
            background: #fff;
            padding: 5px 10px;
            box-shadow: 0px 1px 2px 1px rgb(154 154 204 / 22%);
        }
    </style>
    <div class="row">
        <div class="col-xl-4 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Accessories Input Form</h4>
                </div>
                <div class="card-body">

                    <div class="card-body">
                        <form action="{{route('accessoriesInputStore')}}"method="post" >
                            @csrf
                          
                            <div class="form-group row">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control product_name" name="product_name" value="{{old('product_name')}}"  placeholder="Enter Name">
                                <div class="product_name_div mt-1" style="display: none"></div>
                                @error('product_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class="form-group row">
                                <label class="form-label">Total Price</label>
                                <input type="text" class="form-control" name="total_price" value="{{old('total_price')}}"  placeholder="Enter Price">
                                @error('total_price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="form-label">Total Qty</label>
                                <input type="text" class="form-control" name="total_qty" value="{{old('total_qty')}}"  placeholder="Enter Total Qty">
                                @error('total_qty')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="form-label">Single Price</label>
                                <input type="text" class="form-control" name="single_price" value="{{old('single_price')}}"   placeholder="Enter Single Price">
                                @error('single_price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="form-label">Description</label>
                                <input type="text" step="any" class="form-control" value="{{old('description')}}"  name="description"  placeholder="Enter Description">
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Add Input</button>
                            </div>
                        </form>
                    </div>               
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Acessories Qty</h4>
                        <a  class="btn btn-sm bg-success-light " href="{{route('accessoriesOutputAdd')}}">
                            <i class="fe fe-plus"></i> Acessories Output
                        </a> 
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        {{-- <th>Id</th> --}}
                                        <th>Product Name</th>
                                        <th>Total Qty</th>

                                    </tr>
                                </thead>

                                @foreach ($all_accesories_name as $key=>$accesories_name)                                 

                                    <tbody>
                                      <tr>
                                            {{-- <td>{{$key+1}}</td> --}}
                                            @php
                                               $stock_last_value=  App\Models\Accesories::where('product_name',$accesories_name->product_name)->orderBy('created_at', 'DESC')->first();
                                            //  print_r($stock_last_value)
                                            @endphp
                                            @if (isset($stock_last_value))
                                                
                                            
                                            <td>{{$stock_last_value->product_name}}</td>
                                            <td>{{$stock_last_value->stock}}</td>
                                            @endif
      
                                         </tr>                         
                                    </tbody>
                                 @endforeach

                               
                            </table>
                            <br>
                            <h4 class="card-title">Acessories Input List</h4>
                            <hr>
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        {{-- <th>Id</th> --}}
                                        <th>Date</th>
                                        <th>Product Name</th>
                                        <th>Total Price</th>
                                        <th>Qty</th>
                                        <th>Single Price</th>
                                        <th>description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                @foreach ($all_accesories_name as $key=>$accesories_name)                                 

                                    <tbody>
                                    <tr>
                                            
                                            @php
                                            $stock_last_value=  App\Models\Accesories::where('product_name',$accesories_name->product_name)->orderBy('created_at', 'DESC')->first();
                                            //  print_r($stock_last_value)
                                            @endphp
                                             @if (isset($stock_last_value))
                                                @if($stock_last_value->spend==NULL)
                                                {{-- <td>{{$stock_last_value->id}}</td> --}}
                                                <td>{{$stock_last_value->created_at->format('d-M-Y')}}</td>
                                                <td>{{$stock_last_value->product_name}}</td>
                                                <td>{{$stock_last_value->total_price}}</td>
                                                <td>{{$stock_last_value->total_qty}}</td>
                                                <td>{{$stock_last_value->single_price}}</td>
                                                <td>{{$stock_last_value->description}}</td>
                                                <td class="text-left">                                              
                                                    <div class="actions">
                                                    
                                                        <a  class="btn btn-sm bg-danger-light" href="{{route('accessoriesInputEdit',$stock_last_value->id)}}">
                                                            <i class="fe fe-pencil"></i> Edit
                                                        </a>
                                                        
                                                        <a  class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal_{{$stock_last_value->id}}">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    
                                                    </div>                                            
                                                </td> 
                                                @endif

                                                 <!-- Delete Modal -->
                                                 <div class="modal fade delete_modal" id="delete_modal_{{$stock_last_value->id}}" aria-hidden="true" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="form-content p-2">
                                                                    <h4 class="modal-title">Delete</h4>
                                                                    <p class="mb-4">Are you sure want to delete?</p>
                                                                    <button  name="{{$stock_last_value->id }}" type="button" class="btn btn-primary btn_delete">Delete </button>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- /Delete Modal -->
                                            @endif
                                            
                                               
                                        
    
                                        </tr>                         
                                    </tbody>
                                @endforeach

                               
                            </table>
                        </div>                
                </div>
            </div>
        </div>
    </div>    
</div>		  
@endsection

@section('footer_script')

	{{--  delete code  --}}
    <script>

        $(document).ready(function() {
            $('.btn_delete').click(function() {
                var id=  $(this).attr('name');
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url:"/accessoriesInputDelete/"+id,
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data){
                        $('.delete_modal').hide();
                        $('.modal-backdrop').hide();
                        toastr.success(data.success);
                        window.location.reload();

                    }
                });
            });
        });


        // search input product name
        $('.product_name').keyup(function() {

            var product_name = $('.product_name').val();

            if (product_name != "") {
                // $('.product_name_div').hide();
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
                        });

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