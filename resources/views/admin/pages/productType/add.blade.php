@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product Type</h6>
        </div>
        <div class="row">
        <div class="card-body">
            <div class="col-lg-12">
                <form role="form" action="{{ route('product-type.store') }}" method="POST">
                    @csrf
                    <fieldset class="form-group">
                        <label>Name</label>
                        <input class="form-control" placeholder="Enter Name" name="name">
                        @if ($errors->has('name'))
                            <span class="error" style="color: red;font-size: 1rem;">{{ $errors->first('name') }}</span>
                        @endif
                    </fieldset>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>                                
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Show</option>
                            <option value="0">Don't show</option>
                        </select>
                    </div>
    
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
    
                </form>
            </div>
        </div>
            
        </div>
    </div>


</div>
@endsection