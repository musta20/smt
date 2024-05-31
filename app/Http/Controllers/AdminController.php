<?php

namespace App\Http\Controllers;

use App\Enums\Identity\Role;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $Product = Product::where('tenant_id',tenant('id'))->take(10)->orderBy('order_count')->get();
        $customerCount = User::role(Role::CUSTOMER->value)->count();
        return view('admin.admin')->with( [
            "Product"=>$Product,
            "productCount" => $Product->sum('order_count'),
            "viewCount" => $Product->sum('view_count'),
            "customerCount" => $customerCount
        ]);
    }
}
