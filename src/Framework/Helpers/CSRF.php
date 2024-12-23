<?php
declare(strict_types=1);
namespace Framework\Helpers;

use Framework\Helpers\Session;
class CSRF{

	public static function generate(): string
	{
		$tokenName = 'csrf_token';
		$token = Session::set($tokenName, md5(uniqid()));
		return '<input type="hidden" name="'.$tokenName.'" value="'.$token.'">';
	}

	public static function check($token): bool
	{
		$tokenName = 'csrf_token';
		if(Session::exists($tokenName) && $token === Session::get($tokenName)){
			Session::delete($tokenName);
			return true;
		}
		Redirect::to('error404');
		return false;
	}
}