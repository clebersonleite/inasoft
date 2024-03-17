<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCellRequest;
use App\Http\Resources\CellResource;
use App\Models\Cell;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class CellController extends Controller
{
    public function index()
    {
        $cells = Cell::paginate();
        return CellResource::collection($cells);
    }

    public function indexByChurch(string $id, Request $request)
    {
        $keyword = $request->input('keyword', '');

        if (!empty($keyword)) {
            $cells = Cell::where('fkCodChurch', $id)
                ->where(function ($query) use ($keyword) {
                    $query->where('nome', 'like', '%' . $keyword . '%')
                        ->orWhere('bairro', 'like', '%' . $keyword . '%');
                })
                ->orderByDesc('created_at')
                ->paginate(10);
        } else {
            $cells = Cell::where('fkCodChurch', $id)
                ->orderByDesc('created_at')
                ->paginate(10);
        }

        return CellResource::collection($cells)->additional([
            'count' => $cells->total(),
        ]);
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
