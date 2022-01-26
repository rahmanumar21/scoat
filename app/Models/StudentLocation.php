<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'latitude',
        'longtitude',
        'addressline',
    ]; 

}
