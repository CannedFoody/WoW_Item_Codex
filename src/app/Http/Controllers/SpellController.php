<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlayerClass;
use App\Models\Spell;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Http\Requests\SpellRequest;

class SpellController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            "auth",
        ];
    }

    public function list(): View
    {
        $items = Spell::with("player_class")->orderBy("name", "asc")->get();

        return view(
            "spell.list",
            [
                "title" => "Spells",
                "items" => $items
            ]
        );
    }

    public function create(): View
    {
        $classes = PlayerClass::orderBy("name", "asc")->get();

        return view(
            "spell.form",
            [
                "title" => "Add a spell",
                "spell" => new Spell(),
                "classes" => $classes,
            ]
        );
    }
    // $table->foreignId("class_id");
    // $table->string("name", 256);
    // $table->text("description")->nullable();
    // $table->integer("mana_cost");
    // $table->float("cast_time")->nullable();
    // $table->boolean("global_cd");
    // $table->float("cooldown")->nullable();
    // $table->string("school", 256)->nullable();
    // $table->string("image", 256)->nullable();
    // $table->boolean("display");

    public function put(SpellRequest $request): RedirectResponse
    {
        $spell = new Spell();
        $this->save_spell_data($spell, $request);
        return redirect("/spells");
    }

    public function update(Spell $spell): View
    {
        $classes = PlayerClass::orderBy("name", "asc")->get();

        return view(
            "spell.form",
            [
                "title" => "Update spell",
                "spell" => $spell,
                "classes" => $classes,
            ]
        );

    }

    public function patch(Spell $spell, SpellRequest $request): RedirectResponse
    {
        $this->save_spell_data($spell, $request);
        return redirect("/spells/update/" . $spell->id);
    }

    public function delete(Spell $spell): RedirectResponse
    {
        if ($spell->image) {
            unlink(getcwd() . "/images" . $spell->image);
        }

        $spell->delete();
        return redirect("/spells");
    }

    private function save_spell_data(Spell $spell, SpellRequest $request): void
    {
        $validated_data = $request->validated();
        $spell->fill($validated_data);
        $spell->display = $request->has("display");

        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $extension = $uploadedFile->clientExtension();
            $name = uniqid();
            $spell->image = $uploadedFile->storePubliclyAs(
                '/',
                $name . '.' . $extension,
                'uploads'
            );
        }

        $spell->save();
    }
}
