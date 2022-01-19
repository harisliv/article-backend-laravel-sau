<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Faker\Generator;
use Illuminate\Container\Container;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_api()
    {
        $articles = Article::paginate(18);
        return json_encode($articles->items());
    }

    public function article_by_category($category_id)
    {
        $category = $category_id;
        $found = Article::where('category_id', $category)->get();
        return json_encode($found);
    }

    public function index()
    {
        $articles = Article::paginate(5);
        $categories = Category::all();

        return view('articles.index', [
            'articles' => $articles,
            'page_title' => "Articles List",
            "categories" => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', [
            "categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faker = Container::getInstance()->make(Generator::class);

        $request->validate([
            'name' => 'required|unique:articles|max:15'
        ]);
        Article::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'published' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
            'description' => $request->description,
            'image' => $faker->imageUrl($width = 50, $height = 50, 'article'),
        ]);
        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles/show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('articles/edit', [
            'article' => $article, 
            "categories" => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->name = $request->name;
        $article->description = $request->description;
        $article->save();
        // $article->update([
        //     'name' => $request->name,
        //     'description' => $request->description
        // ]);

        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/articles');
    }
}
