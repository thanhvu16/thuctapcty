<?php

namespace Modules\Admin\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Khoa extends Model
{

    protected $table = 'khoa';

    public function giaoVuKhoa()
    {
        return $this->belongsTo(User::class, 'giao_vu', 'id');
    }
}

