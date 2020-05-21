<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\HelpersFun;
use Carbon\Carbon;
use App\Models\Product\Product;
use App\Models\News\News;


class Categories extends Model
{
    // khai báo tên bảng dữ liệu
    protected  $table = 'categories';
    //
    protected $fillable = [
        'name', 'position', 'icon', 'status', 'created_at','updated_at'
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'categori_id', 'id');
    }

    /*
     * Lấy danh sách thông tin danh mục
     */
    public function  getListCategories($req)
    {
        $categories = $this->select('*');
        if($req->name) {
            $categories = $categories->where('name','like','%'.$req->name.'%');
        }
        $categories = $categories->orderBy('id','DESC')->paginate(NUMBER_PAGE);

        return $categories;
    }
    /*
     * Thêm danh mục
     * @param array data
     * @return boolean
     */
    public function insertCategories($req)
    {

        // loại bỏ trườn _token
        $dataCate = $req->except('_token');
        
        $dataCate['created_at'] = Carbon::now();
        $dataCate['updated_at'] = Carbon::now();
        try {
            $this->insert($dataCate);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    /*
     * cập nhật danh mục sản phẩm
     */

    public function  updateCategories($req, $id)
    {
        $dataCate = $req->except('_token', 'id');
        $categories = $this->find($id);
        if(!$categories) {
            return false;
        }
        $dataCate['updated_at'] = Carbon::now();
        // lấy đường dẫn hình ảnh
        try {
            $categories->update($dataCate);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /*
     * Xóa danh mục sản phẩm
     */
    public function destroyCategories($id)
    {
        $categories = $this->find($id);
        if(!$categories) {
            return false;
        }
        try {
            $categories->delete(['id'=>$id]);
            return true;
        } catch (\Exception $e) {
            return false;
        }

    }
}
