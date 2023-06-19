<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapLatLon extends Model
{
    use HasFactory;
    protected $table = 'map_lat_lons';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title', 'english_description', 'marathi_description','tender_date','url','english_pdf', 'marathi_pdf'];

}
