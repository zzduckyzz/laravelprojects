<?php
namespace App\Http\ViewCompoers;
use DB;
use Illuminate\View\View;
use App\Models\News\News;

class HotComposer
{

    public function compose(View $view) {

        $newHot = News::select('id', 'title')->where('status', 2)->where('hot', 1)->orderBy('created_at', 'DESC')->limit(10)->get();
        $newNews = News::select('id', 'title')->where('status', 2)->orderBy('view', 'DESC')->limit(10)->get();

        $dataNewView = [
            'newHot' => $newHot,
            'newNews' => $newNews
        ];

        $view->with('dataNewView', $dataNewView);
    }

}