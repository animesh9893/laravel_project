<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $table="user";
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'last_logged'; 
}
