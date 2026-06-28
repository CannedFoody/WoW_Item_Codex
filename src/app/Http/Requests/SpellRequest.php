<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SpellRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|min:2|Max:256",
            "class_id" => "required",
            "description" => "nullable",
            "mana_cost" => "numeric|required",
            "cast_time" => "numeric|nullable",
            "global_cd" => "boolean",
            "cooldown" => "numeric|nullable",
            "school" => "min:5|max:256|nullable",
            "image" => "nullable|image",
            "display" => "nullable",
        ];
    }
}
