<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts',));

//       $category = Category::find(1);
//
//       dd($category->posts);
//        $tag = Tag::find(1);
//        dd($tag->posts);
//       $post = Post::find(2);
//       dd($post->tags);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
//        $postArr = [
//            [
//                'title' => 'title from post',
//                'content' => 'content from post',
//                'image' => 'img.jpeg',
//                'likes' => '20',
//                'is_published' => '1',
//            ],
//            [
//                'title' => 'another title from post',
//                'content' => 'another content from post',
//                'image' => 'another img.jpeg',
//                'likes' => '33',
//                'is_published' => '1',
//            ]
//        ];
//
//        foreach ($postArr as $item) {
//            Post::create($item);
//        }
//        dd('Okok');

    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|string', // или 'image|mimes:jpeg,png|max:2048' для файлов
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id', // Проверяем каждый ID тега
        ]);
        //        $tags = $validated['tags'];
//        unset($validated['tags']);
//        $post = Post::create($validated);
//
//        $post->tags()->attach($tags);
//
//        return redirect()->route('post.index');

        // Создаём пост, исключая теги
        $post = Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => $validated['image'],
            'category_id' => $validated['category_id'],
        ]);

        // Прикрепляем теги (если они есть)
        if (!empty($validated['tags'])) {
            $post->tags()->attach($validated['tags']);
        }

        return redirect()->route('post.index');
    }



    public function show(Post $post)
    {

        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        // 1. Валидация данных
        $validatedData = request()->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id' // Проверяем каждый ID тега
        ]);

      $tags = $validatedData['tags'];
      unset($validatedData['tags']);
      $post->update($validatedData);
      $post->tags()->sync($tags);
        // 4. Перенаправляем на страницу поста
        return redirect()->route('post.show', $post->id);
    }
//    public function update()
//    {
//        $post = Post::find(6);
//        $post->update([
//            'title' => '6another title from post',
//            'content' => '6another content from post',
//            'image' => '6another img.jpeg',
//            'likes' => '66',
//            'is_published' => '1',
//        ]);
//    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }


//    public function delete()
//    {
//        $post = Post::find(6);
//        $post->delete();
//        dd('del');
//    }

    public function firstOrCreate()
    {
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

    public function updateOrCreate()
    {
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
