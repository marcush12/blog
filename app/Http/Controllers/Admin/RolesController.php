<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRolesRequest;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index', [
            'roles'=>Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.roles.create', [
            'permissions'=>Permission::pluck('name', 'id'),
            'role'=>new Role,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolesRequest $request)
    {
        // $data = $request->validate([
        //     'name'=>'required|unique:roles',//nome deve ser único na table roles
        //     'display_name'=>'required',
        // ],[
        //     'name.required'=>'O campo identificador é obrigatório.',//se falhar acima, exibir msg
        //     'name.unique'=>'Este campo identificador já está em uso.',
        //     'display_name.required'=>'O campo nome é obrigatório.'
        // ]);
        $role = Role::create($request->validated());
        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }
        return redirect()->route('admin.roles.index')->withFlash('O papel foi criado corretamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'role'=>$role,
            'permissions'=>Permission::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRolesRequest $request, Role $role)
    {
        // $data = $request->validate(['display_name'=>'required'],
        //     [
        //         'display_name.required'=>'O campo nome é obrigatório.'//se falhar acima, exibir msg
        //     ]);
        $role->update($request->validated());
        $role->permissions()->detach();
        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }
        return redirect()->route('admin.roles.edit', $role)->withFlash('O papel foi atualizado corretamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->id === 1) {
            throw new \Illuminate\Auth\Access\AuthorizationException('Não é possível eliminar este papel!');
        }
        //$this->authorize('delete', $role);
        $role->delete();
        return redirect()->route('admin.roles.index')->withFlash('O papel foi eliminado');
    }
}
