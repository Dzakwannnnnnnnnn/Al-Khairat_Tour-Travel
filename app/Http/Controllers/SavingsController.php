<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavingsPlan;
use App\Models\SavingsDeposit;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SavingsController extends Controller
{
    /**
     * User's view of their savings.
     */
    public function mySavings()
    {
        $user = Auth::user();
        $plans = SavingsPlan::with(['product', 'deposits'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();
        
        $availableProducts = Product::where('status', 'active')->get();
        $whatsapp = Setting::where('key', 'whatsapp_number')->first()->value ?? '6281234567890';
        $bankAccount = Setting::where('key', 'bank_account_info')->first()->value ?? "BANK SYARIAH INDONESIA (BSI) \n 721-XXXX-XXX \n a.n AL KHAIRAT TOUR TRAVEL";

        return view('member.savings.index', compact('plans', 'availableProducts', 'whatsapp', 'bankAccount'));
    }

    /**
     * Store a new savings plan.
     */
    public function storePlan(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'monthly_target' => 'required|numeric|min:100000',
        ]);

        $product = Product::findOrFail($request->product_id);
        
        // Calculate total target amount based on price and quantity
        $totalTarget = $product->price * $request->quantity;

        SavingsPlan::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'target_amount' => $totalTarget,
            'monthly_target' => $request->monthly_target,
            'status' => 'active',
        ]);

        return back()->with('success', 'Rencana tabungan berhasil dibuat! Mari mulai menabung.');
    }

    /**
     * Add a deposit to an existing plan (Admin Only).
     */
    public function adminDeposit(Request $request)
    {
        $request->validate([
            'savings_plan_id' => 'required|exists:savings_plans,id',
            'amount' => 'required|numeric|min:1000',
            'note' => 'nullable|string|max:255',
        ]);

        $plan = SavingsPlan::findOrFail($request->savings_plan_id);

        SavingsDeposit::create([
            'savings_plan_id' => $plan->id,
            'amount' => $request->amount,
            'note' => $request->note,
            'status' => 'approved',
        ]);

        return back()->with('success', 'Setoran tabungan senilai Rp ' . number_format($request->amount, 0, ',', '.') . ' telah ditambahkan untuk jemaah ' . $plan->user->name);
    }

    /**
     * Delete a savings plan and its deposits (Admin Only).
     */
    public function destroyPlan($id)
    {
        $plan = SavingsPlan::findOrFail($id);
        
        // Delete associated deposits first (if not cascading in DB)
        $plan->deposits()->delete();
        $plan->delete();

        return back()->with('success', 'Rencana tabungan jemaah ' . $plan->user->name . ' telah dihapus.');
    }

    /**
     * Request a refund (Member).
     */
    public function requestRefund(Request $request, $id)
    {
        $plan = SavingsPlan::where('user_id', Auth::id())->findOrFail($id);
        
        if ($plan->status !== 'active') {
            return back()->with('error', 'Hanya tabungan aktif yang dapat dibatalkan.');
        }

        $plan->update([
            'status' => 'refund_requested',
            'refund_note' => $request->note,
            'refund_requested_at' => now(),
        ]);

        return back()->with('success', 'Permintaan pembatalan dan refund telah diajukan kepada Admin.');
    }

    /**
     * Approve and process refund (Admin).
     */
    public function approveRefund($id)
    {
        $plan = SavingsPlan::findOrFail($id);
        
        if ($plan->status !== 'refund_requested') {
            return back()->with('error', 'Tidak ada permintaan refund untuk tabungan ini.');
        }

        $plan->update([
            'status' => 'refunded',
        ]);

        return back()->with('success', 'Refund jemaah ' . $plan->user->name . ' telah dikonfirmasi sebagai TERBAYAR.');
    }

    /**
     * Admin view of all savings.
     */
    public function adminIndex(Request $request)
    {
        $query = SavingsPlan::with(['user', 'product', 'deposits'])->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('user', function($uq) use ($search) {
                    $uq->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                })->orWhereHas('product', function($pq) use ($search) {
                    $pq->where('name', 'like', "%{$search}%");
                })->orWhere('status', 'like', "%{$search}%");
            });
        }

        $plans = $query->paginate(15)->withQueryString();
        $totalSavings = SavingsDeposit::sum('amount');
        
        return view('admin.savings.index', compact('plans', 'totalSavings'));
    }
}
