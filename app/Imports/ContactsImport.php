<?php

namespace App\Imports;

use App\Models\Contact;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contact([
            'user_id' => auth()->user()->id,
            'phone' => $row['phone'],
        ]);
    }

    public function rules(): array
    {
        return [
            'phone' => [
                'required',
                'numeric',
                Rule::unique('contacts')->where('deleted_at', null),
            ],
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            'phone.unique' => 'Duplicate Entry of phone number',
        ];
    }
}
