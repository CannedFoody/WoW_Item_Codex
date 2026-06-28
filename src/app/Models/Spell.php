<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(["class_id", "name", "description", "mana_cost", "cast_time", "global_cd", "cooldown", "school"])]
class Spell extends Model
{
    public function player_class(): BelongsTo
    {
        return $this->belongsTo(PlayerClass::class, "class_id");

    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => intval($this->id),
            'name' => $this->name,
            'description' => $this->description,
            "mana_cost" => $this->mana_cost,
            "cast_time" => $this->cast_time,
            "global_cd" => $this->global_cd,
            "cooldown" => $this->cooldown,
            "school" => $this->school,
            'image' => asset('images/' . $this->image),
        ];
    }
}
