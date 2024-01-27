<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMemberRequest;
use App\Http\Resources\MemberResource;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Response as HttpResponse;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::paginate();
        return MemberResource::collection($members);
    }

    public function indexByChurch(string $id)
    {
        $currentMonth = Carbon::now()->month;

        $members = Member::where('fkCodChurch', $id)
            ->orderByDesc('created_at')
            ->paginate(10);
        $birthdates = Member::where('fkCodChurch', $id)
            ->whereMonth('data_de_nascimento', $currentMonth)
            ->orderByDesc('created_at')
            ->paginate(10);

        return MemberResource::collection($members)->additional([
            'count' => $members->total(),
            'birthdates' => $birthdates
        ]);
    }

    public function store(StoreUpdateMemberRequest $request)
    {
        $data = $request->validated();

        $member = Member::create($data);

        return new MemberResource($member);
    }

    public function show(string $id)
    {

        $member = Member::findOrFail($id);

        return new MemberResource($member);
    }

    public function update(StoreUpdateMemberRequest $request, string $id)
    {

        $member = Member::findOrFail($id);

        $data = $request->all();

        $member->update($data);

        return new MemberResource($member);
    }

    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return response()->json([], HttpResponse::HTTP_NO_CONTENT);
    }
}
