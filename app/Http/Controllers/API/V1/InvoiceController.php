<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\ApiController;
use App\Http\Requests\API\Invoice\StoreInvoiceRequest;
use App\Http\Requests\API\Invoice\UpdateInvoiceRequest;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Models\InvoiceCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends ApiController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\API\Invoice\StoreInvoiceRequest  $request
     * @return \App\Http\Resources\InvoiceResource
     */
    public function purchase(StoreInvoiceRequest $request)
    {
        if (!empty($request->courses)) {
            $invoice = Invoice::create([
                'user_id' => $request->user_id,
                'amount' => $request->amount,
                'status' => 'paid',
            ]);

            foreach ($request->courses as $course) {
                InvoiceCourse::create([
                    'invoice_id' => $invoice['id'],
                    'course_id' => $course['id'],
                ]);
            }
        }

        return new InvoiceResource($invoice->loadMissing('courses'));
    }

    public function getMyCourse(Request $request)
    {
        $user = $request->user();
        $userId = $user->id;

        $myInvoice = DB::table('invoices')->select('id')->where('user_id','=',$userId);
        $listIDCourses = DB::table('invoice_courses')->select('course_id')->distinct()->whereIn('invoice_id',$myInvoice);
        $myCourse = DB::table('courses')->select('*')->whereIn('id',$listIDCourses);
        return $myCourse->get();;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \App\Http\Resources\InvoiceResource
     */
    public function show(Invoice $invoice)
    {
        $invoice->loadMissing('courses');
        return new InvoiceResource($invoice);
    }
}
