<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
       $posts = Post::all();
       foreach ($posts as $post){
           dump($post->title);
       }
       dd('end');
    }

    public function create(){
        $postArr = [
            [
                'title' => 'title from post',
                'content' => 'content from post',
                'image' => 'img.jpeg',
                'likes' => '20',
                'is_published' => '1',
            ],
            [
                'title' => 'another title from post',
                'content' => 'another content from post',
                'image' => 'another img.jpeg',
                'likes' => '33',
                'is_published' => '1',
            ]
        ];

        foreach ($postArr as $item){
            Post::create($item);
        }
        dd('Okok');
    }

    public function update(){
        $post = Post::find(6);
        $post->update([
            'title' => '6another title from post',
            'content' => '6another content from post',
            'image' => '6another img.jpeg',
            'likes' => '66',
            'is_published' => '1',
        ]);
    }

    public function delete(){
        $post = Post::find(6);
        $post->delete();
        dd('del');
    }

    public function firstOrCreate(){
        $post = Post::firstOrCreate([
            'title' => '12ttt'
        ],
        [
            'title' => '13 title from post',
            'content' => '13 content from post',
            'image' => '13 img.jpeg',
            'likes' => '13',
            'is_published' => '0',
        ]);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate(){
        $post = Post::updateOrCreate([
            'title' => '12ttt'
        ],
        [
            'title' => '13 title from post',
            'content' => '13 content from post',
            'image' => '13 img.jpeg',
            'likes' => '13',
            'is_published' => '1',
        ]);
        dump($post->content);
        dd('finished');
    }
}