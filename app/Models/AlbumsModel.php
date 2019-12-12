<?php namespace App\Models;
use CodeIgniter\Model;

class AlbumsModel extends Model
{
    protected $table = 'albums';
    protected $allowedFields = ['title','user_id'];
}