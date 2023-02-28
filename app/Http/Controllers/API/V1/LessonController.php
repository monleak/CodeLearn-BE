<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\ApiController;
use App\Http\Requests\API\Lesson\StoreLessonRequest;
use App\Http\Requests\API\Lesson\UpdateLessonRequest;
use App\Models\Chapter;
use App\Models\Lesson;

class LessonController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\API\Lesson\StoreLessonRequest  $request
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreLessonRequest $request, Chapter $chapter)
    {
        $lastChapter = Lesson::where("chapter_id", $chapter->id)->orderBy("order", "desc")->first();
        $order = $lastChapter ? $lastChapter->order + 1 : 1;

        $lesson = Lesson::create([
            "title" => $request->title,
            "description" => $request->description,
            "order" => $order,
            "chapter_id" => $chapter->id,
        ]);

        return $this->respondSuccess(['lesson' => $lesson]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\API\Lesson\UpdateLessonRequest  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return $this->respondSuccessWithMessage([], "Xóa bài thành công");
    }
}
