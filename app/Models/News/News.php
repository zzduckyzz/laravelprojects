<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\HelpersFun;
use Carbon\Carbon;
use App\Models\Categories\Categories;
use App\Models\Users\User;
use Illuminate\Support\Facades\Auth;


class News extends Model
{
    //
    protected $table = 'news';

    protected $fillable = [
        'title', 'categori_id', 'user_id', 'password','meta_key','site_title','meta_desc', 'image_preview', 'image_banner',
        'status', 'view', 'hot', 'content', 'created_at','updated_at'
    ];

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categori_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /*
     * Hiển thị danh sách bài viết
     */

    public function getListNews($req)
    {
        $checkRoleAdmin = \Auth::user()->hasRole('Quản trị viên');

        $idUser = Auth::user()->id;
        $query = $this->select('id', 'title', 'image_preview', 'view', 'status', 'categori_id', 'user_id')->with(['categories', 'user']);

        if(!$checkRoleAdmin) {
            $query = $query->where('user_id', $idUser);
        }
        if($req->title) {
            $query = $query->where('title','like','%'.$req->title.'%');
        }
        if($req->categori_id) {
            $query = $query->where('categori_id', $req->categori_id);
        }
        if($req->status) {
            $query = $query->where('status', $req->status);
        }

        return $news = $query->orderBy('id', 'DESC')->paginate(NUMBER_PAGE);
    }
    /*
     * Thêm mới bài viết
     */

    public function insertNews($req)
    {
        $dataNews = $req->except('_token', 'images');
        $dataNews['created_at'] = Carbon::now();
        $dataNews['updated_at'] = Carbon::now();
        $dataNews['status'] = STATUS_LOCKED;
        $dataNews['user_id'] = Auth::user()->id;
        // lấy đường dẫn hình ảnh
        if($req->hasFile('images')) {
            $image_preview = HelpersFun::saveImage($req->file('images'), 'news', ['width' => 200, 'height' => 150]);
            $image_banner = HelpersFun::saveImage($req->file('images'), 'news', ['width' => 730, 'height' => 353]);
            if(!$image_preview) {
                return false;
            }
            $dataNews['image_preview'] = $image_preview;
            $dataNews['image_banner'] = $image_banner;
        }
        try {
            $this->insert($dataNews);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /*
     * Chỉnh sửa bài viết
     */
    public function updateNews($req, $id)
    {
        $dataNews = $req->except('_token', 'images', 'id');
        $dataNews['updated_at'] = Carbon::now();
        $news = $this->find($id);
        if(!$news) {
            return false;
        }
        if($req->hasFile('images')) {
            HelpersFun::deleteImage($news->image_preview);
            HelpersFun::deleteImage($news->image_banner);
            $image_preview = HelpersFun::saveImage($req->file('images'), 'news', ['width' => 200, 'height' => 150]);
            $image_banner = HelpersFun::saveImage($req->file('images'), 'news', ['width' => 700, 'height' => 260]);
            if(!$image_preview) {
                return false;
            }
            $dataNews['image_preview'] = $image_preview;
            $dataNews['image_banner'] = $image_banner;
        }
        try {
            $news->update($dataNews);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /*
     * Xóa bài viết
     */
    public function destroyNews($id)
    {
        $news = $this->find($id);
        HelpersFun::deleteImage($news->image_preview);
        HelpersFun::deleteImage($news->image_banner);
        if(!$news) {
            return false;
        }
        try {
            $news->delete(['id'=>$id]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    /*
     * lấy ra danh mục tin tức
     */

    public function getCategoriNew()
    {
        return Categories::select('id', 'name')->get();
    }
}
