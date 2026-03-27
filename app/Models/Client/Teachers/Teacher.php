<?php

namespace App\Models\Client\Teachers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Teacher extends Model
{
    use HasFactory;

    public static function add($data)
    {
        return DB::table('customers')->insert($data);
    }
    public static function getAll($customerId)
    {
        return DB::table('customers')->where('parent_id',$customerId)->get();
    }

    public static function teacherById($teacherId,$parentId)
    {
        return DB::table('customers')->where(['id'=>$teacherId,'parent_id'=>$parentId])->first();
    }
    public static function remover($teacherId)
    {
        return DB::table('customers')->where('id',$teacherId)->delete();
    }
    public static function edit($teacherId,$data)
    {
        return DB::table('customers')->where('id',$teacherId)->update($data);
    }
    public static function password($teacherId,$data)
    {
        return DB::table('customers')->where('id',$teacherId)->update($data);
    }
}
