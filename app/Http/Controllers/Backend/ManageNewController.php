<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Http\Requests\NewRequest;


class ManageNewController extends Controller
{
    private $activeNew = "active";

    public function __construct(News $news)
    {
        $this->table = $news;
    }
    /**
     * Lấy danh sách bài viết
     */
    public function index(Request $request)
    {
        //
        $viewData = [
            'news' => $this->table->getListNews($request),
            'categories' => $this->table->getCategoriNew(),
            'query' => '',
            'activeNew' => $this->activeNew
        ];
        return view('backend/modules/news/index', $viewData);
    }

    /**
     * Hiển thị form thêm bài viết
     */
    public function create()
    {
        //
        $viewData = [
            'categories' => $this->table->getCategoriNew(),
            'activeNew' => $this->activeNew
        ];
        return view('backend/modules/news/add', $viewData);

    }

    /**
     * Lưu dữ liệu bài viết vào cơ sở dữ liệu
     *
     */
    public function store(NewRequest $request)
    {
        //
        if($this->table->insertNews($request)) {
            return redirect()->route('ManageListNews')->with('success', trans('message_vn.text_create_success'));
        } else {
            return redirect()->back()->with('danger', trans('message_vn.text_create_errors'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $new = News::find($id);

        if(!$new) {
            return redirect()->route('ManageListNews')->with('danger', trans('message_vn.text-empty'));
        }

        $viewData = [
            'categories' => $this->table->getCategoriNew(),
            'activeNew' => $this->activeNew,
            'new' => $new
        ];
        return view('backend/modules/news/edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewRequest $request, $id)
    {
        //
        if($this->table->updateNews($request, $id)) {
            return redirect()->back()->with('success', trans('message_vn.text_update-success'));
        } else {
            return redirect()->back()->with('danger', trans('message_vn.text_update-errors'));
        }
    }

    /**
     * Xóa bài viết
     *
     */
    public function destroy($id)
    {
        //
        if($this->table->destroyNews($id)) {
            return redirect()->back()->with('success', trans('message_vn.text_delete-success'));
        } else {
            return redirect()->back()->with('danger', trans('message_vn.text-delete_errors'));
        }
    }

    /*
    * Xóa nhiều bài viết
    */
    public function deleteMultiple(Request $request)
    {
        foreach($request->ids as $id) {
            $this->table->destroyNews($id);
        }
        return response()->json([
            'ids' => $request->ids
        ]);
    }
    /*
     * chỉnh sửa trạng thái hiển thị của bài viết
     */

    public function updateStatus(Request $request)
    {

        $checkRole = \Auth::user()->hasRole('Quản trị viên');

        if(!$checkRole) {
            return response()->json([
                'errors' => 'Bạn không có quyền duyệt bài viết',
            ]);
        }

        if($this->table->updateNews($request, $request->id)) {
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
