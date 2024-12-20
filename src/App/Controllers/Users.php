<?php
declare(strict_types=1);
namespace App\Controllers;
use App\Models\User;
use Framework\Controller;
use Framework\Exceptions\PageNotFoundException;
use Framework\Response;

class Users extends Controller
{
    public function __construct(private User $usersModel)
    {
    }

    public function index(): Response         
    {
        $users = $this->usersModel->findAll();
        $total = $this->usersModel->rowCount();

        return $this->view('users/index.mvc', [
            "total" => $total,
            "users" => $users,
        ]);

    }

    public function word(string $word): Response
    {
        echo $word;
        exit;
    }

    public function show(string $id): Response
    {
        $user = $this->getUser($id);
        return $this->view('users/show.mvc', [
            "user" => $user
        ]);
    }

    public function showPage(string $title, string $id, string $page): Response           
    {
        return $this->view('users/showpage', [
            "title" => $title,
            "id" => $id,
            "page" => $page
        ]);
    }

    public function register(): Response
    {
        return $this->view('users/register.mvc', []);
    }

    public function emailExists($email)
    {
        $exists = $this->usersModel->fieldValueExists('email', $email);
        if($exists){
            echo "this email is already taken";
        }else{
            echo "this email is available";
        }
    }
    public function usernameExists($username)
    {
        $exists = $this->usersModel->fieldValueExists('username', $username);
        if($exists){
            echo "this username is already taken";
        }else{
            echo "this username is available";
        }
    }

    public function profile($username)
    {
        
        $field = match(true) {
            is_numeric($username) => "id",
            filter_var($username, FILTER_VALIDATE_EMAIL) ? true : false => "email",
            default => "username"
        };   
        
        $exists = $this->usersModel->fieldValueExists($field, $username);
        if($exists){
            echo "Am unavailabe";
        }else{
            echo "Make una tell am to call me";
        }

    }
   
    public function create(): Response
    {
        $data = [
            'name' => $this->request->post['name'],	
            'email' => $this->request->post['email']
        ];

        if($this->usersModel->insert($data)){
            return $this->redirect("users/show/{$this->usersModel->getInsertid()}");
        }else{
           
            return $this->view('users/register.mvc', [
                'errors' => $this->usersModel->getErrors(),
                'user' => (object) $data
            ]);
        }
    }
    public function edit(string $id): Response
    {
        $user = $this->getUser($id);
       
        return $this->view('users/edit.mvc', [
            "user" => $user
        ]);
    }

    public function update(string $id): Response
    {
        $user = $this->getUser($id);
        $user->name = $this->request->post['name'];
        $update = $this->request->post;
        

        if($this->usersModel->updateRow($id, $update)){
            header("Location: {$_ENV['URL_ROOT']}/users/show/{$id}");
            exit;
        }else{
            return $this->view('users/edit.mvc', [
                'user' => $user,
                'errors' => $this->usersModel->getErrors()
            ]);
        }
    }

    public function getUser(string $id): array|object
    {
        $user = $this->usersModel->find($id);

        if($user === false){
            throw new PageNotFoundException("User Not found");
        }
        return $user;
    }
    
    public function destroy(string $id): Response
    {
        $this->getUser( $id);
        $this->usersModel->deleteRow($id);
        header("Location: {$_ENV['URL_ROOT']}/users/index");
        exit;
    }

    public function delete(string $id): Response
    {
        $user = $this->getUser($id);
        return $this->view('users/delete.mvc', [
            "user" => $user
        ]);
    }

    public function responseCodeExample(): Response
    {
        $this->response->setStatusCode(451);
        $this->response->setBody("Unavailable for legal reasons");
        return $this->response;
    }
}