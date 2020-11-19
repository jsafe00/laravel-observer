<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description'
    ];

    /**
     *  Get all post data and display 
     */
    public function getAllPost()
    {
        return Post::get();
    }

    /**
     *  Get post data by id and display 
     */
    public function getById($id)
    {
        $post = Post::find($id);

        return $post;
    }

    /**
     * Store post
     */
    public function savePostData(array $data)
    {
        $post = new Post();

        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->save();

        return $post;
      
    }

    /**
     * Update post
     */
    public function updatePostData(array $data, $id)
    {
        $post = Post::find($id);
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->update();

        return $post;
    }

    /**
     * Soft delete post
     */
    public function deleteById($id)
    {
        $post = Post::find($id);
        $post->delete();

        return $post;
    
    }

}
