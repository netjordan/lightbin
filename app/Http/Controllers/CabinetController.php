<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CabinetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('cabinets.index')->with('cabinets', Cabinet::all());
    }

    public function showAddForm() {
        return view('cabinets.add');
    }

    public function addCabinet(Request $request) {
        $request->validate([
            'description' => 'string',
            'rows' => 'integer|required|min:1'
        ]);

        $cabinet = new Cabinet([
            'description' => $request['description'],
            'rows' => $request['rows']
        ]);

        $cabinet->save();

        return redirect('cabinets/' . $cabinet->id);
    }

    public function showCabinet(Request $request, $id) {
        $cabinet = Cabinet::findOrFail($id);

        return view('cabinets.show')->with('cabinet', $cabinet);
    }

    public function showAddBinForm(Request $request, $id, $row) {
        return view('cabinets.bins.add');
    }

    public function addBin(Request $request, $id, $row) {
        $cabinet = Cabinet::findOrFail($id);

        $cabinet->bins()->create([
            'cabinet_row' => $row
        ]);

        return redirect('cabinets/' . $cabinet->id);
    }
}
