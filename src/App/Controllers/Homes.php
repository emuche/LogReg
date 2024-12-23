<?php
declare(strict_types=1);
namespace App\Controllers;
use Framework\Controller;
use Framework\Response;
use App\Models\User;
use Framework\Helpers\Session;
use Framework\Exceptions\PageNotFoundException;
use Framework\Helpers\Redirect;
use Framework\Helpers\Auth;


class Homes extends Controller
{
    public function __construct(private User $usersModel)
    {
    }

    public function index(): Response
    {
        Auth::passRedirect("/dashboard");
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
        Auth::passRedirect('/dashboard');
        return $this->view('homes/register.mvc', []);
    }

    public function registerNewUser(): Response
    {
        Redirect::post('/register');
        $data = [
            'name' => $this->request->post['name'],	
            'email' => $this->request->post['email'],
            'password' => $this->request->post['password'],
        ];
        $data = (object)$data;
        $this->usersModel->validateRegistration($data);

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

    public function logInUser(): Response
    {
        Redirect::post('');
        $data = [
            'email' => $this->request->post['email'],
            'password' => $this->request->post['password'],
        ];
        $data = (object)$data;
        
        $this->usersModel->validateLogIn($data);
        if(empty($this->usersModel->getErrors())){
            $user = $this->usersModel->login($data); 
            if(!empty($user)){
                Auth::login($user);
                $page = Auth::returnPage();
                if(!empty($page)){
                    Redirect::to($page);
                }else{
                    Session::set('success','Login successful');
                    return $this->redirect("dashboard");
                }
            }else{
                throw new PageNotFoundException("could not login user");
            }
        }else{
            unset($data->password);
            return $this->view('homes/index.mvc', [
                'errors'=> (object) $this->usersModel->getErrors(),
                'user' => $data
            ]);
        }
    }

    public function logOutUser(): Response
    {
        Auth::logout();
        Session::set('success', 'You have logged out Successfully');
        Redirect::to('');
    }

    public function forgotPassword(): Response
    {
        return $this->view('homes/forgot-password.mvc', []);
    }

    public function recoverAccount(): Response
    {
        Redirect::post('/forgot-password');
        $data = [
            'email' => $this->request->post['email'],
        ];
        $data = (object)$data;
        $this->usersModel->validateRecoverAccount($data->email);
        if(empty($this->usersModel->getErrors())){
            if($this->usersModel->resetAccount($data->email)){
                Session::set('success','recovery has been sent to your email');
                return $this->redirect("");
            }else{
                throw new PageNotFoundException("could find user");
            }
        }else{
            return $this->view('homes/forgot-password.mvc', [
                'errors'=> (object) $this->usersModel->getErrors(),
                'user' => $data
            ]);
        }
    }

    public function aboutUs(): Response
    {
        Auth::failRedirect();
        return $this->view('homes/about-us.mvc', []);
    }

    public function contactUs(): Response
    {
        return $this->view('homes/contact-us.mvc', []);
    }

    public function e404(): Response
    {
        return $this->view('404.mvc', []);
    }

    public function e500(): Response
    {
        return $this->view('500.mvc', []);
    }

    public function test() : Response  
    {
        $var1 = true;
        $var2 = true;
        echo $var1 && $var2 ? 'yes' : 'no';

        
        // always leave this exit line if you will not use template
        exit;
    }

}