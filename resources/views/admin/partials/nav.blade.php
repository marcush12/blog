    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navegação</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{ setActiveRoute('dashboard') }}">
          <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Home</span></a>
        </li>
        <li class="treeview {{ setActiveRoute('admin.posts.index') }}">
          <a href="#"><i class="fa fa-bars"></i> <span>Blog</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              <li class="{{ setActiveRoute('admin.posts.index') }}"><a href="{{route('admin.posts.index')}}"><i class="fa fa-eye"></i>Ver todos os Posts</a></li>
            @can('create', new App\Post)
              <li>
                @if(request()->is('admin/posts/*'))
                  <a href="{{route('admin.posts.index', '#create')}}"><i class="fa fa-pencil"></i>Criar Post</a>
                @else
                  <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Criar Post</a>
                @endif
              </li>
            @endcan
          </ul>
        </li>
      @can('view', new App\User)
        <li class="treeview {{ setActiveRoute(['admin.users.index', 'admin.users.create']) }}">
          <a href="#"><i class="fa fa-users"></i> <span>Usuários</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ setActiveRoute('admin.users.index') }}">
              <a href="{{route('admin.users.index')}}"><i class="fa fa-eye"></i>Ver todos os usuários</a>
            </li>
            <li>
                <a href="{{route('admin.users.create')}}"><i class="fa fa-pencil"></i>Criar um usuário</a>
            </li>
          </ul>
        </li>
      @else
        <li class="{{ setActiveRoute(['admin.users.edit']) }}">
          <a href="{{route('admin.users.edit', auth()->user())}}"><i class="fa fa-user"></i> <span>Perfil</span></a>
        </li>
      @endcan
        @can('view', new \Spatie\Permission\Models\Role)

        @endcan
        @can('view', new \Spatie\Permission\Models\Permission)
          <li class="{{ setActiveRoute(['admin.permissions.index', 'admin.permissions.edit']) }}">
            <a href="{{route('admin.permissions.index')}}"><i class="fa fa-pencil"></i> <span>Permissões</span></a>
          </li>
        @endcan
    </ul>
