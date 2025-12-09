<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Muestra la lista de productos.
     */
    public function products()
    {
        return view('products.products');
    }
}
