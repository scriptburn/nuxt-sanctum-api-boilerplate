<?php

namespace App\Http\Controllers;

use App\Services\ScalesrepApiService;
use Illuminate\Http\Request;

class ScalesrepApiController extends Controller
{
	protected $api;

	public function __construct(ScalesrepApiService $api)
	{
		$this->api = $api;
	}

	public function search(Request $request, $keyword)
	{
		return $this->api->search(1, $keyword, $request->except('keyword'));
	}
}
