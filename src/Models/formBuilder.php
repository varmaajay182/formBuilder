<?php

namespace Codecrewinfotech\FormBuilder\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formBuilder extends Model
{
    use HasFactory;
    protected $fillable = [
        'formName',
        'key',
        'formId',
        'url',
        'short_code',
        'elements',
    ];
}
