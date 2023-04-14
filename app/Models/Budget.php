<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
    protected $table = 'tbl_budget';
    protected $primaryKey = 'id';
    protected $fillable = ['fld_english_title', 'fld_marathi_title', 'fld_english_description', 'fld_marathi_description'];
}
