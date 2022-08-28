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
                        <form action="{{route('accessoriesOutputUpdate')}}"method="post" >
                            @csrf
                          <input type="hidden" name="accessories_output_id" value="{{ $all_accessories_output->id}}">
                            <div class="form-group row">
                                <label class="form-label">Product Name</label>
                                <select class="form-control product_name"  id="product_name" name="product_name">  
                                        <option value="">--Select Option--</option>  
                                    @foreach ($all_product_name as $product_name)    
                                        <option value="{{$product_name->product_name}}" {{ ( $product_name->product_name == $all_accessories_output->product_name) ? 'selected' : '' }}>{{$product_name->product_name}}</option>  
                                    @endforeach
                                </select>
                           
                            </div>

                            <div class="form-group row">
                                <label class="form-label">Spend</label>
                                <input type="number" style="any" class="form-control" name="spend" value="{{ $all_accessories_output->spend}}"  placeholder="Enter Spend">
                                @error('spend')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control"value="{{ $all_accessories_output->description}}"  name="description"  placeholder="Enter Description">
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="form-label">Signature</label>
                                <input type="file" class="form-control" value="{{old('signature')}}"  name="signature"  placeholder="Enter Save Stock">
                                @error('signature')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Output</button>
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
   
</script>
    
@endsection
