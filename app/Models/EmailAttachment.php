<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'sent_emails_id',
        'original_name',
        'file_name',
        'path',
    ];
}
