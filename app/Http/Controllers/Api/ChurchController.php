<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateChurchRequest;
use App\Http\Resources\ChurchResource;
use App\Models\Church;
use Illuminate\Http\Response as HttpResponse;

class ChurchController extends Controller
{
    public function index()
    {
        $churchs = Church::paginate();
        return ChurchResource::collection($churchs);
    }

    public function store(StoreUpdateChurchRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($request->password);

        $church = Church::create($data);

        return new ChurchResource($church);
    }

    public function show(string $id)
    {

        $church = Church::findOrFail($id);

        return new ChurchResource($church);
    }

    public function update(StoreUpdateChurchRequest $request, string $id)
    {

        $church = Church::findOrFail($id);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $church->update($data);

        return new ChurchResource($church);
    }

    public function destroy(string $id)
    {
        $church = Church::findOrFail($id);
        $church->delete();

        return response()->json([], HttpResponse::HTTP_NO_CONTENT);
    }
}
