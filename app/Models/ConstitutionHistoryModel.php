<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstitutionHistoryModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_constitutionHistory';
    protected $primaryKey = 'id';
    protected $fillable = ['fld_english_title', 'fld_marathi_title', 'fld_english_description', 'fld_marathi_description','fld_isDeleted'];
}
