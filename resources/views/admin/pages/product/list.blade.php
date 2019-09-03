@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Product Type</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Info</th>
                        <th>Category</th>
                        <th>Product Type</th>
                        <th>Status</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Info</th>
                        <th>Category</th>
                        <th>Product Type</th>
                        <th>Status</th>
                        <th>Edit/Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ $product->description }}</td>    
                            <td>
                                <b>Qty</b>: {{ $product->qty }}
                                <br/>
                                <b>Price</b>: {{ $product->price }}
                                <br/>
                                <b>Promo</b>: {{ $product->promo }}
                                <br/>
                                <b>Image</b>: 
                                <img src="{{asset('img/upload/product')}}{{ '/'.$product->image }}" width="100" height="100">
                            </td>                        
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->productType->name }}</td>
                            <td>
                                @if ($product->status == 1)
                                    Show
                                @else
                                    Don't Show
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-primary editProductType" title="{{ "Edit ".$product->name }}" type="button" data-id="{{ $product->id }}"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger deleteProductType" title="{{ "Delete ".$product->name }}" type="button" data-id="{{ $product->id }}" data-toggle="modal" data-target="#deleteProductType"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
        </div>
    </div>
    <!-- Edit Modal-->
    <div class="modal fade" id="editProductType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit category <span class="title"></span></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="margin: 5px">
                            <div class="col-lg-12">
                                <form role="form">
                                    @csrf
                                    <fieldset class="form-group">
                                        <label>Name</label>
                                        <input class="form-control name" name="name" placeholder="Category name">
                                        <span class="error" style="color: red;font-size: 1rem;"></span>
                                    </fieldset>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control category" name="category">
                                        
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control status" name="status">
                                            <option value="1" class="show">Show</option>
                                            <option value="0" class="dont-show">Don't show</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success updateProductType">Save</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
    </div>
    <!-- delete Modal-->
    <div class="modal fade" id="deleteProductType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success del">Yes</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                <div>
            </div>
        </div>
    </div>
    </div>
    
@endsection