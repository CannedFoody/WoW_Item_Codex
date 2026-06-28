<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerClassController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SpellController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"]);
Route::get("/classes", [PlayerClassController::class, "list"]);
Route::get("/classes/create", [PlayerClassController::class, "create"]);
Route::post("/classes/put", [PlayerClassController::class, "put"]);
Route::get("/classes/update/{class}", [PlayerClassController::class, "update"]);
Route::post("/classes/patch/{class}", [PlayerClassController::class, "patch"]);
Route::post("/classes/delete/{class}", [PlayerClassController::class, "delete"]);

Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/auth", [AuthController::class, "authenticate"]);
Route::get("/logout", [AuthController::class, "logout"]);

Route::get("/spells", [SpellController::class, "list"]);
Route::get("/spells/create", [SpellController::class, "create"]);
Route::post("/spells/put", [SpellController::class, "put"]);
Route::get("/spells/update/{spell}", [SpellController::class, "update"]);
Route::post("/spells/patch/{spell}", [SpellController::class, "patch"]);
Route::post("/spells/delete/{spell}", [SpellController::class, "delete"]);