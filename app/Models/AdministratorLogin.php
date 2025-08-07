<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdministratorLogin extends Model
{
    public function administratorLoginBelongsTo(): BelongsTo
    {
        return $this->belongsTo(Admininistrator::class, "administrator_id");
    }

}
