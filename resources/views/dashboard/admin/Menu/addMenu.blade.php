@extends('AdminLayouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="{{ route('admin.menu.store') }}" method="post">
      @csrf
      @php
      print_r($errors->all());
          foreach ($errors->all() as $message) {
          //  echo $message;
    //
}
      @endphp
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
                <input type="text" name="title" id="title" class="form-control">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" name="status" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option value="Active">Active</option>
                  <option value="InActive">In-Active</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Parent</label>
                <select id="parent_id" name="parent_id" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option value="0">No Parent</option>
                  <option>Canceled</option>
                  <option>Success</option>
                </select>
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" class="form-control">
              </div>
              <div class="form-group">
                <label for="url">Url</label>
                <input type="text" id="url" class="form-control">
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
              </div>
              <!-- checkbox -->
              <div class="form-group">
                <label for="image">Position</label>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="position[]" value="primary">
                  <label class="form-check-label">Primary</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="position[]" value="main">
                  <label class="form-check-label">Secondary</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="position[]" value="footer">
                  <label class="form-check-label">Footer</label>
                </div>
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
                <input type="text" name="metaTitle" id="metaTitle" class="form-control">
              </div>
              <div class="form-group">
                <label for="metaDescription">Meta Description</label>
                <input type="text" name="metaDescription" id="metaDescription" class="form-control">
              </div>
              <div class="form-group">
                <label for="metaTag">Meta Tag</label>
                <input type="text" name="metaTag" id="metaTag" class="form-control @error('metaTag')is-invalid @enderror ">
                @error('metaTag')<span class="error invalid-feedback">Please provide a password</span> @enderror
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
          <input type="submit" value="Create new Project" class="btn btn-success float-right">
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

<script>
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        alert( "Form successful submitted!" );
      }
    });
    $('#quickForm').validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 5
        },
        terms: {
          required: true
        },
      },
      messages: {
        email: {
          required: "Please enter a email address",
          email: "Please enter a valid email address"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        terms: "Please accept our terms"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
  </script>