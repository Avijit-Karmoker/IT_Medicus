<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['employee_name', 'company', 'email', 'phone_no'];

    function relationshipwithcompany(){
        return $this->hasOne(Companies::class, 'id', 'company');
    }
}
