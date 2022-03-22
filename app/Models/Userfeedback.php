<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userfeedback extends Model
{
    use HasFactory;

    protected $table = 'userfeedbacks';
    protected $fillable = [
        'name', 'email', 'phone_number', 'project_date', 'subject', 'message'
    ];
}
