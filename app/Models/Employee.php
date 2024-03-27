<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone_number',
        'position',
        'start_date',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
