<?php

namespace App\Models;

use App\Models\SchoolSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignSubject extends Model
{
    use HasFactory;


    public function student_class()
    {

        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }


    public function school_subject()
    {

        return $this->belongsTo(SchoolSubject::class, 'class_id', 'id');
    }



}
