<?php

namespace App\Observers;

use Log;
use App\Models\Post;

class PostObserver
{

     /**
     * Retrieved observer method
     * 
     */
    public function retrieved(Post $post)
    {
        if($post->title)
        {
            $post->title = $post->title;
        }
        Log::info("==========Observer retrieved========");
    }

     /**
     * Creating observer method
     * 
     */
    public function creating(Post $post)
    {
        if($post->title)
        {
            $post->title = $post->title;

        }
    }

     /**
     * Created observer method
     * 
     */
    public function created(Post $post)
    {
        Log::info("========= Observer Created ==========");
    }

    /**
     * Saving observer method
     * 
     */
    public function saving(Post $post)
    {
        if ($post->title) {
            $post->title = $post->title;
        }
        Log::info("========= Observer saving ==========");
    }

    /**
     * Saved observer method
     * 
     */
    public function saved(Post $post)
    {
        Log::info("========= Observer saved ==========");
    }

    /**
     * Updated observer method
     * 
     */
    public function updated(Post $post)
    {

        Log::info("========= Observer Updated ==========");
    }

    /**
     * Updating observer method
     * 
     */
    public function updating(Post $post)
    {
        if ($post->description) {
            $post->description = $post->description;
        }
        Log::info("========= Observer Updating ==========");
    }
    
     /**
     * Deleting observer method
     * 
     */
    public function deleting(Post $post)
    {

        Log::info("========= Observer deleting ==========");
    }

     /**
     * Deleted observer method
     * 
     */
    public function deleted(Post $post)
    {

        Log::info("========= Observer deleted ==========");
    }
}
