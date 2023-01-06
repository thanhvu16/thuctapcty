<?php

namespace App\Imports;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Spatie\Permission\Models\Role;

class EmailImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
//        $mai = MailNgoaiThanhPho::all();
//        foreach ($mai as $row1) {
//
//        }
        foreach ($collection as $row) {

            if($row['ma_sinh_vien'] != null)
            {
                $checkKhoi = new User();
                $checkKhoi->username = $row['ma_sinh_vien'];
                $checkKhoi->ma_sv = $row['ma_sinh_vien'];
                $checkKhoi->password = \Hash::make($row['ma_sinh_vien']);
                $checkKhoi->fullname = $row['ten_sinh_vien'];
//                $checkKhoi->birthday = $row['email'];
                $checkKhoi->email = $row['email'];
                $checkKhoi->role_id = 13;
                $checkKhoi->status = 1;
                $checkKhoi->khoa_id = \auth::user()->khoa_id;
                $checkKhoi->save();

                $role = Role::findById(13);
                $checkKhoi->assignRole($role->name);
                $permissions = $role->permissions->pluck('name')->toArray();
                $checkKhoi->syncPermissions($permissions);
            }




        }
//        dd('done!');
    }
}
