<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Rules\UrlSubRouteRule;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class ProductController extends Controller
{
    function index()
    {
        $products = Product::all();

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
        // $path = Storage::putFile('public/products', $request->file('image'));
        // $newPath = str_replace("public", "storage", $path);
        $diskName = "public";
        $fileOriginalName = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('products', $fileOriginalName, $diskName);
        $newPath = str_replace("public", "storage", $path);


        Product::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'image_url' =>  "/storage/$newPath"
        ]);

        return redirect()->route('products.index');
    }

    function show($id, Request $request)
    {

        // $id = $request->input('id');

        $product =  Product::where("id", $id)->first();


        if (is_null($product)) {
            abort('404');
        }

        return view('product.show', [
            'product' =>  $product
        ]);
    }

    public function edit($id)
    {
        $product =  Product::where("id", $id)->first();


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
        $product =  Product::where("id", $id)->first();

        $validated = $request->validate([
            'name' => 'required|string|max:10',
            'price' => 'required|integer|min:0|max:999999',
            'image' => ['nullable', 'image'] //['required', 'string', new UrlSubRouteRule]

        ]);
        unset($validated['image']);
        if (is_null($product)) {
            return redirect()->route('products.index');
        }


        if ($request->has('image')) {
            $diskName = "public";
            $disk = Storage::disk($diskName);
            if ($disk->exists($product->image_url)) {
                $disk->delete($product->image_url);
            }
            $fileOriginalName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('products', $fileOriginalName, $diskName);
            $newPath = str_replace("public", "storage", $path);

            $validated['image_url'] = "/storage/$newPath";
        }

        $product->update($validated);
        // $affected = DB::table('products')
        //     ->where('id', $id)
        //     ->update([
        //         'name' =>  $validated['name'],
        //         'price' =>  $validated['price'],
        //         'image_url' =>  $newPath ? "/storage/$newPath" : $product->image_url
        //     ]);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        //
        $product =  Product::where("id", $id)->first();


        if (is_null($product)) {
            return redirect()->route('products.index');
        }
        $diskName = "public";
        $disk = Storage::disk($diskName);
        $storagePath = str_replace("/storage", "", $product->image_url);
        if ($disk->exists($storagePath)) {
            $disk->delete($storagePath);
        }


        $product->delete();
        // DB::table('products')->where("id", $id)->delete();
        return redirect()->route('products.index');
    }
}
