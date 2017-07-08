<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\EventsService;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    private $eventsService;

    public function __construct(EventsService $eventsService)
    {
        $this->eventsService = $eventsService;
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
        $events_list = $this->eventsService->getAllEvents($filters);
        return View('admin.events.index', compact('events_list'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $input = $request->except('_token', '_wysihtml5_mode');

        $input['event_date'] = date('Y-m-d H:i:s', strtotime($input['event_date']));
        $input['last_registration_date'] = date('Y-m-d H:i:s', strtotime($input['last_registration_date']));

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
