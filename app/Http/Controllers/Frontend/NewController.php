<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News\News;

class NewController extends Controller
{
    //
    public function newCategory($slug, $id)
    {
        $news = News::with('categories')->where('categori_id', $id)->where('status', 2)->orderBy('id', 'DESC')->paginate(NUMBER_PAGE);

        $viewData = [
            'news' => $news,
            'slug' => $slug
        ];

        return view('frontend/catagories-post/index', $viewData);
    }

    public function detailNews($slug, $id)
    {
        $new = News::with(['categories', 'user'])->where('id', $id)->first();
        $view = $new->view + 1;
        News::find($id)->update(['view' => $view]);
        $news = News::with('categories')->where('categori_id', $new->categories->id)->where('status', 2)->orderBy('id', 'DESC')->limit(6)->get();
        $viewData = [
            'new' => $new,
            'slug'  => safeTitle($new->categories->name),
            'news' => $news
        ];
        return view('frontend/news/index', $viewData);
    }

    public function search(Request $request)
    {

        $news = News::with('categories')->where('title','like','%'.$request->search.'%')->get();

        $viewData = [
            'news' => $news,
            'keys' => $request->search
        ];
        return view('frontend/search/index', $viewData);
    }
}
