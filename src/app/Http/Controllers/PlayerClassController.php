<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlayerClass;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PlayerClassController extends Controller
{
    public function list(): View {
        $items = PlayerClass::orderBy("name", "asc")->get();

        return view(
            "player_class.list",[
                "title" => "Classes",
                "items" => $items,
            ]
        );
    }

    public function create(): View {
        return view(
            "player_class.form",[
                "title" => "Add a class",
                "class" => new PlayerClass()
            ]
        );
    }

    public function put(Request $request): RedirectResponse {
        $validated_data = $request->validate([
            "name" => "required|string|max:255",
        ]);

        $player_class = new PlayerClass();
        $player_class->name = $validated_data["name"];
        $player_class->save();

        return redirect("/classes");
    }

    public function update(PlayerClass $class): View {
        return View(
          "player_class.form", [
            "title" => "Edit class",
            "class" => $class
          ]  
        );
    }

    public function patch(PlayerClass $class, Request $request): RedirectResponse{
        $validated_data = $request->validate([
            "name" => "required|string|max:255",
        ]);

        $class->name = $validated_data["name"];
        $class->save();

        return redirect("/classes");
    }

    public function delete(PlayerClass $class): RedirectResponse {
        $class->delete();
        return redirect("/classes");
    }


}
