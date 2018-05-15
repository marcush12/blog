<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersPermissionsController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->permissions()->detach();//apagar todas as permissões
        if ($request->filled('permissions')) {
            $user->givePermissionTo($request->permissions);
        }
        return back()->withFlash('As permissões foram atualizadas.');
    }
}
