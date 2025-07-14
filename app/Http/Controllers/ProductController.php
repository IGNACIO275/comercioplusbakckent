<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Muestra una lista de productos, con inclusión de relaciones dinámicas (?included=...)
     */
    public function index()
    {
        $productos = Product::included() 
        ->filter()
        ->sort()
        ->getOrPaginate();;

        return response()->json([
            'status' => 'ok',
            'message' => 'Listado de productos',
            'data' => $productos,
        ]);
    }

    /**
     * Aquí puedes agregar más métodos si deseas (store, show, update, destroy)
     */
}

