<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /*
     * Lista produktów, cache na 1 min
     * @return Response
     */

    public function index()
    {
        $products = Cache::remember("comunicaty.productslist", 1, function() {
                    
                });
        return view('product.index', compact($products));
    }

    /*
     * Aktualizacja danych produktu
     */

    public function update(Request $request, $id)
    {
        
    }

}
