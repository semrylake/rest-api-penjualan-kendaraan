<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Mobil extends Model
{
    use HasFactory;
    public function detail($a)
    {
        return DB::table('mobils')
            ->where('mesin', $a)
            ->first();
    }
}
