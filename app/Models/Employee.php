<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Employee extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id','nik','full_name','email',
        'gender','position','division','joined_at',
        'phone','birth_date','address','status_employee','base_salary'
    ];

    protected static function booted()
    {
        static::creating(function ($employee){
            if(empty($employee->id)) {
                $employee->id = Str::uuid()->toString();
            }
        });
    }
}
