<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceCourseRequest;
use App\Http\Requests\UpdateInvoiceCourseRequest;
use App\Http\Resources\InvoiceCourseResource;
use App\Models\InvoiceCourse;

class InvoiceCourseController extends Controller
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
     * @param  \App\Http\Requests\StoreInvoiceCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceCourseRequest $request)
    {
        return new InvoiceCourseResource(InvoiceCourse::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceCourse  $InvoiceCourse
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceCourse $InvoiceCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceCourse  $InvoiceCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceCourse $InvoiceCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceCourseRequest  $request
     * @param  \App\Models\InvoiceCourse  $InvoiceCourse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceCourseRequest $request, InvoiceCourse $InvoiceCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceCourse  $InvoiceCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceCourse $InvoiceCourse)
    {
        //
    }
}
