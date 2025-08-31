<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
      public function index()
    {
        $ordenProduct = OrderProduct::included() 
        ->filter()
        ->getOrPaginate();;

        return response()->json([
            'status' => 'ok',
            'message' => 'Listado de productos',
            'data' =>  $ordenProduct,
        ]);
    }
}
