<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\CoursesFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Bill;
use App\Models\Course;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CourseCollection;
use App\Models\Feedback;
use App\Models\Lesson;
use App\Models\Test;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new CoursesFilter();
        $queryItems = $filter->transform($request);
        if(count($queryItems) == 0){
            return new CourseCollection(Course::paginate());
        }else{
            return new CourseCollection(Course::where($queryItems)->paginate());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        return new CourseResource(Course::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return new CourseResource($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //Khi xóa khóa học thì tất cả các bài học sẽ bị xóa theo (Kéo theo đó là các bài test đi kèm với các bài học)
        $lessons = Lesson::where('course_id', $course->id)->get();
        foreach ($lessons as $item) {
            Test::where('lesson_id', $item->id)->delete();
        }
        Lesson::where('course_id', $course->id)->delete();

        Feedback::where('course_id', $course->id)->delete(); //Xóa các feedback
        Bill::where('course_id', $course->id)->delete(); //Xóa các bill

        $course->delete();
    }
}
