<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ufs= Uf::orderBy('id', 'desc')->paginate(10);

        $now = Carbon::now();
        $end = $now->format('Y-m-d');
        $start = $now->subYear()->format('Y-m-d');

        $monthCounts = Uf::select(
            DB::raw('MONTH(fechaIndicador) as mes'),
            DB::raw('valorIndicador')
        )
            ->groupBy()
            ->get()
            ->toArray();
        $counts = array_fill(0, 12, 0);

        foreach ($monthCounts as $monthCount) {
            $index = $monthCount['mes'] - 1;
            $counts[$index] = $monthCount['valorIndicador'];
        }
        return view('uf.index', compact('ufs','counts','end', 'start'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Uf $uf)
    {
        $uf = request()->except('_token');

        $request->validate([
            'nombreIndicador' => 'required',
            'codigoIndicador' => 'required',
            'unidadMedidaIndicador' => 'required',
            'valorIndicador' => 'required',
            'fechaIndicador' => 'required',
        ]);

        $uf = [
            'nombreIndicador' => $request->input('nombreIndicador'),
            'codigoIndicador' => $request->input('codigoIndicador'),
            'unidadMedidaIndicador' => $request->input('unidadMedidaIndicador'),
            'valorIndicador' => $request->input('valorIndicador'),
            'fechaIndicador' => $request->input('fechaIndicador'),
        ];
        Uf::insert($uf);
        return redirect()->route('uf.index',$uf);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Uf  $uf
     * @return \Illuminate\Http\Response
     */
    public function show(Uf $uf)
    {
        return view("uf.show",compact('uf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uf  $uf
     * @return \Illuminate\Http\Response
     */
    public function edit(Uf $uf)
    {
        return view("uf.edit", compact('uf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Uf  $uf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uf $uf)
    {
        $request->validate([
            'nombreIndicador' => 'required',
            'codigoIndicador' => 'required',
            'unidadMedidaIndicador' => 'required',
            'valorIndicador' => 'required',
            'fechaIndicador' => 'required',
        ]);

        $uf->update($request->all());
        return redirect()->route('uf.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uf  $uf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uf $uf)
    {
        $uf->delete();
        return redirect()->route('uf.index');
    }
}
