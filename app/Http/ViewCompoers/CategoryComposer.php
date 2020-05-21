<?php
namespace App\Http\ViewCompoers;
use DB;
use Illuminate\View\View;

class CategoryComposer
{

    public function compose(View $view) {
        $categorys = \DB::table('categories')->where('status', 2)->orderBy('position', 'ASC')->get();
        $view->with('categorys', $categorys);
    }

}