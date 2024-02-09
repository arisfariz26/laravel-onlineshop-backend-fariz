<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
            $categories = Category::count();

            $products = Product::count();

            $user = User::count();

            $orders = Order::where('status', 'pending')->get();

            // $bestProduct = DB::table('transaction_details')
            //     ->addSelect(DB::raw('products.name as name, sum(transaction_details.quantity) as total'))
            //     ->join('products', 'products.id', 'transaction_details.product_id')
            //     ->groupBy('transaction_details.product_id')
            //     ->orderBy('total', 'DESC')
            //     ->limit(5)->get();

            // $label = [];

            // $total = [];

            // if (count($bestProduct)) {
            //     foreach ($bestProduct as $data) {
            //         $label[] = $data->name;
            //         $total[] = (int) $data->total;
            //     }
            // } else {
            //     $label[] = '';
            //     $total[] = '';
            // }

            return view('pages.dashboard', compact('categories', 'products', 'user', 'orders'));

    }
}
