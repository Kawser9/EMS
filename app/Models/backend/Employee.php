<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded=[];
    use HasFactory;


    public function department_name()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }
}
