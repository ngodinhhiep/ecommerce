@extends('admin.layouts.master')

@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Slider</h1>
        <div class="section-header-breadcrumb">
      
        </div>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Create Slider</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Banner</label>
                        <input type="file" name="banner" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                        <input type="text" name="type" class="form-control" value="{{old('type')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Starting Price</label>
                        <input type="text" name="starting_price" class="form-control" value="{{old('starting_price')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Button Url</label>
                        <input type="text" name="btn_url" class="form-control" value="{{old('btn_url')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Serial</label>
                        <input type="text" name="serial" class="form-control" value="{{old('serial')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection