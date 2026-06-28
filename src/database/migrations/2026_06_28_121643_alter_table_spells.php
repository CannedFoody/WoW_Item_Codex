<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table("spells", function (Blueprint $table) {
            $table->foreign("class_id")->references("id")->on("player_class");
        });
    }

    public function down(): void
    {
        Schema::table("spells", function (Blueprint $table) {
            $table->dropForeign("spells_class_id_foreign");
        });
    }
};
