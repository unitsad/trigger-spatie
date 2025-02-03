<?php

namespace UnitSAD\TriggerSpatie\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class ValidateToken
{
	/**
	 * Handle an incoming request.
	 *
	 * @param Request $request
	 * @param Closure $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next): mixed
	{
		$token = $request->header('X-SSO-ROUTE-TOKEN');

		if (empty($token) || empty(config('sso.portal_sso_token')) || $this->decryptToken($token) !== config('sso.portal_sso_token')) {
			return response()->json([
				'status' => false,
				'message' => 'Unauthorized'
			], 401);
		}
		
		return $next($request);
	}
	
	private function decryptToken(string|null $text): bool|string
	{
		try {
			if(empty($text)) {
				return false;
			}
			
			$key = config('encryption.key');
			$iv = config('encryption.iv');
			
			return openssl_decrypt(
				base64_decode($text),
				'AES-256-CBC',
				$key,
				0,
				$iv
			);
		} catch (Exception $e) {
			return false;
		}
	}
}