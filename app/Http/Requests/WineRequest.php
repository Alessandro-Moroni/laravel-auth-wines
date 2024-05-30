<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WineRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:5|max:100',
            'winery' => 'max:50',
            'image' => 'required|min:5|max:25500',
            'rating_average' => 'required|min:1|max:3',
            'rating_reviews' => 'required|min:1|max:30',
            'location' => 'required|min:3|max:80',

        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.min' => 'Il nome deve contenere almeno :min caratteri',
            'name.max' => 'Il nome deve contenere massimo :max caratteri',
            'winery.max' => 'La cantina deve contenere non più di :max caratteri',
            'image.required' => 'La URL della foto è obbligatoria',
            'image.min' => 'La URL della foto deve contenere :min caratteri',
            'image.max' => 'La URL della foto deve contenere :max caratteri',
            'rating_average.required' => 'Il voto è obbligatorio',
            'rating_average.min' => 'Il voto deve contenere :min caratteri',
            'rating_average.max' => 'Il voto deve contenere :max caratteri',
            'rating_reviews.required' => 'Il numero di recensioni è obbligatorio',
            'rating_reviews.min' => 'Il numero di recensioni deve contenere :min caratteri',
            'rating_reviews.max' => 'Il numero di recensioni deve contenere :max caratteri',
            'location.required' => 'La località è obbligatoria',
            'location.min' => 'La località deve contenere :min caratteri',
            'location.max' => 'La località deve contenere :max caratteri',

        ];
    }
}
