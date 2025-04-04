<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required','string','min:6','confirmed'],
            'password_confirmation' => ['required','same:password'],

        ],
        [
            'name.required' => 'O nome é obrigatório',
            'name.string' => 'O campo nome tem que ser um texto',
            'name.max' => 'O campo nome não pode ter mais que :max caracteres',
            'role.required' => 'Campo de perfil é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email deve ser válido',
            'email.unique' => 'o email informado já está em uso',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha tem que ter no mínimo :min caracteres',
            'password.confirmed' => 'O campo senha não confere com a confirmação de senha',
            'password_confirmation.required' => 'A confirmação de senha é obrigatória',
            'password_confirmation.same' => 'A confirmação de senha deve ser igual a senha'
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role' => $input['role'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
