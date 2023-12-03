@extends('admin.layouts.master')

@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Category</h1>
        <div class="section-header-breadcrumb">
      
        </div>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Update Category</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$category->name}}">
                    </div>
                
                    <div class="form-group">
                        <label for="">Icon</label>
                        <button class="btn btn-primary" data-icon="{{$category->icon}}" data-selected-class="btn-danger"
                        data-unselected-class="btn-info" role="iconpicker" name="icon"></button>
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option {{$category->status == 1 ? 'selected' : ''}} value="1">Active</option>
                            <option {{$category->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection