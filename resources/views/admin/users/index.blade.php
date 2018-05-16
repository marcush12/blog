@extends('admin.layout')
@section('header')
    <h1>
        USUÁRIOS
        <small>Posts</small>
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active">Usuários</li>
      </ol>
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Lista dos usuários</h3>
            <a href="{{ route('admin.users.create') }}"" class="btn btn-primary pull-right""><i class="fa fa-plus"></i> Criar Usuário</a>
        </div>
        <div class="box-body">
              <table id="posts-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Roles</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>user
                            <td>{{$user->email}}</td>
                            <td>{{$user->getRoleNames()->implode(', ')}}</td>
                            <td>
                                <a href="{{route('admin.users.show', $user)}}" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-eye"></i></a>
                                <a href="{{route('admin.users.edit', $user)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                                <form action="{{route('admin.users.destroy', $user)}}" method='POST' style='display:inline'>
                                  {{csrf_field()}} {{method_field('DELETE')}}
                                  <button class="btn btn-xs btn-danger"
                                    onclick="return confirm('Tem certeza que quer eliminar este usuário?')">
                                    <i class="fa fa-times"></i></button>
                                </form>

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
<!-- Modal -->

@endpush


