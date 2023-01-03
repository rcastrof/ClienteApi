<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function LineChart()
    {
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
        return view('line-chart', compact('counts','end', 'start'));
    }
   
}
