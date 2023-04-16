<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentEmails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'body', 'title', 'send_datetime', 'email_template_id'
    ];
}
