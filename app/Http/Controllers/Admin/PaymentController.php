<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\EventsService;
use App\Services\PaymentsService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    private $paymentService;

    public function __construct(PaymentsService $paymentsService)
    {
        $this->paymentService = $paymentsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = $request->all();
        $payments = $this->paymentService->getAllPayments($filters);
        return View('admin.payment.index', compact('payments'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function update(Request $request, $id)
    {
        $input = $request->except('_token', '_method', '_wysihtml5_mode');

        $newslist = $this->eventsService->updateEvents($input, $id);

        if ($newslist) {
            flash('Events Update successfully!');
            return redirect()->route('events.index');
        }

        flash('Failed to Update Events!', 'error');
        return redirect()->back()->withInput($request->all());
    }

    public function destroy($id)
    {
        $deletePayment = $this->paymentService->deletePayment($id);
        if ($deletePayment) {
            flash('Payment Delete successfully!');
            return redirect()->back();
        }

        flash('Payment Delete unsuccessfully!', 'error');
        return redirect()->back();
    }

}
