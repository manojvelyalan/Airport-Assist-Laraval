<?php
namespace App\Providers;

use Monolog\Logger;
use Illuminate\Support\Facades\DB;
use Monolog\Handler\StreamHandler;
use Illuminate\Support\ServiceProvider;

class QueryLogProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      DB::listen(function ($query) {
          $logFile = storage_path('logs/query-log-'.date("Y-m-d").'.log');
          $stream = new Logger('log');
          $stream->pushHandler(new StreamHandler($logFile));
          $bindings = $query->bindings;
          $time = $query->time;
          $stream->info($query->sql, compact('bindings', 'time'));
      });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
