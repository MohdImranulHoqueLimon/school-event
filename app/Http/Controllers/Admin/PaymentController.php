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
        return $events_list = $this->paymentService->getAllPayments($filters);
        return View('admin.events.index', compact('events_list'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $input = $request->except('_token', '_wysihtml5_mode');
        $newslist = $this->eventsService->store($input);

        if ($newslist) {
            flash('Events created successfully!');
            return redirect()->route('events.index');
        }

        flash('Failed to create Events!', 'error');
        return redirect()->back()->withInput($request->all());
    }

    public function edit($id)
    {
        $events = $this->eventsService->showEventsByID($id);
        return view('admin.events.edit', [
            'events' => $events
        ]);
    }

 public function update( Request $request, $id)
    {
         $input = $request->except('_token', '_method', '_wysihtml5_mode');
        // print_r($input);

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
        $newslist = $this->eventsService->deleteEvents($id);
        if ($newslist) {
            flash('Events Delete successfully!');
            return redirect()->route('events.index');
        }

        flash('Events Delete unsuccessfully!', 'error');
        return redirect()->route('events.index');
    }
    
}
