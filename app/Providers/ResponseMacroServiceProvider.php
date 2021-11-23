<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class ResponseMacroServiceProvider extends ServiceProvider
{
      /**
       * Register the application's response macros.
       *
       * @return void
       */
      public function boot()
      {
          // Return an 201 CREATED, along with the new object
          Response::macro('created', function ($object) {
            return response::json($object, HttpFoundationResponse::HTTP_CREATED);
          });
      }
}
