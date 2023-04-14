<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use ESolution\DBEncryption\Traits\EncryptedAttribute;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'address', 'mobile'];

     /**
     * The attributes that should be encrypted on save.
     *
     * @var array
     */
    // protected $encryptable = [
    //     'name', 'address', 'mobile'
    // ];
}
