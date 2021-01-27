<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Agendamento;
use Illuminate\Validation\Rule;

class BancaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $agendamento = new Agendamento;
        return [
            'codpes' => 'required|integer',
            'nome' => 'required',
            'presidente' => ['required',Rule::in($agendamento->presidenteOptions())],
            'agendamento_id' => 'required|integer',
        ];
    }
}