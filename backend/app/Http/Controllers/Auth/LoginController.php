<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function __invoke()
	{
		if (Auth::attempt([
			'email' => request('email'),
			'password' => request('password'),
		]))
		{
			$access = ['keyword:fetch'];
			if (request('email') === env('ADMIN_EMAIL'))
			{
				$access[] = 'account:manage';
			}

			return $this->success([
				'token' => auth()->user()->createToken('API Token', $access)->plainTextToken,
			]);
		}

		return response()->json([
			'message' => 'invalid credentials or such user doesn\'t exist',
			'error' => 'Unprocessable Entity (validation failed)',
		], 422);
	}
}
