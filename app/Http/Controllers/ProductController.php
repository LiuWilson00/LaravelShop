<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Rules\UrlSubRouteRule;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    function index()
    {
        $products = DB::table('products')->get();
        return view('product.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        //
        return view('product.create');
    }

    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:10',
            'price' => 'required|integer|min:0|max:999999',
            'image' => 'required' //['required', 'string', new UrlSubRouteRule]

        ]);
        // $path = $request->file('image')->store('local');
        $path = Storage::putFile('public/products', $request->file('image'));
        $newPath = str_replace("public", "storage", $path);

        DB::table('products')->insert([
            'name' => $request['name'],
            'price' => $request['price'],
            'image_url' =>  "/$newPath"
        ]);

        return redirect()->route('products.index');
    }

    function show($id, Request $request)
    {

        // $id = $request->input('id');

        $product = DB::table('products')->where("id", $id)->first();


        if (is_null($product)) {
            abort('404');
        }

        return view('product.show', [
            'product' =>  $product
        ]);
    }

    public function edit($id)
    {
        $product = DB::table('products')->where("id", $id)->first();


        if (is_null($product)) {
            abort('404');
        }

        return view('product.edit', [
            'product' =>  $product
        ]);
    }

    public function update(Request $request, $id)
    {
        //
        $product = DB::table('products')->where("id", $id)->first();

        if (is_null($product)) {
            return redirect()->route('products.index');
        }

        $affected = DB::table('products')
            ->where('id', 1)
            ->update([
                'name' => $request['name'],
                'price' => $request['price'],
            ]);
        return redirect()->route('products.edit', ['product' => $product->id]);
    }

    public function destroy($id)
    {
        //
        $product = DB::table('products')->where("id", $id)->first();


        if (is_null($product)) {
            return redirect()->route('products.index');
        }

        DB::table('products')->where("id", $id)->delete();
        return redirect()->route('products.index');
    }
}
