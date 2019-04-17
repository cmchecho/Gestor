<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\GastoCollection;
use App\Gasto;

class GastoController extends Controller
{
    public function store(Request $request)
    {
    	$gasto = new Gasto([
    		'nombre' => $request->get('nombre'),
    		'tipo' => $request->get('tipo'),
    		'monto' => $request->get('monto')
    	]);

    	$gasto->save();

    	return response()->json('successfully added');
    }

    public function index()
    {
        return new GastoCollection(Gasto::all());
    }

    public function delete($id)
    {
        $gasto = Gasto::find($id);
        $gasto->delete();
        return response()->json('successfully deleted');
    }
}
