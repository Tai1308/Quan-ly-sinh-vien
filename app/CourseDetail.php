<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    protected $table = "course_detail";
    public $timestamps = false;

    public function category()
    {
        return $this->hasOne(category::class, 'id', 'category_id');
    }

    public function students()
    {
        return $this->hasMany(RegisterCourseStudent::class, 'courseId', 'id');
    }
}
