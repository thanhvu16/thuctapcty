<?php

namespace Modules\Admin\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nganh extends Model
{

    protected $table = 'nganh';
    public function khoaID()
    {
        return $this->belongsTo(Khoa::class, 'khoa_id', 'id');
    }
    public function giaoVu()
    {
        return $this->belongsTo(User::class, 'giao_vu', 'id');
    }
}

