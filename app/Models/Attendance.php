<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Course;
use App\Models\Attendance;

class Attendance extends Model
{
    use HasFactory;
    

    protected $table = 'attendances';

    protected $fillable = [
        'student_id',
        'course_id',
        'location_id',
    ]; 



    // public function user()
    // {
    //     return $this->belongsTo('User');
    // }

    public function user()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

}
