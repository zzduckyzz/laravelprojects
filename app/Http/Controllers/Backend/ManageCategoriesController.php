<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories\Categories;
use App\Http\Requests\CategoriesRequest;

class ManageCategoriesController extends Controller
{
    private $activeCate = "active";
    public function __construct(Categories $categories)
    {
        $this->table = $categories;
    }

    /**
     * controller lấy ra danh sách danh mục , kèm tìm kiếm.
     * ở đây controller sẽ gọi tới models Categories
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $viewData = [
            'categories' => $this->table->getListCategories($request),
            'activeCate' => $this->activeCate
        ];
        return view('backend/modules/categories/index', $viewData);
    }

    /**
     * get view thêm mới danh mục
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $activeCate = $this->activeCate;
        return view('backend/modules/categories/add', compact('activeCate'));
    }

    /**
     * hàm  xử lý thêm mới danh mục
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        if($this->table->insertCategories($request)) {
            return redirect()->route('ManageListCategories')->with('success', trans('message_vn.text_create_success'));
        } else {
            return redirect()->back()->with('danger', trans('message_vn.text_create_errors'));
        }
    }



    /**
     * Hiển thị thông tin chỉnh sửa danh mục
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categoies = $this->table::find($id);
        $activeCate = $this->activeCate;
        if(!$categoies) {
            return redirect()->route('ManageListCategories')->with('danger', trans('message_vn.text-empty'));
        }
        return view('backend/modules/categories/edit', compact('categoies', 'activeCate'));
    }

   

    /**
     * cập nhật danh mục sản phẩm
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        //
        if($this->table->updateCategories($request, $id)) {
            return redirect()->back()->with('success', trans('message_vn.text_update-success'));
        } else {
            return redirect()->back()->with('danger', trans('message_vn.text_update-errors'));
        }
    }

    /**
     * Xóa danh mục sản phẩm
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if($this->table->destroyCategories($id)) {
            return redirect()->back()->with('success', trans('message_vn.text_delete-success'));
        } else {
            return redirect()->back()->with('danger', trans('message_vn.text-delete_errors'));
        }
    }

    /*
    * Xóa nhiều danh mục sản phẩm
    * @param $request
    * @return boolean
    */
    public function deleteMultiple(Request $request)
    {
        foreach($request->ids as $id) {
            $this->table->destroyCategories($id);
        }
        return response()->json([
            'ids' => $request->ids
        ]);
    }

    /**
     * cập nhật trạng thái hiển thị trang chủ
     */
    public function updateStatus(Request $request)
    {
        if($this->table->updateCategories($request, $request->id)) {
            return response()->json([
                'success' => trans('message_vn.text_update-success'),
            ]);
        } else {
            return response()->json([
                'errors' => trans('message_vn.text_update-errors'),
            ]);
        }
    }
}
