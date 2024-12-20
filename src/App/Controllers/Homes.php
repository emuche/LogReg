<?php
declare(strict_types=1);
namespace App\Controllers;
use Framework\Controller;
use Framework\Response;
use App\Models\User;
use Framework\Helpers\Session;
use Framework\Exceptions\PageNotFoundException;
use Framework\Helpers\Redirect;


class Homes extends Controller
{
    public function __construct(private User $usersModel)
    {
    }

    public function index(): Response
    {
        return $this->view('homes/index.mvc', [
            'success' => Session::flash('success')
        ]);
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
        Redirect::post('register');
        $data = [
            'name' => $this->request->post['name'],	
            'email' => $this->request->post['email'],
            'password' => $this->request->post['password'],
            'confirm_password' => $this->request->post['confirm_password']
        ];
        $data = (object)$data;
        $this->usersModel->validateRegistration($data);
        unset($data->confirm_password);
        Session::set('success','Registration successful: Check your email for verification');

       
        if(empty($this->usersModel->getErrors())){
            $data->password = password_hash($data->password, PASSWORD_DEFAULT); 
            if($this->usersModel->insert($data)){
                Session::set('success','Registration successful: Check your email for verification');
                return $this->redirect("");
            }else{
                throw new PageNotFoundException("could not register user");
            }
        }else{
            unset($data->password);
            return $this->view('homes/register.mvc', [
                'errors'=> (object) $this->usersModel->getErrors(),
                'user' => $data
            ]);
        }
    }

    public function forgotPassword(): Response
    {
        return $this->view('homes/forgot-password.mvc', []);
    }

    public function test() : Response  
    {

        
        // always leave this exit line if you will not use template
        exit;
    }

}