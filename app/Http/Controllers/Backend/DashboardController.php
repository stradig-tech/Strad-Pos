<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderTransaction;
use App\Models\Product;
use App\Models\SupportTicket;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::get();
        // Calculate totals
        $data = [
            'sub_total' => $orders->sum('sub_total'),
            'discount' => $orders->sum('discount'),
            'total' => $orders->sum('total'),
            'paid' => $orders->sum('paid'),
            'due' => $orders->sum('due'),
            'total_customer' => Customer::count(),
            'total_order' => $orders->count(),
            'total_product' => Product::count(),
            'total_sale_item' => OrderProduct::sum('quantity'),
        ];


        $startDate = Carbon::now()->subDays(30)->format('Y-m-d');
        $endDate = Carbon::now()->format('Y-m-d');
        if($request->has('daterange')) {
            $dates = explode(' to ', $request->query('daterange'));

            if (count($dates) == 2) {
                $startDate = Carbon::parse($dates[0])->format('Y-m-d');
                $endDate = Carbon::parse($dates[1])->format('Y-m-d');
            }
        }
        $dailyTotals = OrderTransaction::selectRaw('DATE(created_at) as date, SUM(amount) as total_amount')
        ->whereBetween('created_at', [$startDate, $endDate])
        ->groupBy('date')
        ->orderBy('date', 'DESC')
        ->get();
        $dates = $dailyTotals->pluck('date')->toArray();
        $totalAmounts = $dailyTotals->pluck('total_amount')->toArray();
        $data['dates'] = $dates;
        $data['totalAmounts'] = $totalAmounts;
        $data['dateRange'] = 'from '. $startDate . ' to ' . $endDate;


        $currentYear = now()->year;
        $data['currentYear'] = $currentYear;

        $salesData = OrderTransaction::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(amount) as total_amount')
        ->whereYear('created_at', $currentYear)
        ->groupBy('month')
        ->orderBy('month', 'ASC')->pluck('total_amount', 'month')->toArray();

        $orderData = Order::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total) as total_sold')
        ->whereYear('created_at', $currentYear)
        ->groupBy('month')
        ->pluck('total_sold', 'month')->toArray();

        $purchaseData = Purchase::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(grand_total) as total_purchased')
        ->whereYear('created_at', $currentYear)
        ->groupBy('month')
        ->pluck('total_purchased', 'month')->toArray();

        $tempMonths = [];
        $tempTotalAmountMonth = [];
        $soldAmountMonth = [];
        $purchasedAmountMonth = [];
        $paymentReceivedMonth = [];
        $paymentSentMonth = [];

        $monthNames = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthKey = Carbon::create($currentYear, $i, 1)->format('Y-m');
            $tempMonths[] = $monthKey;
            $monthNames[] = Carbon::create($currentYear, $i, 1)->format('F');
            $tempTotalAmountMonth[] = $salesData[$monthKey] ?? 0;
            
            $soldAmountMonth[] = $orderData[$monthKey] ?? 0;
            $purchasedAmountMonth[] = $purchaseData[$monthKey] ?? 0;
            $paymentReceivedMonth[] = $salesData[$monthKey] ?? 0;
            $paymentSentMonth[] = $purchaseData[$monthKey] ?? 0;
        }

        $data['months'] = $tempMonths;
        $data['monthNames'] = $monthNames;
        $data['totalAmountMonth'] = $tempTotalAmountMonth;
        $data['soldAmountMonth'] = $soldAmountMonth;
        $data['purchasedAmountMonth'] = $purchasedAmountMonth;
        $data['paymentReceivedMonth'] = $paymentReceivedMonth;
        $data['paymentSentMonth'] = $paymentSentMonth;

        return view('backend.index', $data);
    }

    public function profile()
    {
        $user = auth()->user();
        return view('backend.profile.index', compact('user'));
    }

    public function markNotificationAsRead($id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
            
            // Redirect to the order invoice if order_id is present
            if (isset($notification->data['order_id'])) {
                return redirect()->route('backend.admin.orders.invoice', $notification->data['order_id']);
            }
        }
        
        return redirect()->back();
    }
}
