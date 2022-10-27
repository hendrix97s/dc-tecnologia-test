<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
          'method_payment'      => 'required|in:cash,credit_card,debit_card,check',
          'products'            => 'required|array',
          'products.*.uuid'     => 'required|exists:products,uuid',
          'products.*.quantity' => 'required|integer',
          'due_day' => 'sometimes|numeric',
        ];
    }
}
