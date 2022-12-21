<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Admin\Entities\BaiViet;
use Modules\Admin\Entities\Khoa;
use Modules\Admin\Entities\NguonTin;
use Modules\Admin\Entities\DonVi;
use Modules\Admin\Entities\ToChuc;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    CONST TRANG_THAI_HOAT_DONG = 1;
    protected $fillable = [
        'username',
        'email',
        'ho_ten',
        'gioi_tinh',
        'ngay_sinh',
        'ma_nhan_su',
        'anh_dai_dien',
        'cmnd',
        'trinh_do',
        'so_dien_thoai',
        'so_dien_thoai_ky_sim',
        'don_vi_id',
        'chuc_vu_id',
        'role_id',
        'chu_ky_chinh',
        'chu_ky_nhay',
        'trang_thai',
        'uu_tien',
        'cap_xa',
        'doanh_nghiep'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'password_email',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function checkRole()
    {
        $role = Role::findById($this->role_id);

        if ($role->name == QUAN_TRI_HT) {
            return true;
        }

        return false;

    }
    public function donVi()
    {
        return $this->belongsTo(ToChuc::class, 'don_vi_id', 'id')
            ->select('id', 'ten_don_vi', 'ten_viet_tat', 'dieu_hanh', 'nhom_don_vi', 'cap_xa', 'ma_hanh_chinh', 'parent_id');
    }
    public function Khoa()
    {
        return $this->belongsTo(Khoa::class, 'khoa_id', 'id');
    }
    public function SoBaiViet($id)
    {
        $baViet = BaiViet::where('nguoi_dang', $id)->count();
        return $baViet;
    }

}
