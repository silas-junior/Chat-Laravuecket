<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->query()
            ->where('id', '!=', auth()->id())
            ->get();

        return response()->json([
            'users' => $users
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $user = $this->user->query()->findOrFail($id);
//        dd($user);
        return response()->json([
            'user' => $user
        ]);
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
