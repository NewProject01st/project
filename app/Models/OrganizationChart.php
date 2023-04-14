<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationChart extends Model
{
    use HasFactory;
    protected $table = 'tbl_organization_chart';
    protected $primaryKey = 'id';
    protected $fillable = ['fld_english_title', 'fld_marathi_title', 'fld_english_image', 'fld_marathi_image'];
}
