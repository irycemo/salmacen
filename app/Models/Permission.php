<?php

namespace App\Models;

use App\Traits\ModelosTrait;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use ModelosTrait;
}
