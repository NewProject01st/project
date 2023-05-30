<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubHeaderInfo extends Model
{
    use HasFactory;
    protected $table = 'sub_header_infos';
    protected $primaryKey = 'id';
    protected $fillable = ['logo','english_tollfree_no','marathi_tollfree_no','english_city','marathi_city'];

}