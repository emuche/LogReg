<?php
declare(strict_types= 1);
namespace Framework\Helpers;

session_start();
class Session{

	public static function exists($name): bool
	{
		return (isset($_SESSION[$name])) ? true : false;
	}

	public static function set($name, $value = null): bool
	{
		if(is_object($name) || is_array($name)){
			foreach($name as $key => $value){
				$_SESSION[$key] = $value;
			}
			return true;
		}elseif(is_string($name)){
			$_SESSION[$name] = $value;
			return true;
		}
		return false;
	}

	public static function get($name){
		if(is_array($name)){
			$result = [];
			foreach($name as $value){
				if(self::exists($value)){
					$session = [$value => $_SESSION[$value]];
					array_push($result, $session);
				}
			}
			return $result;
		}elseif(is_string($name)){
			if(self::exists($name)){
				$session = $_SESSION[$name];
				return $session;
			}else{
				return false;
			}
		}
	}

	public static function delete($name):bool
	{
		if(is_array($name)){
			foreach($name as $key=>$value){
				if(self::exists($value)){
					unset($_SESSION[$value]);
					return true;
				}
			}
		}elseif(is_string($name)){
			if(self::exists($name)){
				unset($_SESSION[$name]);
				return true;
			}
		}
		return false;
	}

	public static function flash($name){
		if(self::exists($name)){
			$session = self::get($name);
			self::delete($name);
			return $session;
		}
		return false;
	}

	public static function check($name, $value): bool
	{
		if(self::exists($name) && (self::get($name) == $value)){
			return true;
		}
		return false;
	}

} 

?>