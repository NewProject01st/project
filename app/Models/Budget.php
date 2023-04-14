<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
    protected $table = 'budgets';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title', 'english_description', 'marathi_description'];
}
