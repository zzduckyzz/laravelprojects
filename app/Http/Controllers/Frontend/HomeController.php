<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories\Categories;
use App\Models\News\News;

class HomeController extends Controller
{
    //
    public function index() {

        $dataShowHOme =  Categories::select('*')->with([
            'news' => function($news) {
                $news->select('*')->where('status', 2)->limit(6);
            }
        ])->orderBy('id', 'DESC')->get();

        $viewData= [
            'dataShowHOme' => $dataShowHOme,
        ];
        return view('frontend/home/index', $viewData);
    }
}
