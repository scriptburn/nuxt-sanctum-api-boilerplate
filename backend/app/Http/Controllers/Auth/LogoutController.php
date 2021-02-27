<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
	public function __invoke()
	{
		$user = auth()->user();
		if ($user)
		{
			$user->tokens()->delete();
		}

		return $this->success([
			'message' => 'Tokens Revoked',
		]);
	}
}
