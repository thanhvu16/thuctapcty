<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Khoa;

class KhoaController extends \Illuminate\Routing\Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */


    public function index(Request $request)
    {
        $id = (int)$request->get('id');
        $tenNgayNghi = $request->get('ten_ngay_nghi') ?? null;
        $ngayNghi = null;
        $timloaiso = $request->get('ten');
        if ($id) {
            $ngayNghi = Khoa::findOrFail($id);
        }


        $listNgayNghi = Khoa::orderBy('id', 'DESC')
            ->where(function ($query) use ($timloaiso) {
                if (!empty($timloaiso)) {
                    return $query->where('ten_khoa', 'Like', "%$timloaiso%");
                }
            })->paginate(PER_PAGE);

        return view('admin::khoa.index', compact('listNgayNghi', 'ngayNghi'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $ngayNghi = new Khoa();
        $ngayNghi->ten_khoa = $request->ten;
        $ngayNghi->save();

        return redirect()->back()->with('success', 'Thêm mới thành công.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $ngayNghi = Khoa::findOrFail($id);
        $ngayNghi->ten_khoa = $request->ten;
        $ngayNghi->save();

        return redirect()->route('khoa.index')->with('success', 'Cập nhật thành công.');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $ngayNghi = Khoa::findOrFail($id);

        if ($ngayNghi) {
            $ngayNghi->delete();
        }

        return redirect()->back()->with('success', 'Xoá thành công.');
    }

}
