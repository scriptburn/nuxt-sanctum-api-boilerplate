<?php

namespace App\Services;
use App\Models\ScalesrepApiSearch;
use Carbon\Carbon;

class ScalesrepApiService extends BaseService
{
	protected $apiKey;
	public function __construct($apiKey)
	{
		$this->apiKey = $apiKey;
	}
	public function commonArgs($args = [])
	{
		$globalArgs = [
			'api_key' => $this->apiKey,
		];
		$commonArgs = [];

		$commonArgs = array_merge($commonArgs, $args);

		return array_merge($commonArgs, $globalArgs);
	}
	public function validateSearchApiArgs($args)
	{
		$common_params = [
			'search_type' => [
				'values' =>
				[
					'scholar' =>
					[
						'values' =>
						[
							'scholar_include_citations' =>
							[
								'values' =>
								[
									'false',
									'true' =>
									[
										'default' => true,
									],
								],
							],
							'scholar_year_min',
							'scholar_year_max',
							'scholar_patents_courts' =>
							[
								'values' =>
								[
									'0',
									'1',
									'4',

								],
							],

						],
					],
					'scholar' =>
					[
						'values' =>
						[
							'scholar_include_citations' =>
							[
								'values' =>
								[
									'false',
									'true' =>
									[
										'default' => true,
									],
								],
							],
							'scholar_year_min',
							'scholar_year_max',
							'scholar_patents_courts' =>
							[
								'values' =>
								[
									'0',
									'1',
									'4',

								],
							],

						],
					],
					'product' =>
					[
						'values' =>
						[
							'product_id' =>
							[
								'required' => true,
							],
							'product_type' =>
							[
								'values' =>
								[
									'product',
									'sellers',
									'specifications',

								],
							],
							'product_free_shipping' =>
							[
								'values' =>
								[
									'true',
									'false',
								],
							],
							'product_condition_used' =>
							[
								'values' =>
								[
									'true',
									'false',
								],
							],

						],
					],
					'shopping' =>
					[
						'values' =>
						[
							'shopping_buy_on_google' =>
							[
								'values' =>
								[
									'true',
									'false' =>
									[
										'default' => true,
									],
								],
							],
							'shopping_price_min',
							'shopping_price_max',
							'shopping_condition' =>
							[
								'values' =>
								[
									'new',
									'used',
								],
							],
							'shopping_merchants',

						],
					],
					'place_reviews' =>
					[
						'values' =>
						[
							'place_id' =>
							[
								'require' => true,
							],
						],
					],
					'places' =>
					[
						'values' =>
						[
							'places_include_images' =>
							[
								'values' =>
								[
									'true',
									'false',
								],
							],
						],
					],
					'news' =>
					[
						'values' =>
						[
							'show_duplicates' =>
							[
								'values' =>
								[
									'true',
									'false' =>
									[
										'default' => true,
									],
								],
							],
							'news_type' =>
							[
								'values' =>
								[
									'blogs',
									'all' =>
									[
										'default' => true,
									],
								],
							],
							'exclude_if_modified' =>
							[
								'values' =>
								[
									'true',
									'false' =>
									[
										'default' => true,
									],
								],
							],
						],
					],
					'images' =>
					[
						'values' =>
						[
							'images_page' =>
							[
								'default' => 1,
							],
							'images_color' =>
							[
								'values' =>
								[
									'black_and_white',
									'transparent',
									'red',
									'orange',
									'yellow',
									'green',
									'teal',
									'blue',
									'purple',
									'pink',
									'white',
									'gray',
									'black',
									'brown',

									'any' =>
									[
										'default' => true,
									],
								],
							],
							'images_size' =>
							[
								'values' =>
								[
									'large',
									'medium',
									'icon',

								],
							],
							'images_type' =>
							[
								'values' =>
								[
									'line_drawing',
									'clipart',
									'gif',

								],
							],
							'images_usage' =>
							[
								'values' =>
								[
									'reuse_with_modification',
									'reuse',
									'non_commercial_reuse_with_modification',
									'non_commercial_reuse',

								],
							],
							'cookie',
						],
					],
				],
			],
			'output' => [
				'values' =>
				[
					'json' =>
					[
						'default' => true,
					],
					'html',
					'csv',

				],
				'required' => true,
			],
			'csv_fields',
			'include_html' =>
			[
				'values' =>
				[
					'true',
					'false' =>
					[
						'default' => true,
					],
				],
			],
			'flatten_results' =>
			[
				'values' =>
				[
					'true',
					'false',
				],
			],
			'device' =>
			[
				'values' =>
				[
					'tablet',
					'mobile',
					'desktop',

				],
			],
			'location',
			'location_auto',
			'uule',
			'google_domain' => ['default' => 'google.com'],
			'gl' => ['default' => 'us'],
			'hl' => ['default' => 'en'],
			'lr',
			'cr',
			'time_period' =>
			[
				'values' =>
				[
					'last_hour',
					'last_day',
					'last_week',
					'last_month',
					'last_year',
					'custom',
				],
			],
			'time_period_min',
			'time_period_max',
			'sort_by' =>
			[
				'values' =>
				[
					'price_low_to_high',
					'price_high_to_low',
					'review_score',
					'base_price',
					'total_price',
					'promotion',
					'seller_rating',
					'highest_rating',
					'lowest_rating',
					'relevance',
					'date',

				],
			],
			'nfpr' =>
			[
				'values' =>
				[
					'1',
					'0' =>
					[
						'default' => true,
					],
				],
			],
			'filter' =>
			[
				'values' =>
				[
					'0',
					'1' =>
					[
						'default' => true,
					],
				],
			],
			'safe' =>
			[
				'values' =>
				[
					'active',
					'off',
				],
			],
			'include_answer_box',
			'page' =>
			[
				'default' => 1,
			],
			'num',
			'skip_on_incident' =>
			[
				'values' =>
				[
					'all',
					'major_only',
				],
			],
			'hide_base64_images',
		];
		$checkRequiredParams = function ($options) use ($args)
		{
			$requires = [];
			foreach ($options as $option => $value)
			{
				if (is_array($value) && isset($value['required']) && $value['required'])
				{
					if (!isset($args[$option]))
					{
						$requires[] = $option;
					}
				}
			}

			return [empty($requires) ? 1 : 0, $requires, implode(", ", $requires)." are required"];
		};
		$fnGetDefaultValue = function ($param)
		{
			if (is_array($param))
			{
				if (isset($param['values']) && is_array($param['values']))
				{
					foreach ($param['values'] as $k => $v)
					{
						if (is_array($v))
						{
							$key = $k;
							$value = $v;
						}
						else
						{
							$value = $v;
						}
						if (is_array($value) && isset($value['default']) && $value['default'])
						{
							return $key;
						}
					}
				}
				elseif ($param['default'])
				{
					return $param['default'];
				}
			}

			return null;
		};
		$fnIsValidValue = function ($param, $value)
		{
			if (is_array($param))
			{
				if (isset($param['values']) && is_array($param['values']))
				{
					return array_search($value, array_keys($param['values'])) !== false;
				}
			}

			return true;
		};
		if (!$this->apiKey)
		{
			return [0, "Something wrong plz contact administrator(1)"];
		}
		$hasRequiredParams = $checkRequiredParams($common_params);
		if (!$hasRequiredParams)
		{
			return $hasRequiredParams;
		}
		foreach ($common_params as $key => $value)
		{
			if (is_array($value))
			{
				$param_value = $value;
				$param_key = $key;
			}
			else
			{
				$param_value = $value;
				$param_key = $value;
			}

			$argValue = isset($args[$param_key]) ? $args[$param_key] : null;
			if (is_null($argValue))
			{
				$args[$param_key] = $fnGetDefaultValue($param_value);

				if (is_null($args[$param_key]))
				{
					if (is_array($param_value) && isset($param_value['required']) && $param_value['required'])
					{
						return [0, "'$param_key' value is required, "];
					}
					else
					{
						unset($args[$param_key]);
					}
				}
			}
			elseif (!$fnIsValidValue($param_value, $argValue))
			{
				return [0, "Invalid value for '$param_key'"];
			}
		}

		return $args;
	}

	public function apiUrl($type, $args)
	{
		$queryArgs = $this->commonArgs($args);
		$queryString = http_build_query($queryArgs);
		$url = sprintf('https://api.scaleserp.com/%1$s?%2$s', $type, $queryString);

		return $url;
	}
	public function makeRequest($url)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		$api_result = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		curl_close($ch);

		return [$httpcode, $api_result];
	}
	public function apiRequest($cached, $type, $args = [], $expect_http_code = 200)
	{
		$expect_http_code = is_array($expect_http_code) ? $expect_http_code : [$expect_http_code];
		$url = $this->apiUrl($type, $args);

		if ($cached)
		{
			$apiResult = ScalesrepApiSearch::where('url', $url)
				->where('created_at', '>=', Carbon::now()->subDays(1)->toDateTimeString())->
				orderBy('created_at', 'desc')->first();

			if ($apiResult)
			{
				return [1, $apiResult->result, $url, $expect_http_code[0], $apiResult];
			}
		}
		$api_result = $this->makeRequest($url);
		$status = in_array($api_result[0], $expect_http_code);

		$apiResult = new ScalesrepApiSearch();
		if ($status)
		{
			$apiResult->url = $url;
			$apiResult->result = $api_result[1];
			$apiResult->save();
		}

		return [$status, $api_result[0], $url, $api_result[1], $apiResult];
	}

	public function search($cached, $keyword, $args = [])
	{
		$args['q'] = $keyword;
		$args = $this->validateSearchApiArgs($args);

		$response = $this->apiRequest($cached, 'search', $args);

		return $response;
	}
}
