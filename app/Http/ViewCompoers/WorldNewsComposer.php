<?php
namespace App\Http\ViewCompoers;
use DB;
use Illuminate\View\View;
use App\Models\News\News;

class WorldNewsComposer
{

    public function compose(View $view) {
        $dataNew = News::select('*')->with('categories')->where('status', 2)->orderBy('created_at', 'DESC')->limit(10)->get();
        $view->with('dataNew', $dataNew);
    }

}