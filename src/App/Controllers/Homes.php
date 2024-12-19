<?php
declare(strict_types=1);
namespace App\Controllers;
use Framework\Controller;
use Framework\Response;

class Homes extends Controller
{
    public function index(): Response
    {
        return $this->view('homes/index.mvc', []);
    }

    public function show(): Response
    {
        return $this->view('homes/show', []); 
    }

    public function register(): Response
    {
        return $this->view('homes/register.mvc', []);
    }

    public function registerNewUser(): Response
    {
        print_r($_POST);
        exit;
        return $this->view('homes/register.mvc', []);
    }

    public function forgotPassword(): Response
    {
        return $this->view('homes/forgot-password.mvc', []);
    }

    public function test()      
    {
        $test = [["uche"=> "emmanuel"], ["favour"=>"chukwudike"]];
        print_r(array_pop($test));
        // echo htmlspecialchars(null ?? 'uche');
        exit;
    }

}