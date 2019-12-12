<?php namespace App\Controllers;

class Photos extends BaseController
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

  public function add_album_photos($album_id) {
    $session = session();

    if ($session->logged_in) {
      $data['album_id'] = $album_id;

      helper('form');
      $photosModel = new \App\Models\PhotosModel();

      $request_method =  \Config\Services::request()->getMethod();

    if( $request_method == 'post' && $this->validate([
        'album_id'  => 'required',
        'image' => 'required',   
      ]) ) {
      echo 'here';
    die;

      $images = $this->request->getFile('image');
      echo var_dump($images);
      die;

    }

      echo view('templates/header', $data);
      echo view('photos/add_photos', $data);
      echo view('templates/footer', $data);
    }
  }


    public function save_photos() {
      $session = session();

      if ($session->logged_in) {
        helper('form');
        $photosModel = new \App\Models\PhotosModel();
        $request_method =  \Config\Services::request()->getMethod();

        if($request_method == 'post' && $this->validate([
            'album_id'  => 'required',
          ])) {

           $images = $this->request->getFiles('image');

          if($images = $this->request->getFiles())
          {
             foreach($images['image'] as $img)
             {
                if ($img->isValid() && ! $img->hasMoved())
                {

                     $newName = $img->getRandomName();

                     $photosModel->save([
                      'image' => $newName,
                      'album_id' => $this->request->getVar('album_id'),
                     ]);

          // $cover_photo->move(ROOTPATH.'public/uploads', $cover_photo_file_name);
                     $img->move(ROOTPATH.'public/uploads', $newName);
                }
             }
          }
          // /albums/view_images/(:any)
           return redirect()->to('/photomanager/public/albums/view_images/'.$this->request->getVar('album_id'));
        }

      }
      else {
        // redirect ot login here
      }
    }

    public function delete_photo($image_id) {
      $photosModel = new \App\Models\PhotosModel();
      $photo = $photosModel->find($image_id);
      $album_id = $photo['album_id'];
      $photosModel->delete($image_id);
      $success_message = "Photo successfully deleted";

      return redirect()->to('/photomanager/public/albums/view_images/'.$album_id)->with('success_message', $success_message);
    }


	//--------------------------------------------------------------------

}
