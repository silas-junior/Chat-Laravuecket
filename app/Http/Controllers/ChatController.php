<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function chat()
    {
        return Inertia::render('Chat', ['message' => 'Somente um teste']);
    }
}
