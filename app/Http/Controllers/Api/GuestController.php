<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateGuestRequest;
use App\Http\Resources\GuestResource;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::paginate();
        return GuestResource::collection($guests);
    }

    public function indexByChurch(string $id, Request $request)
    {

        $keyword = $request->input('keyword', '');

        if (!empty($keyword)) {
            $guests = Guest::where('fkCodChurch', $id)
                ->where(function ($query) use ($keyword) {
                    $query->where('nome', 'like', '%' . $keyword . '%')
                        ->orWhere('bairro', 'like', '%' . $keyword . '%');
                })
                ->orderByDesc('created_at')
                ->paginate(10);
        } else {
            $guests = Guest::where('fkCodChurch', $id)
                ->orderByDesc('created_at')
                ->paginate(10);
        }

        return GuestResource::collection($guests)->additional([
            'count' => $guests->total(),
        ]);
    }

    public function store(StoreUpdateGuestRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($request->password);

        $guest = Guest::create($data);

        return new GuestResource($guest);
    }

    public function show(string $id)
    {

        $guest = Guest::findOrFail($id);

        return new GuestResource($guest);
    }

    public function update(StoreUpdateGuestRequest $request, string $id)
    {

        $guest = Guest::findOrFail($id);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $guest->update($data);

        return new GuestResource($guest);
    }

    public function destroy(string $id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();

        return response()->json([], HttpResponse::HTTP_NO_CONTENT);
    }
}
