<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pqrs extends Model
{
    use HasFactory;

    public function search() {
        $pqrs = DB::table('QUEJAS')->get()->where("CONSECUTIVO", '2973');
        
        return $pqrs;
    }
}
