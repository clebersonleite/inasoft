<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword', '');

        if (!empty($keyword)) {
            $departments = Department::where('nome', 'like', '%' . $keyword . '%')
                ->orderByDesc('created_at')
                ->paginate(10);
        } else {
            $departments = Department::orderByDesc('created_at')
                ->paginate(10);
        }

        return DepartmentResource::collection($departments)->additional([
            'count' => $departments->total(),
        ]);
    }

    public function store(StoreUpdateDepartmentRequest $request)
    {
        $data = $request->validated();
        $departments = Department::create($data);

        return new DepartmentResource($departments);
    }

    public function show(string $id)
    {

        $departments = Department::findOrFail($id);

        return new DepartmentResource($departments);
    }

    public function update(StoreUpdateDepartmentRequest $request, string $id)
    {

        $departments = Department::findOrFail($id);
        $data = $request->all();

        $departments->update($data);

        return new DepartmentResource($departments);
    }

    public function destroy(string $id)
    {
        $departments = Department::findOrFail($id);
        $departments->delete();

        return response()->json([], HttpResponse::HTTP_NO_CONTENT);
    }
}
