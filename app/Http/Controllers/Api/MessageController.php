<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Barryvdh\DomPDF\Facade as PDF;

class MessageController extends Controller
{
    private $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function index(User $user)
    {
        $fromUser = auth()->id();
        $toUser = $user->id;

        $messages = $this->message->query()
            ->where(function ($query) use ($fromUser, $toUser) {
                $query->where([
                   'from' => $fromUser,
                   'to' => $toUser,
                ]);
            })
            ->orWhere(function ($query) use ($fromUser, $toUser) {
                $query->where([
                    'from' => $toUser,
                    'to' => $fromUser,
                ]);
            })
            ->orderBy('created_at', 'ASC')->get();
        return response()->json([
            'messages' => $messages,
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
