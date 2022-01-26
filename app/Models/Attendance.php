<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Attendance extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'student_id',
        'course_id',
        'location_id',
    ]; 

    public function user()
    {
        return $this->belongsTo('User');
    }

}
