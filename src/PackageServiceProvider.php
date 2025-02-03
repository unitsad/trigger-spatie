<?php

namespace UnitSAD\TriggerSpatie;

use Illuminate\Support\ServiceProvider;
use UnitSAD\TriggerSpatie\Http\Middleware\ValidateToken;

class PackageServiceProvider extends ServiceProvider
{
	public function boot(): void
	{
		$router = $this->app['router'];
		$router->aliasMiddleware('sso.validate-token', ValidateToken::class);
		
		$this->loadRoutesFrom(__DIR__ . '/Routes/api.php');
	}
}
