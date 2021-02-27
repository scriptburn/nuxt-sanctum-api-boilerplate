<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Resources\User;
class ProfileController extends Controller
{
	public function me(Request $request)
    {
         

        return new User(auth()->user());
    }
}
