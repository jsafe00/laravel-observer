<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var post
     */
    protected $post;

    /**
     * PostController Constructor
     *
     * @param Post $post
     *
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = ['status' => 200];

        try{
            $result['data'] = $this->post->getAllPost();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only ([
            'title',
            'description'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->post->savePostData($request->all());
        } catch(Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->post->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

     /**
     * Update post.
     *
     * @param Request $request
     * @param id
     * @return \Illuminate\Http\Response
     */
    public  function update(Request $request, $id)
    {
        $data = $request->only([
            'title',
            'description'
        ]);

        $result = ['status' => 200];

        try{
            $result['data'] = $this->post->updatePostData($data, $id);
        } catch(Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = Post::findOrFail($id)->delete();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result = [
            'data' => $result
        ]);
    }

}
