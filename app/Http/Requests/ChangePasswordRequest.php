<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Config;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     * 
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'db_host' => \config('credentials.mysql_host'),//env("MYSQL_HOST", null),
            // 'db_name' => \config('credentials.mysql_database'),//env("MYSQL_DATABASE", null), //'required'
            // 'db_username' => \config('credentials.mysql_user'),//env("MYSQL_USER", null), //'required',
            // 'user_pass' => \config('credentials.mysql_password'),//env("MYSQL_PASSWORD", null), //'required',
            'user_email' => 'required',
            'new_pass' => 'required'
        ];
    }
}
// {
//     "db_host" : "localhost",
//     "db_name" : "hcode",
//     "db_username" : "root",
//     "user_pass" : "88452854",
//     "user_email" : "teste@gmail.com",
//     "new_pass" : "123424"
// }

//"d4e15ddd-7a8a-4ffa-8058-313b38581414"
