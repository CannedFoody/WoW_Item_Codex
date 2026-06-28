<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlayerClass extends Model
{
    protected $table = "player_class";

    public function spells(): HasMany {
        return $this->hasMany(Spell::class);
    }
}
