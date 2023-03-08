<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\CoursesFilter;
use App\Http\Controllers\API\V1\ApiController;
use App\Http\Requests\API\Course\StoreCourseRequest;
use App\Http\Requests\API\Course\UpdateCourseRequest;
use App\Models\Course;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CourseCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return CourseCollection
     */
    public function index(Request $request)
    {
        $filter = new CoursesFilter();
        $queryItems = $filter->transform($request);

        $limit = $request->query('limit');
        $courses = Course::with('lecturer')->where($queryItems);

        if (isset($limit)) {
            $courses = $courses->paginate($limit)->appends($request->query());
        } else {
            $courses = $courses->get();
        }

        return new CourseCollection($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\API\Course\StoreCourseRequest  $request
     * @return CourseResource
     */
    public function store(StoreCourseRequest $request)
    {
        return new CourseResource(Course::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return CourseResource
     */
    public function show(Course $course)
    {
        $course->loadMissing(['lecturer', 'chapters']);
        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\API\Course\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->all());
        return $this->respondSuccessWithMessage([], "Cập nhật khóa học thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return $this->respondSuccessWithMessage([], "Xóa khóa học thành công");
    }

    /**
     * Get all curriculum by course
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCurriculum(Request $request,Course $course)
    {
        $user = $request->user();
        $userId = $user->id;

        // $listChapter = DB::table('chapters')->select('id')->where('course_id','=',$course->id);
        // DB::table('lessons')->select('id')->whereIn('chapter_id',$listChapter);

        $course->loadMissing(['chapters.lessons']);

        foreach($course->chapters as $key1 => $chapter){
            foreach($course->chapters[$key1]->lessons as $key2 => $lesson){
                $progress = DB::table('user_lessons')->select('progress')
                                ->where('user_id','=',$userId)
                                ->where('lesson_id','=',$lesson->id)->first();
                
                // $data = json_decode($lesson, true);
                // $data['progress'] = $progress;
                // $course->chapters[$key1]->lessons[$key2] = json_encode($data);
                $course->chapters[$key1]->lessons[$key2]['progress'] = $progress == NULL ? -1 : $progress->progress;
            }
        }

        return $this->respondSuccess(['curriculum' => $course->chapters]);
    }
}
