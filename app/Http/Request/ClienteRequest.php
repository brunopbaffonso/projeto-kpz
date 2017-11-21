<?php


namespace projeto-kpz\Http\Request;

use projeto-kpz\Http\Requests\Request;

class ClienteRequest extendes Request
{


	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'nome'=>'required|min:2',
            'email'=>'required|text:@',
		];

	}	

	public function messages()
	{
		return [
			'nome.required'=>'O campo nome e obrigatório',
			'nome.min'=>'O campo nome deve ter 2 caracteres',
            'email.required'=>'O email deve conter "@"',
		];

	}	


}