<?php
declare(strict_types=1);
namespace Framework\Helpers;
use Framework\Helpers\Redirect;
use Framework\Helpers\Session;
use Framework\Model;

class Auth extends Model
{
    public function __construct()
    {

    }

    public static function isLoggedIn(): bool
    {
        $id = Session::exists('id') ? Session::get('id') : false;
        $email = Session::exists('email') ? Session::get('email') : false;
        $username = Session::exists('username') ? Session::get('username') : false;
        if($id && ($email || $username)){
            return true;
        }
        return false;
    }

    public static function passRedirect($url = ''): null|bool
    {
        if(self::isLoggedIn()){
            self::intendedPage();
            Redirect::to($url);
        }
        return false;
    }

    public static function failRedirect($url = ''): null|bool
    {
        if(!self::isLoggedIn()){
            self::intendedPage();
            Redirect::to($url);
        }
        return false;
    }

    public static function login($user): void
    {
        Session::regenerate();
        Session::set('id', $user->id);
        Session::set('email', $user->email);
        Session::set('name', $user->name);
    }

    public static function logout(): bool
    {
        return Session::destroy();
    }

    public static function setPermission(string $value): bool
    {
        return Session::set('permission', $value);
    }

    public static function permissionRedirect(string $value): bool|null
    {
        if(Session::get('permission') !=$value){
            self::intendedPage();
            Redirect::to('');
        }
        return false;
    }

    public static function intendedPage(): string
    {
        $_SESSION['intended_url'] = $_SERVER['REQUEST_URI'];
        return  $_SESSION['intended_url'];
    }

    public static function returnPage(): string|bool
    {
        if(isset($_SESSION['intended_url'])){
            $page = substr($_SESSION['intended_url'], strlen($_ENV["SITE_DIR"]));
            Session::delete('intended_url');
            return $page;
        }
        return false;
    }
}