<?php namespace App\Controllers;

class Users extends BaseController
{

	public function index()
	{
   
      // if ( ! is_file(APPPATH.'/Views/pages/login.php'))
      // {
      //     // Whoops, we don't have a page for that!
      //     throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      // }

      // $data['title'] = ucfirst($page); // Capitalize the first letter
      // $data['controller'] = 'pages';
      // $data['page'] = $page;

      // echo view('templates/header', $data);
      // echo view('pages/login', $data);
      // echo view('templates/footer', $data);
	}

  public function user_login() {
    helper('form');
    $usersModel = new \App\Models\UsersModel();
    $request_method =  \Config\Services::request()->getMethod();
    $session = session();
    if($request_method == 'post' && $this->validate([
      'username'  => 'required',
      'password' => 'required'
    ])) {

      $username = $this->request->getVar('username');
      $password = $this->request->getVar('password');
      $user = $usersModel->where('username', $username)->first();

      if(!is_null($user) && password_verify($password, $user['password'])){
        $newdata = [
                'user_id' => $user['id'],
                'username'  => $username,
                'name'     => $user['firstname']." ".$user['lastname'],
                'logged_in' => TRUE
        ];
  
        $session->set($newdata);
        // echo var_dump($session);
        return redirect()->to('/photomanager/public/albums')->with('success_message', "Login Successfully");
      }else{
        $data['error_message'] = "Incorrect username or password";
      }
      
    }
  }
  public function user_signup() { 
    helper('form');
    $usersModel = new \App\Models\UsersModel();
    $request_method =  \Config\Services::request()->getMethod();
      
      if($request_method == 'post' && $this->validate([
        'username'  => 'required',
        'password' => 'required',
        'lastname' => 'required',
        'firstname' => 'required',
      ])) {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $usersModel->save([
        'firstname' => $this->request->getVar('firstname'),
        'lastname' => $this->request->getVar('lastname'),
        'username' => $this->request->getVar('username'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
      ]);

        return redirect()->to('/photomanager/public/')->with('success_message', "Login Successfully");
      }
        $data['title'] = "Signing up";

      echo view('templates/header', $data);
      echo view('pages/signup', $data);
      echo view('templates/footer', $data);
      
      
    }
  

  public function user_logout(){
    $session = session();
    $session->remove(['username', 'name', 'usertype', 'logged_in','user_id']);
    return redirect()->to('/photomanager/public/')->with('success_message', "Logout Successfully");
  }


}
