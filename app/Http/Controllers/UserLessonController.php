<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreuserLessonRequest;
use App\Http\Requests\UpdateuserLessonRequest;
use App\Models\userLesson;

class UserLessonController extends Controller
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
     * @param  \App\Http\Requests\StoreuserLessonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreuserLessonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userLesson  $userLesson
     * @return \Illuminate\Http\Response
     */
    public function show(userLesson $userLesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userLesson  $userLesson
     * @return \Illuminate\Http\Response
     */
    public function edit(userLesson $userLesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateuserLessonRequest  $request
     * @param  \App\Models\userLesson  $userLesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateuserLessonRequest $request, userLesson $userLesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userLesson  $userLesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(userLesson $userLesson)
    {
        //
    }
}
