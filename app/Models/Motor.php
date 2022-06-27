<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Motor extends Model
{
    use HasFactory;

    public function detail($a)
    {
        return DB::table('motors')
            ->where('mesin', $a)
            ->first();
    }
    public function motorById($a)
    {
        return DB::table('motors')
            ->where('_id', $a)
            ->first();
    }
}
