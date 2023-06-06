<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteContact extends Model
{
    use HasFactory;
    protected $table = 'website_contacts';
    protected $primaryKey = 'id';
    protected $fillable = ['address_english_title', 'address_marathi_title', 'english_address', 'marathi_address','email_title','email', 'contact_english_title', 'contact_marathi_title','english_contact','marathi_contact'];
}