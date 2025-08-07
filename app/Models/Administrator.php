<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    public function admininistratorHasOne(): HasOne
  {
     return $this->hasOne(Admin::class, "administrator_id");
  }
}
