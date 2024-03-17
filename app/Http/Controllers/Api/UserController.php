<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->input('keyword', '');

        if (!empty($keyword)) {
            $users = User::where('name', 'like', '%' . $keyword . '%')
                ->orderByDesc('created_at')
                ->paginate(10);
        } else {
            $users = User::orderByDesc('created_at')
                ->paginate(10);
        }

        return UserResource::collection($users)->additional([
            'count' => $users->total(),
        ]);
    }

    public function store(StoreUpdateUserRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        return new UserResource($user);
    }

    public function show(string $id)
    {

        // $user = User::find($id);

        // if (!$user) {
        //     return response()->json(['message' => 'User not found!'], 404);
        // }


        $user = User::findOrFail($id);

        return new UserResource($user);
    }

    public function update(StoreUpdateUserRequest $request, string $id)
    {

        $user = User::findOrFail($id);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user->update($data);

        return new UserResource($user);
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
