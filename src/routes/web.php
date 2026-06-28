<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerClassController;
use App\Http\Controllers\AuthController;
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