<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Letter;
use App\Models\ArticleImage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use function Psy\debug;
use DB;

class ArticleController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$articles = Article::where('user_id', $request->user()->id)->get();
        $articles = Article::name($request->get('nombre'))->where('user_id', $request->user()->id)->get();
        $count = $articles->count();
        
        return view('admin.articles.index', [ 'articles' => $articles , 'count' => $count ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Letter $letter)
    {
        return view('admin.articles.create', [ 'letter' => $letter]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article([
            'article_title' => $request->input('article_title'),
            'article_author' => $request->user()->firstname . " " . $request->user()->lastname,
            'article_keywords' => 'keywords',
            'article_content' => $request->input('article_content'),
            'article_bibliography' => 'bibliografia',
            'user_id' => $request->user()->id
        ]);

        $article->save();
        
        return redirect(route('admin.articles.index'))->with([ 'message' => 'Articulo creado exitosamente!', 'alert-type' => 'success' ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where('id', $id)->first();
        $author = User::where('id', $article->user_id)->first();
        $name = $author->firstname . $author->lastname;
        return view('admin.articles.show', [ 'article' => $bulletin, 'article' => $name]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = DB::table('articles')->where('id', $id)->first();

        return view('admin.articles.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {   
        $input = $request->all();

        $article->update($input);
        
        return redirect(route('admin.articles.index'))->with([ 'message' => 'Articulo modificado exitosamente!', 'alert-type' => 'success' ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect(route('admin.articles.index'))->with([ 'message' => 'Articulo eliminado exitosamente!', 'alert-type' => 'danger' ]);
    }
}
