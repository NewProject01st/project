<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubHeaderInfo extends Model
{
    use HasFactory;
    protected $table = 'sub_header_infos';
    protected $primaryKey = 'id';
    protected $fillable = ['english_logo','marathi_logo', 'english_tollfree_title','marathi_tollfree_title','english_tollfree_no','marathi_tollfree_no', 'english_city_title','marathi_city_title','english_city','marathi_city'];

}