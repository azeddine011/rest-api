<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSkillRequest;
use App\Models\Skill;
use App\Http\Resources\V1\SkillResource;

class SkillController extends Controller
{

    public function index(){
        return SkillResource::collection(skill::paginate());
    }

    public function store(StoreSkillRequest $request){
        Skill::create($request->validated());
        return response()->json("Skill created succesfully");
    }

    public function update(StoreSkillRequest $request, Skill $skill){
        $skill->update($request->validate());
        return response()->json("Skill Updated");
    }

    public function show(Skill $skill){
        return new SkillResource($skill);
    }

    public function destroy(Skill $skill){
        $skill->delete();
        return response()->json('Skill Deleted Succesfully');
    }
}
