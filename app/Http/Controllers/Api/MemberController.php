<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMemberRequest;
use App\Http\Resources\MemberResource;
use App\Models\Member;

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
        $members = Member::where('fkCodChurch', $id)->paginate();
        return MemberResource::collection($members);
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
