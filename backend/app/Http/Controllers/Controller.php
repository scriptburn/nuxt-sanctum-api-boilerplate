<?php

namespace App\Http\Controllers;

use App\JsonResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct()
	{
		$this->jsonResponse = new JsonResponse();
	}
	public function success($data = [])
	{
		return new JsonResponse($data);
	}

	/**
	 * Fail with error message
	 * @param string $error
	 */
	public function fail($error = '')
	{
		return new JsonResponse([], $error);

	}
}
