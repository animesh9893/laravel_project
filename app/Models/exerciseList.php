<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exerciseList extends Model
{
    use HasFactory;
    public $table="exercise_list";
    public $timestamps = false;
}
