<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function buy(Request $request, Product $product)
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        $user = auth()->user();

        if ($user->role !== 'customer') {
            return redirect()->back()->with('error', 'Only customers can purchase.');
        }

        $quantity = $request->quantity ?? 1;

        if ($product->stock < $quantity) {
            return redirect()->back()->with('error', 'Not enough stock! Available: ' . $product->stock);
        }

        $total = $product->price * $quantity;

        if ($user->credit < $total) {
            return redirect()->back()->with('error', 'Insufficient Credit!');
        }

        DB::transaction(function () use ($user, $product, $quantity, $total) {
            $user->credit -= $total;
            $user->save();

            $product->stock -= $quantity;
            $product->save();

            Purchase::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'total_price' => $total
            ]);
        });

        return redirect()->back()->with('success', 'Purchase successful!');
    }

    public function myPurchases()
    {
    $user = auth()->user();
    
    // جلب كل مشتريات المستخدم مع بيانات المنتج
    $purchases = Purchase::where('user_id', $user->id)
                        ->with('product')
                        ->orderBy('created_at', 'desc')
                        ->get();
    
    return view('profile.my-purchases', compact('purchases'));
    }
}