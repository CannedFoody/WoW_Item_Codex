<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(["class_id", "name", "description", "mana_cost", "cast_time", "global_cd", "cooldown", "school"])]
class Spell extends Model
{
    public function player_class(): BelongsTo {
        return $this->belongsTo(PlayerClass::class, "class_id");
    }
}
