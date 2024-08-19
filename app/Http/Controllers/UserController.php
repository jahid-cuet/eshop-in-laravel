<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
     $users=User::all();
     return view('admin.users',compact('users'));
    }
    public function user_view($id)
    {
     $user=User::find($id);
     return view('admin.user_view',compact('user'));
    }
}
