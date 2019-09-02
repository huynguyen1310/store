@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
        </div>
        <div class="row">
        <div class="card-body">
            <div class="col-lg-12">
                <form role="form" action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <fieldset class="form-group">
                        <label>Name</label>
                        <input class="form-control" placeholder="Enter Name" name="name">
                    </fieldset>
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