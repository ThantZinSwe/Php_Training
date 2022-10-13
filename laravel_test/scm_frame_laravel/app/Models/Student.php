<?php

namespace App\Models;

use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['student_name', 'major_id', 'age', 'phone'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
