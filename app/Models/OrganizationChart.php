<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationChart extends Model
{
    use HasFactory;
    protected $table = 'organization_chart';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title', 'english_image', 'marathi_image'];
}
