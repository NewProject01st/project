<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictDisasterManagementPlan extends Model
{
    
    use HasFactory;
    protected $table = 'district_disaster_management_plans';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title', 'english_description', 'marathi_description','english_image', 'marathi_image'];
}