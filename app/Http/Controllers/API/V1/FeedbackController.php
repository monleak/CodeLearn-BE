<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Resources\FeedbackResource;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends APIController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $feedbacks = Feedback::all();
        return $this->respondSuccess(FeedbackResource::collection($feedbacks));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Feedback::where('user_id', $request->user_id)->where('course_id', $request->course_id)->exists()) {
            return $this->respondSuccessWithMessage([],"Bạn đã đánh giá khóa học này rồi");
        } else {
            Feedback::create([
                'user_id' => $request->user_id,
                'course_id' => $request->course_id,
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]);
            return $this->respondSuccessWithMessage([], "Thêm feedback thành công");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \App\Http\Resources\LessonResource
     */
    public function show(Feedback $feedback)
    {
        return new FeedbackResource($feedback);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\API\Lesson\UpdateLessonRequest  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Feedback $feedback)
    {
        try {
            $feedback->update([
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]);
        } catch (\Exception $exception) {
            return $this->respondErrorWithMessage($exception->getMessage());
        }
        return $this->respondSuccessWithMessage([], "Cập nhật feedback thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Feedback $feedback)
    {
        try {
            $feedback->delete();
        } catch (\Exception $exception) {
            return $this->respondErrorWithMessage($exception->getMessage());
        }
        return $this->respondSuccessWithMessage([], "Xóa feedback thành công");
    }
}
