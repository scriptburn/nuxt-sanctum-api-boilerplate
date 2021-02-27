<?php

namespace App;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use \Illuminate\Support\MessageBag;
/**
 * Class JsonResponse
 * Simple response object for Laravue application
 * Response format:
 * {
 *   'success': true|false,
 *   'data': [],
 *   'error': ''
 * }
 *
 * @package Laravue
 */
class JsonResponse implements \JsonSerializable
{
	const STATUS_SUCCESS = true;
	const STATUS_ERROR = false;

	/**
	 * Data to be returned
	 * @var mixed
	 */
	private $data = [];

	/**
	 * Error message in case process is not success. This will be a string.
	 *
	 * @var string
	 */
	private $error = '';

	/**
	 * @var bool
	 */
	private $success = false;
	private $dataKey = 'data';

	/**
	 * JsonResponse constructor.
	 * @param mixed $data
	 * @param string $error
	 */
	public function __construct($data = [],   $error = '')
	{
		if ($this->shouldBeJson($data))
		{
			$this->data = $data;
		}

		$this->error = $error;
		$this->success = !empty($data);
	}

	/**
	 * Success with data
	 *
	 * @param array $data
	 */
	public function success($data = [],$dataKey='data')
	{
		$this->dataKey=$dataKey;
		$this->success = true;
		$this->data = $data;
		$this->error = '';
		return $this;
	}

	/**
	 * Fail with error message
	 * @param string $error
	 */
	public function fail($error = '')
	{
		$this->success = false;
		$this->error = $error;
		$this->data = [];
		return $this;
	}

	/**
	 * @inheritdoc
	 */
	public function jsonSerialize()
	{
		return [
			'success' => $this->success,
			$this->dataKey => $this->data,
			'error' => $this->error,
		];
	}

	/**
	 * Determine if the given content should be turned into JSON.
	 *
	 * @param  mixed  $content
	 * @return bool
	 */
	private function shouldBeJson($content): bool
	{
		return $content instanceof Arrayable ||
		$content instanceof Jsonable ||
		$content instanceof \ArrayObject ||
		$content instanceof \JsonSerializable ||
		$content instanceof \Illuminate\Support\MessageBag ||
		is_array($content);
	}
	
}
