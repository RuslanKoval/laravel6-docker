<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use Illuminate\Http\Request;

class RbacTestController extends Controller
{
    public function index()
    {
        $user = User::find(2);
        $result = [];
        $result['isAdmin'] = $user->hasRole('administrator');
        $result['isEditor'] = $user->hasRole('editor');
        $result['isAdminOrEditor'] = $user->hasRole('administrator|editor');
        $result['canUpdateUser'] = $user->canDo('user.update');
        $result['canUpdateOrCreateUser'] = $user->canDo('user.update|user.create');


        dd($result);
    }
}
