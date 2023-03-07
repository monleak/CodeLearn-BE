<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\ApiController;
use App\Http\Requests\API\Chapter\StoreChapterRequest;
use App\Http\Requests\API\Chapter\UpdateChapterRequest;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChapterController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->respondSuccess(['chapter' => Chapter::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\API\Chapter\StoreChapterRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreChapterRequest $request)
    {
        $chapter = Chapter::create([
            'title' => $request->title,
            'description' => $request->description,
            'course_id' => $request->course_id,
        ]);

        $chapter['lessons'] = [];

        return $this->respondSuccess(['chapter' => $chapter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\API\Chapter\UpdateChapterRequest  $request
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        $lessons = $chapter->lessons->pluck("id")->toArray();

        $chapter->update([
            "title" => $request->title,
            "description" => $request->description,
        ]);

        return $this->respondSuccess([
            "chapter" => $chapter,
            "lesson" => $lessons
        ]);
    }

    public function updateOrder(Request $request){
        $newOrders = $request->newOrders;
        foreach($newOrders as $newOrder){
            DB::table('chapters')
            ->where('id',$newOrder['idChapter'])
            ->update(array('order' => $newOrder['newOrder']));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        return $this->respondSuccessWithMessage([], "Xóa chương thành công");
    }
}
