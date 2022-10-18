<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public static function me() {
        return [
            'nis' => 3103120152,
            'name' => 'Muhammad Rusdiyanto',
            'phone' => '082323682081',
            'class' => 'XII RPL 5'
        ];
    }
}
