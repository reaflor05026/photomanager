<?php namespace App\Controllers;

class Pages extends BaseController
{

	public function index()
	{
   
      if ( ! is_file(APPPATH.'/Views/pages/login.php'))
      {
          // Whoops, we don't have a page for that!
          throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      }

      $data['title'] = ucfirst($page); // Capitalize the first letter
      $data['controller'] = 'pages';
      $data['page'] = $page;

      echo view('templates/header', $data);
      echo view('pages/login', $data);
      echo view('templates/footer', $data);
	}

	//--------------------------------------------------------------------

}
