<?php

namespace App\Http\Controllers\Admin\api;

use App\Http\Controllers\Controller;
use App\Jobs\ProductLikedJob;
use App\Models\Product;
use App\Models\ProductUser;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function like($id)
    {
        $response = Http::get('http://localhost:8000/api/user');

        $user = $response->json();

        $productUser = ProductUser::create([
           'product_id' => $id,
            'user_id' => $user['id']
        ]);

        ProductLikedJob::dispatch($productUser->toArray())->onQueue('adminservice_queue');

        return response()->json(['message' => 'success']);
    }
}
