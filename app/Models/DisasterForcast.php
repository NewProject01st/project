<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisasterForcast extends Model
{
    use HasFactory;
    protected $table = 'disaster_forcast';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title', 'english_description', 'marathi_description','forcast_date','expired_date','english_image','marathi_image', 'english_pdf', 'marathi_pdf'];
}
