<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $primaryKey = "employee_id";
    protected $fillable = ["first_name", "last_name","gender","age" ,"division" ,"job_experience"];
}
