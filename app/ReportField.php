<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportField extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'field',
        'title',
        'description',
        'isEnabled',
        'reportType_id'
    ];
}
