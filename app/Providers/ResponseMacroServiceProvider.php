<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('default', function ($response_code = 200, $message = "Empty", $data = null) {
            return Response::make([
                'meta' => [
                    'error' => ($response_code > 299) ? true : false,
                    'code' => $response_code,
                    'message' => $message
                ],
                'data' => (is_null($data)) ? (object) null : ((is_array($data)) ? (array) $data : (object) $data)
            ], $response_code);
        });
    }

}
