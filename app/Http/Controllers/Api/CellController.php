<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCellRequest;
use App\Http\Resources\CellResource;
use App\Models\Cell;
use Illuminate\Http\Response as HttpResponse;

class CellController extends Controller
{
    public function index()
    {
        $cells = Cell::paginate();
        return CellResource::collection($cells);
    }

    public function indexByChurch(string $id)
    {
        $cells = Cell::where('fkCodChurch', $id)->paginate();
        return CellResource::collection($cells);
    }

    public function store(StoreUpdateCellRequest $request)
    {
        $data = $request->validated();

        $cell = Cell::create($data);
        return new CellResource($cell);
    }

    public function show(string $id)
    {

        $cell = Cell::findOrFail($id);

        return new CellResource($cell);
    }

    public function update(StoreUpdateCellRequest $request, string $id)
    {

        $cell = Cell::findOrFail($id);

        $data = $request->all();

        $cell->update($data);

        return new CellResource($cell);
    }

    public function destroy(string $id)
    {
        $cell = Cell::findOrFail($id);
        $cell->delete();

        return response()->json([], HttpResponse::HTTP_NO_CONTENT);
    }
}
