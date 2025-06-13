<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact', [
            'author' => 'Miraida Saparova',
            'neptun_code' => 'ITNQA1',
            'email' => 'itnqa1@inf.elte.hu'
        ]);
    }
}