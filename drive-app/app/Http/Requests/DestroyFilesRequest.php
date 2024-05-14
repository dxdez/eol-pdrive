<?php

namespace App\Http\Requests;

use App\Http\Requests\ParentIdBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class DestroyFilesRequest extends ParentIdBaseRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'all' => 'nullable|bool',
            'ids*' => Rule::exists('files', 'id')->where(function($query) {
                $query->where('created_by', Auth:id());
            })
        ]);
    }
}
