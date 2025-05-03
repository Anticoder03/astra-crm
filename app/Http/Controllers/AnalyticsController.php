<?php

namespace App\Http\Controllers;

use App\Models\Investments;
use App\Models\Policies;
use App\Models\Followups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Investment Analytics - Total Investments per month
        $investments = Investments::select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(amount) as total'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month', 'asc')
            ->get();
        
        // Policy Analytics - Number of policies per month
        $policies = Policies::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month', 'asc')
            ->get();

        // Followups Analytics - Completed vs Pending
        $followupsStatus = Followups::select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->get();

        return view('analytics.index', compact('investments', 'policies', 'followupsStatus'));
    }
}
    