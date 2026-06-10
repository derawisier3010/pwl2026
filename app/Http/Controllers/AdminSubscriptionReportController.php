<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;

class AdminSubscriptionReportController extends Controller
{
    public function index()
    {
        if (auth()->user()->role != 'admin') {
            abort(403, 'Akses ditolak');
        }

        $subscriptions = Subscription::with(['user', 'plan'])
            ->latest()
            ->paginate(10);

        $totalRevenue = Subscription::where('status', 'paid')->sum('amount');
        $totalPaid = Subscription::where('status', 'paid')->count();
        $totalPending = Subscription::where('status', 'pending')->count();
        $totalUsers = User::count();

        return view('admin.subscription-report', compact(
            'subscriptions',
            'totalRevenue',
            'totalPaid',
            'totalPending',
            'totalUsers'
        ));
    }
}