@extends('admin.layout')
@section('header')
    <h1>
        Papéis
        <small>Posts</small>
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active">Papéis</li>
      </ol>
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Lista dos Papéis</h3>
            @can('create', $roles->first())
              <a href="{{ route('admin.roles.create') }}"" class="btn btn-primary pull-right""><i class="fa fa-plus"></i> Criar Papel</a>
            @endcan
        </div>
        <div class="box-body">
              <table id="roles-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Identificador</th>
                  <th>Nome</th>
                  <th>Permissões</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->display_name}}</td>
                            <td>{{$role->permissions->pluck('name')->implode(', ')}}</td>
                            <td>
                              @can('update', $role)
                                <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                              @endcan
                              @can('update', $role)
                                @if($role->id !==1)
                                  <form action="{{route('admin.roles.destroy', $role)}}" method='POST' style='display:inline'>
                                    {{csrf_field()}} {{method_field('DELETE')}}
                                    <button class="btn btn-xs btn-danger"
                                                                      onclick="return confirm('Tem certeza que quer eliminar este papel?')">
                                      <i class="fa fa-times"></i></button>
                                  </form>
                                @endif
                              @endcan
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



