<?php

namespace Modules\HeThong\Http\Controllers;

use App\Imports\EmailImport;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\DoanhNghiep;
use Modules\Admin\Entities\Khoa;
use Spatie\Permission\Models\Role;
use auth,Excel;

class HeThongController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function taoGiaoVuAdmin()
    {
        $roles = Role::where('name', 'Giáo vụ khoa')->get();
        $danhSachDonVi = null;
        $doanhNghiep = DoanhNghiep::whereNull('deleted_at')->get();
        $khoa = Khoa::all();
        $giangVien = User::role([GIANG_VIEN])->whereNull('deleted_at')->get();
        return view('hethong::tao-giao-vu-admin.create',
            compact('roles', 'danhSachDonVi', 'doanhNghiep', 'khoa', 'giangVien'));
    }

    public function DSGiaoVuAdmin(Request $request)
    {
        $hoTen = $request->get('fullname') ?? null;
        $username = $request->get('username') ?? null;
        $trangThai = $request->get('trang_thai') ?? null;
        $danhSachPhongBan = null;
        $users = User::role([GIAO_VU_KHOA])
            ->where(function ($query) use ($hoTen) {
                if (!empty($hoTen)) {
                    return $query->where('fullname', 'LIKE', "%$hoTen%");
                }
            })
            ->where(function ($query) use ($username) {
                if (!empty($username)) {
                    return $query->where('username', 'LIKE', "%$username%");
                }
            })
            ->where(function ($query) use ($trangThai) {
                if (!empty($trangThai)) {
                    return $query->where('status', $trangThai);
                }
            })
            ->whereNull('deleted_at')
            ->orderBy('id', 'DESC')
            ->paginate(PER_PAGE);

        return view('hethong::tao-giao-vu-admin.index', compact('users', 'danhSachPhongBan'));
    }
    public function taoGiaoVienHD()
    {
        $roles = Role::where('name', 'Giảng viên hướng dẫn')->get();
        $danhSachDonVi = null;
        $doanhNghiep = DoanhNghiep::whereNull('deleted_at')->get();
        $khoa = Khoa::all();
        $giangVien = User::role([GIANG_VIEN])->whereNull('deleted_at')->get();
        return view('hethong::tao-giao-vu-admin.create',
            compact('roles', 'danhSachDonVi', 'doanhNghiep', 'khoa', 'giangVien'));
    }

    public function DSGiaoVienHD(Request $request)
    {
        $hoTen = $request->get('fullname') ?? null;
        $username = $request->get('username') ?? null;
        $trangThai = $request->get('trang_thai') ?? null;
        $danhSachPhongBan = null;
        $users = User::role([GIANG_VIEN])
            ->where(function ($query) use ($hoTen) {
                if (!empty($hoTen)) {
                    return $query->where('fullname', 'LIKE', "%$hoTen%");
                }
            })
            ->where(function ($query) use ($username) {
                if (!empty($username)) {
                    return $query->where('username', 'LIKE', "%$username%");
                }
            })
            ->where(function ($query) use ($trangThai) {
                if (!empty($trangThai)) {
                    return $query->where('status', $trangThai);
                }
            })
            ->whereNull('deleted_at')
            ->orderBy('id', 'DESC')
            ->paginate(PER_PAGE);

        return view('hethong::giang-vien', compact('users', 'danhSachPhongBan'));
    }
    public function DSSV(Request $request)
    {
        $hoTen = $request->get('fullname') ?? null;
        $username = $request->get('username') ?? null;
        $trangThai = $request->get('trang_thai') ?? null;
        $danhSachPhongBan = null;
        $khoa = Khoa::where('giao_vu',auth::user()->id)->first();
        $users = User::role([SINH_VIEN])
            ->where(function ($query) use ($hoTen) {
                if (!empty($hoTen)) {
                    return $query->where('fullname', 'LIKE', "%$hoTen%");
                }
            })
            ->where(function ($query) use ($username) {
                if (!empty($username)) {
                    return $query->where('username', 'LIKE', "%$username%");
                }
            })
            ->where(function ($query) use ($trangThai) {
                if (!empty($trangThai)) {
                    return $query->where('status', $trangThai);
                }
            })
            ->where('khoa_id',$khoa->id)
            ->whereNull('deleted_at')
            ->orderBy('id', 'DESC')
            ->paginate(PER_PAGE);

        return view('hethong::sinh-vien.index', compact('users', 'danhSachPhongBan'));
    }

    public function import(Request $request)
    {
        Excel::import(new EmailImport(), $request->file('file'));
        return redirect()->back()->with('success', 'cập nhật thành công !');
    }

    public function taoSV()
    {
        $roles = Role::where('name', 'Sinh viên')->get();
        $danhSachDonVi = null;
        $doanhNghiep = DoanhNghiep::whereNull('deleted_at')->get();
        $khoa = Khoa::all();
        $giangVien = User::role([GIANG_VIEN])->whereNull('deleted_at')->get();
        return view('hethong::sinh-vien.create',
            compact('roles', 'danhSachDonVi', 'doanhNghiep', 'khoa', 'giangVien'));
    }

    public function taoDoanhNghiep()
    {
        $roles = Role::where('name', 'Doanh nghiệp')->get();
        $danhSachDonVi = null;
        $doanhNghiep = DoanhNghiep::whereNull('deleted_at')->get();
        $khoa = Khoa::all();
        $giangVien = User::role([DOANH_NGHIEP])->whereNull('deleted_at')->get();
        return view('hethong::tao-giao-vu-admin.create',
            compact('roles', 'danhSachDonVi', 'doanhNghiep', 'khoa', 'giangVien'));
    }

    public function DSDoanhNghiep(Request $request)
    {
        $hoTen = $request->get('fullname') ?? null;
        $username = $request->get('username') ?? null;
        $trangThai = $request->get('trang_thai') ?? null;
        $danhSachPhongBan = null;
        $users = User::role([DOANH_NGHIEP])
            ->where(function ($query) use ($hoTen) {
                if (!empty($hoTen)) {
                    return $query->where('fullname', 'LIKE', "%$hoTen%");
                }
            })
            ->where(function ($query) use ($username) {
                if (!empty($username)) {
                    return $query->where('username', 'LIKE', "%$username%");
                }
            })
            ->where(function ($query) use ($trangThai) {
                if (!empty($trangThai)) {
                    return $query->where('status', $trangThai);
                }
            })
            ->whereNull('deleted_at')
            ->orderBy('id', 'DESC')
            ->paginate(PER_PAGE);

        return view('hethong::doanh-nghiep', compact('users', 'danhSachPhongBan'));
    }


    public function phanCong(Request $request)
    {
        $tenNgayNghi = $request->get('ten_ngay_nghi') ?? null;
        $ngayNghi = null;
        $timloaiso = $request->get('ten');


        $listNgayNghi = Khoa::orderBy('id', 'DESC')
            ->where(function ($query) use ($timloaiso) {
                if (!empty($timloaiso)) {
                    return $query->where('ten_khoa', 'Like', "%$timloaiso%");
                }
            })->where('id', auth::user()->khoa_id)->paginate(PER_PAGE);
        $giangVien = User::role([GIANG_VIEN])->whereNull('deleted_at')->get();
        $giaoVu = User::role([GIAO_VU_KHOA])->whereNull('deleted_at')->get();

        return view('hethong::phan-cong', compact('listNgayNghi', 'ngayNghi', 'giangVien', 'giaoVu'));
    }

    public function postphanCong(Request $request, $id)
    {
        $khoa = Khoa::find($id);
        $khoa->giang_vien_hd = $request->giang_vien;
        $khoa->giao_vu = $request->giao_vu;
        $khoa->save();
        //check use
        if ($request->giang_vien) {
            $sv = User::where('khoa_id', $id)->get();
            if (count($sv) > 0) {
                foreach ($sv as $data) {
                    $svd = User::where('id', $data->id)->first();
                    $svd->giang_vien = $request->giang_vien;
                    $svd->save();
                }
            }
        }


        return redirect()->back()->with('success', 'Cập nhật thành công.');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('hethong::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('hethong::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('hethong::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
