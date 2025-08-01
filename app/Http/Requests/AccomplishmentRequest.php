<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccomplishmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'member_id'       => 'required|exists:members,id',
            'start_date'       => 'nullable|date',
            'end_date'        => 'nullable|date|after_or_equal:start_date',
            'category'        => 'required|string|max:255',
            'event_name'      => 'required|string|max:255',
            'type'            => 'required|string|max:255',
            'level'           => 'required|string|max:255',
            'organizer'       => 'required|string|max:255',
            'barcode_trophy'  => 'nullable|string|max:255',
            'street'          => 'nullable|string|max:255',
            'province'        => 'nullable|string|max:255',
            'zip_code'        => 'nullable|string|max:10',
            'country'         => 'nullable|string|max:255',
            'rank'            => 'nullable|string|max:50',
            'awards'          => 'nullable|array',
            'condition'       => 'nullable|string|max:255',
            'notes'           => 'nullable|string',
        ];
    }
}
