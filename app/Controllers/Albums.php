<?php namespace App\Controllers;

class Albums extends BaseController
{

	public function index()
	{
    $session = session();
    if ($session->logged_in) {
      if ( ! is_file(APPPATH.'/Views/albums/albums.php'))
      {
          // Whoops, we don't have a page for that!
          throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      }
      $albumsModel = new \App\Models\AlbumsModel();
      $photosModel = new \App\Models\PhotosModel();
      $last_album = $albumsModel->where('user_id',$session->user_id)->orderBy('id','desc')->first();
      $photos = $photosModel->where('album_id',$last_album['id'])->findAll();
      $albums = $albumsModel->where('user_id',$session->user_id)->findAll();

      // echo var_dump($photos);die;
      $data['photos'] = $photos;
      $data['title'] = ucfirst($page); // Capitalize the first letter
      $data['albums'] = $albums;

      echo view('templates/header', $data);
      echo view('albums/albums', $data);
      echo view('templates/footer', $data);
     
    }
    else {
        return redirect()->to('/photomanager/public');
    }
	}

  public function create_album()
  {
    $session = session();
    if ($session->logged_in) {
      helper('form');
      $albumsModel = new \App\Models\AlbumsModel();
      $req_method = \Config\Services::request()->getMethod();

       if($req_method == 'post' && $this->validate([
      'title' => 'required',
        ])) {
        $albumsModel->save([
          'title' => $this->request->getVar('title'),
          'user_id' => $session->user_id,
        ]);

        $last_album = $albumsModel->where('user_id',$session->user_id)->orderBy('id','desc')->first();
        return redirect()->to('/photomanager/public/photos/add_album_photos/'.$last_album['id'])->with('success_message', "Add photos to this album");
       }

      $data['title'] = "Create Album";

      echo view('templates/header', $data);
      echo view('albums/create_album', $data);
      echo view('templates/footer', $data);


    }
  }


  public function view_images($album_id) {
     $data['title'] = "View Album Images";
     $session = session();
     $albumsModel = new \App\Models\AlbumsModel();
     $photosModel = new \App\Models\PhotosModel();
     $album = $albumsModel->where('user_id',$session->user_id)->find($album_id);
     $photos = $photosModel->where('album_id',$album['id'])->findAll();;
    // echo  var_dump($photos);die;
     $data['album'] = $album;
     $data['photos'] = $photos;

      echo view('templates/header', $data);
      echo view('albums/view_album_images', $data);
      echo view('templates/footer', $data);
  }



	//--------------------------------------------------------------------

}
