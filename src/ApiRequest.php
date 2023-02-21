<?php

declare(strict_types=1);

namespace Multisafepay;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use Exception;

abstract class ApiRequest
{

    const MSP_BEGIN_LOG = PHP_EOL.'MSP>>>';
    const MSP_END_LOG = '<<<MSP'.PHP_EOL;

    protected string $url;
    protected string $apiKey;
    protected int $timeOut;

    public static function debug(mixed $var): void
    {
        if (! is_string($var)) {
            $var = print_r($var, true);
        }

        Log::debug(self::MSP_BEGIN_LOG.$var.self::MSP_END_LOG);
    }

    public function __construct(string $apiKey, null|int $timeOut = null)
    {
        $this->url = App::environment('production') ? 'https://api.multisafepay.com/v1/json/' : 'https://testapi.multisafepay.com/v1/json/';
        $this->apiKey = $apiKey;
        $this->timeOut = is_null($timeOut) ? config('food.guzzle.timeout', 10) : $timeOut;
    }

    public function send(string $method, string $path, null|array $data = null): null|array
    {
        $response = null;
        $url = $this->url.$path;
        $problem = "Client or Server error on $method $url ";

        try {
            $response = $this->prepareRequest()->$method($url, $data);
        } catch (Exception $e) {
            self::debug($problem.$e->getMessage());
            return null;
        }

        if (! $response->successful()) {
            self::debug($problem);
        }

        return $this->result($response);
    }

    protected function prepareRequest(): PendingRequest
    {
        return Http::timeout($this->timeOut)
            ->withHeaders(
                [
                    'Content-Type' => 'application/json',
                    'User-Agent' => 'Googlebot/2.1 (+http://www.google.com/bot.html)',
                    'api_key' => $this->apiKey,
                ]
            )
            ->asJson();
    }

    protected function result(Response $response): null|array
    {
        $data = $response->json();

        if (! empty($data['success'])) {
            return $data['data'];
        }

        self::debug($response->status());

        self::debug($data);

        return null;
    }
}
