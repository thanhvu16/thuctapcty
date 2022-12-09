<?php

namespace Modules\Admin\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class   CongViec extends Model
{
    use SoftDeletes;

    protected $table = 'cong_viec';




    public function congViecCT()
    {
        return $this->belongsTo(CongViecChiTiet::class, 'id', 'cong_viec_id');
    }
    public function CTcongViec()
    {
        return $this->hasMany(CongViecChiTiet::class, 'cong_viec_id', 'id');
    }
    public function nguoiGiao()
    {
        return $this->belongsTo(User::class, 'nguoi_giao', 'id');
    }
    public function SinhVien()
    {
        return $this->belongsTo(User::class, 'sinh_vien_id', 'id');
    }






}

