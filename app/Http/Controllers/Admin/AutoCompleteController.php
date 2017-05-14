<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;

class AutoCompleteController extends Controller
{
    const NUMBER_OF_ITEM = 25;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function autocomplete()
    {
        $term = Input::get('term');
        $field = Input::get('field');
        $table = Input::get('table');

        $results = array();

        $queries = DB::table($table)
            ->where($field, 'LIKE', '%' . $term . '%')
            ->take(self::NUMBER_OF_ITEM)->get();
        foreach ($queries as $query) {
            if(isset($query->user_id)){
                $results[] = [ 'id' => $query->id, 'value' => $query->$field, 'user_id'=>$query->user_id ];
            }else{
                $results[] = [ 'id' => $query->id, 'value' => $query->$field ];
            }
        }

        return response()->json($results);
    }
}
