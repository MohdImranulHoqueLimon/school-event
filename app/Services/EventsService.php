<?php

namespace App\Services;

use App\Models\Events;

class EventsService extends BaseService
{

    public function __construct(Events $events)
    {
        $this->model = $events;
    }

    function getAllEvents()
    {
        return $this->model->get();
    }

    function getAllActiveEvents()
    {
        return $this->model->where('status', '=', 1)->get();
    }

    public function filterData(array $filter, $query)
    {
        // TODO: Implement filterData() method.
    }

     public function showEventsByID($id)
    {
        return $this->model->find($id);
    }

     public function updateEvents( array $input, $id )
    {
        $input['created_by'] = auth()->user()->id;
        //return $this->model->update($input, $id);
        return $this->model->where('id', $id)->update($input);
    }

    public function deleteEvents( $id )
    {
        return $this->model->where('id', $id)->delete();
    }

}
