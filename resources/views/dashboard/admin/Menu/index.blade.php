@extends('AdminLayouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped  data-table nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Url</th>
                    <th>Position</th>
                    <th>Order</th>
                    <th>Meta Title</th>
                    <th>Meta Description</th>
                    <th>Meta Tag</th>
                    <th>Image</th>
                    <th width="100px">action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script type="text/javascript">
    $(function () {
      
      var table = $('.data-table').DataTable({
         bDestroy: true,
          processing: true,
          serverSide: true,
          ajax: "{{ route('admin.menu') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'title', name: 'title'},
              {data: 'slug', name: 'slug'},
              {data: 'url', name: 'url'},
              {data: 'position', name: 'position'},
              {data: 'order', name: 'order'},
              {data: 'metaTitle', name: 'metaTitle'},
              {data: 'metaDescription', name: 'metaDescription'},
              {data: 'metaTag', name: 'metaTag'},
              {data: 'image', name: 'image'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });      
    });
  </script>