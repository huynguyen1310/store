@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product</h6>
        </div>
        <div class="row">
        <div class="card-body">
            <div class="col-lg-12">
                <form role="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="form-group">
                        <label>Name</label>
                        <input class="form-control" placeholder="Enter Name" name="name">
                        @if ($errors->has('name'))
                            <span class="error" style="color: red;font-size: 1rem;">{{ $errors->first('name') }}</span>
                        @endif
                    </fieldset>

                    <fieldset class="form-group">
                        <label>Quantity</label>
                        <input class="form-control" type="number" min="1" value="1" name="qty">
                        @if ($errors->has('qty'))
                            <span class="error" style="color: red;font-size: 1rem;">{{ $errors->first('qty') }}</span>
                        @endif
                    </fieldset>

                    <fieldset class="form-group">
                        <label>Price</label>
                        <input class="form-control" placeholder="Enter Price" name="price">
                        @if ($errors->has('price'))
                            <span class="error" style="color: red;font-size: 1rem;">{{ $errors->first('price') }}</span>
                        @endif
                    </fieldset>

                    <fieldset class="form-group">
                        <label>Promo</label>
                        <input class="form-control" placeholder="Enter promo" name="promo">
                        @if ($errors->has('promo'))
                            <span class="error" style="color: red;font-size: 1rem;">{{ $errors->first('promo') }}</span>
                        @endif
                    </fieldset>

                    <fieldset class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" id="editor"></textarea>
                        @if ($errors->has('description'))
                            <span class="error" style="color: red;font-size: 1rem;">{{ $errors->first('description') }}</span>
                        @endif
                    </fieldset>

                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control addProductCategory" name="idCategory">
                            <option value="0">----Select Category----</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Type</label>
                        <select class="form-control addProductType" name="idProductType" disabled></select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Show</option>
                            <option value="0">Don't show</option>
                        </select>
                    </div>

                    <fieldset class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                        @if ($errors->has('image'))
                            <span class="error" style="color: red;font-size: 1rem;">{{ $errors->first('image') }}</span>
                        @endif
                    </fieldset>

                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
    
                </form>
            </div>
        </div>
            
        </div>
    </div>


</div>
@endsection