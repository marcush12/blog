@extends('admin.layout')
@section('header')
    <h1>
        Todos os Posts
        <small>Posts</small>
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active">Post</li>
      </ol>
@endsection
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista das publicações</h3>
        </div>
        <div class="box-body">
              <table id="posts-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Título</th>
                  <th>Excerto</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->excerpt}}</td>
                            <td>
                                <a href="#" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">
@endpush
@push('scripts')
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
  $(function () {
    $('#posts-table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
    </script>
@endpush

