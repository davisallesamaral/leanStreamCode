<?php namespace leanStreamTest\Http\Controllers;
use Illuminate\Support\Facades\DB;
use leanStreamTest\Source;
use leanStreamTest\Article;
class torontoNewsController  extends Controller {

    public function list(){
        $articles = Article::whereNotNull('author')->get();
        return  view('torontoNews.list')->with('articles', $articles)->with('sources', Source::all());
    }


    public function listJson(){
        $articles = Article::all();
        
        return response()->json($articles);
    }


    public function viewArticle($id){
        $article = Article::find($id);
        if(empty($article)) {
            return "This news not exist anymore!";
        }
        return view('torontoNews.article')->with('p', $article)->with('sources', Source::all());
    }

}