<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TrainMachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function train()
    {
        $areas = DB::table('areas')->get();

        if ($areas->isEmpty()) {
            return redirect()->route('admin.dashboard')->with(['message' => 'Nos existen areas para ser entrenar!', 'alert-type' => 'warning']);
        }

        return view('admin.train_machine.index', [ 'areas' => $areas]);
    }
}
