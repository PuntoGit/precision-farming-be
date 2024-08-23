<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use App\Models\CheckList;

class CheckListController extends Controller
{
    use ApiResponser;

    public function store(Request $request) {
      
        $checklist = CheckList::where('farm_id', Auth::user()->farm_id)->first();

        if(isset($checklist)) {
            $checklist->checklist = $request->checklist;
            $checklist->update();
        } else {
            $checklist =  new CheckList();
            $checklist->user_id = Auth::user()->id;
            $checklist->farm_id = Auth::user()->farm_id;
            $checklist->checklist = $request->checklist;
            $checklist->save();
        }

        return $this->success($checklist , 'Record Save successfully.', 201);
    }

    public function get() {
        $records = CheckList::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->first();
        return $this->success($records , 200);
    }
}
