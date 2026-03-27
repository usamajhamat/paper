<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class System extends Model
{
    use HasFactory;

    public static function info()
    {
        return DB::table('systems')->first();
    }
    public static function edit($data)
    {
        return DB::table('systems')->update($data);
    }
}
