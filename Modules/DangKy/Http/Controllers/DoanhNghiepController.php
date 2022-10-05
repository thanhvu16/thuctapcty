<?php

namespace Modules\DangKy\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\DoanhNghiep;
use DB;

class DoanhNghiepController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $ten = $request->get('ten_doanh_nghiep');
        $danh_sach = DoanhNghiep::whereNull('deleted_at')
            ->where(function ($query) use ($ten) {
                if (!empty($ten)) {
                    return $query->where(DB::raw('lower(ten_doanh_nghiep)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
                }
            })
            ->paginate(PER_PAGE);
        return view('dangky::doanh-nghiep.index', compact('danh_sach'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dangky::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = new DoanhNghiep();
        $data->ten_doanh_nghiep = $request->ten_doanh_nghiep;
        $data->dia_chi = $request->dia_chi;
        $data->so_dien_thoai = $request->so_dien_thoai;
        $data->save();

        return redirect()->back()->with('success', 'Thêm mới thành công !');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('dangky::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data = DoanhNghiep::where('id',$id)->first();
        return view('dangky::doanh-nghiep.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = DoanhNghiep::where('id', $id)->first();
        $data->ten_doanh_nghiep = $request->ten_doanh_nghiep;
        $data->dia_chi = $request->dia_chi;
        $data->so_dien_thoai = $request->so_dien_thoai;
        $data->save();
        return redirect()->route('doanh-nghiep.index')->with('success', 'Cập nhật thành công !');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data = DoanhNghiep::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công !');
    }
}
