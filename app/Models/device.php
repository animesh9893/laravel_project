<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class device extends Model
{
    use HasFactory;
    public $table="device";
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'last_logged'; 
}
