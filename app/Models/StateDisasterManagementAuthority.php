<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateDisasterManagementAuthority extends Model
{
    use HasFactory;
    protected $table = 'state_disaster_management _authority';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title', 'english_image', 'marathi_image'];
}
