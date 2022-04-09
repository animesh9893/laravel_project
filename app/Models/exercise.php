<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exercise extends Model
{
    use HasFactory;
    public $table="exercise";
    const CREATED_AT = 'started';
    const UPDATED_AT = 'ended'; 
}
