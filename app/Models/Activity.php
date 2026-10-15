<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Activitylog\Models\Activity as BaseActivity;

class Activity extends BaseActivity
{

    protected $table = 'activity_log';



}
