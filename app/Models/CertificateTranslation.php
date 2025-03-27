<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateTranslation extends Model
{
    protected $fillable = [
        'cetrificate_id', 'title', 'text', 'short_text', 'meta_title', 'meta_description', 'locale'
    ];
}
