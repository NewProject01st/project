<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisasterManagementNews extends Model
{
    use HasFactory;
    protected $table = 'disaster_management_news';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title','english_description', 'marathi_description','english_url','disaster_date','english_image','marathi_image'];
}