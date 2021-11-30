@extends('AdminLayouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menu Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Menu Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@php
    print_r($data);
@endphp
{{ $data->id }}
    <!-- Main content -->
    <section class="content">
    <form action="{{ url('admin/menu/update/'.$data->id) }}" method="post" enctype="multipart/form-data">
     @csrf
     @if (session('status') == 200)
       <div class="alert alert-success">
           {{ session('message') }}
       </div>
      @elseif(session('status') == 401)
      <div class="alert alert-danger">
        {{ session('message') }}
    </div>
      @endif
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input type="text" name="title" id="title" value="{{ $data->id }}" class="form-control @error('title') is-invalid @enderror">
                @error('metaTag') <span id="error" class="error invalid-feedback">{{ _($errors->first('title')) }}</span> @enderror
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" value="{{ $data->id }}" class="form-control @error('description')is-invalid @enderror " rows="4"></textarea>
                @error('description') <span id="error" class="error invalid-feedback">{{ _($errors->first('description')) }}</span> @enderror
              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" name="status" class="form-control custom-select @error('status')is-invalid @enderror ">
                  <option @if ($data->status == 'Active') selected @endif value="Active">Active</option>
                  <option @if ($data->status == 'InActive') selected @endif value="InActive">In-Active</option>
                </select>
                @error('status') <span id="error" class="error invalid-feedback">{{ _($errors->first('status')) }}</span> @enderror
              </div>
              <div class="form-group">
                <label for="inputStatus">Parent</label>
                <select id="parent_id" name="parent_id" class="form-control custom-select @error('parent_id')is-invalid @enderror ">
                  <option selected disabled>Select one</option>
                  <option  @if ($data->parent_id == '0') selected @endif  value="0">No Parent</option>
                  <option>Canceled</option>
                  <option>Success</option>
                </select>
                @error('parent_id') <span id="error" class="error invalid-feedback">{{ _($errors->first('parent_id')) }}</span> @enderror
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" value="{{ $data->id }}" class="form-control @error('slug')is-invalid @enderror ">
                @error('slug') <span id="error" class="error invalid-feedback">{{ _($errors->first('slug')) }}</span> @enderror
              </div>
              <div class="form-group">
                <label for="url">Url</label>
                <input type="text" id="url" name="url"  value="{{ $data->id }}"  class="form-control @error('url')is-invalid @enderror ">
                @error('url') <span id="error" class="error invalid-feedback">{{ _($errors->first('url')) }}</span> @enderror
              </div>
              <div class="form-group">
                <label for="order">Order</label>
                <input type="text" id="order" name="order"  value="{{ $data->id }}"  class="form-control @error('order')is-invalid @enderror ">
                @error('order') <span id="error" class="error invalid-feedback">{{ _($errors->first('order')) }}</span> @enderror
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control @error('image')is-invalid @enderror ">
                @error('image') <span id="error" class="error invalid-feedback">{{ _($errors->first('image')) }}</span> @enderror
              </div>
              <!-- checkbox -->
              <div class="form-group">
                <label for="image">Position</label>
                <div class="form-check">
                  <input class="form-check-input @error('position')is-invalid @enderror " type="checkbox" @if ($data->position == '0') selected @endif name="position[]" value="primary">
                  <label class="form-check-label">Primary</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input @error('position')is-invalid @enderror " type="checkbox" name="position[]" value="main">
                  <label class="form-check-label">Secondary</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input @error('position')is-invalid @enderror " type="checkbox" name="position[]" value="footer">
                  <label class="form-check-label">Footer</label>
                </div>
                @error('position')<span id="terms-error" class="error invalid-feedback" style="display: inline;">{{ _($errors->first('position')) }}</span> @enderror
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">SEO</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="metaTitle">Meta Title</label>
                <input type="text" name="metaTitle" id="metaTitle" class="form-control @error('metaTitle')is-invalid @enderror ">
                @error('metaTitle') <span id="error" class="error invalid-feedback">{{ _($errors->first('metaTitle')) }}</span> @enderror
              </div>
              <div class="form-group">
                <label for="metaDescription">Meta Description</label>
                <input type="text" name="metaDescription" id="metaDescription" class="form-control @error('metaDescription')is-invalid @enderror ">
                @error('metaTag') <span id="error" class="error invalid-feedback">{{ _($errors->first('title')) }}</span> @enderror
              </div>
              <div class="form-group">
                <label for="metaTag">Meta Tag</label>
                <input type="text" name="metaTag" id="metaTag" class="form-control @error('metaTag')is-invalid @enderror ">
                @error('metaTag')<span class="error invalid-feedback">{{ _($errors->first('metaTag')) }}</span> @enderror
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{ route('admin.menu') }}" class="btn btn-secondary">All Menu</a>
          <input type="submit" value="Edit Menu" class="btn btn-success float-right">
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection