<?php

namespace App\Models;

use App\Traits\ModelosTrait;
use Spatie\Permission\Models\Role as SpatieRole;


class Role extends SpatieRole
{
    use ModelosTrait;
}
