<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'lecturer_id',
        'course',
        'course_url_link',
        'time_start',
        'time_end',
    ]; 

}
