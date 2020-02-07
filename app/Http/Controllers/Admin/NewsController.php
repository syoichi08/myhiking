<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
// 自分投稿記事のみ取得
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function add()
    {
        return view('admin.news.create');
    }
    public function create(Request $request)
    {
      // Varidationを行う
      $this->validate($request, News::$rules);

      $news = new News;
      $form = $request->all();

      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $news->image_path = basename($path);
      } else {
          $news->image_path = null;
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // データベースに保存する
      $news->fill($form);
      // 自分投稿記録のみ取得
      $news->user_id = Auth::id();
      $news->save();

      return redirect('admin/news/create');
  }
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を降順に取得する
          $posts = News::where('title', $cond_title)->orderBy('created_at','desc')->get();
      } else {
          // それ以外はすべてのニュースを降順に取得する
          $posts = News::orderBy('created_at','desc')->get();
      }
      return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  
  // 検索結果詳細画面へのアクセス
  public function detail(Request $request)
  {
      // News Modelからデータを取得する
      $news = News::find($request->id);
      if (empty($news)) {
        abort(404);    
      }
      return view('admin.news.detail', ['news_form' => $news]);
  }
  
  // 自分投稿記録の検索画面へのアクセス
  public function index_edit(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Auth::user()->news->where('title', $cond_title);
      } else {
          // それ以外はすべてのニュースを降順に取得する
          $posts = Auth::user()->news;
      }
      return view('admin.news.index_edit', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  
  
public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $news = News::find($request->id);
      if (empty($news)) {
        abort(404);    
      }
      return view('admin.news.edit', ['news_form' => $news]);
  }

 public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, News::$rules);
      // News Modelからデータを取得する
      $news = News::find($request->id);
      // 送信されてきたフォームデータを格納する
      $news_form = $request->all();
      if (isset($news_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $news->image_path = basename($path);
        unset($news_form['image']);
      } elseif (isset($request->remove)) {
        $news->image_path = null;
        unset($news_form['remove']);
      }
      unset($news_form['_token']);
      // 該当するデータを上書きして保存する
      $news->fill($news_form)->save();

      return redirect('admin/news/index');
  }
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $news = News::find($request->id);
      // 削除する
      $news->delete();
      return redirect('admin/news/');
  }  

}


