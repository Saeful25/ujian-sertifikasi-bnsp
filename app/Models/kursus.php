<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kursus extends Model
{
    use HasFactory;
    protected $table = 'kursus';
    public function Course() {
        return $this->hasMany(Course::class,'kursus_id','id');
    }
}
