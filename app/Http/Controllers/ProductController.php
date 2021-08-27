<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'description'=>'required|max:191',
            'price'=>'required',
            'qty'=>'required' 
             
        ]);
       $product =  new Product;
       $product->name = $req->name;
       $product->description = $req->description;
       $product->price = $req->price;
       $product->quantity = $req->qty;
       $product->save();
       return response()->json(['message'=>'Product added Successfully'],200);



    }

    public function productLists()
    {
        $products = Product::all();
        return response()->json(['products'=>$products],200); 
    }
    public function showProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json(['product'=>$product],200);
        } else {
            return response()->json(['message'=>'No Product found'],404);
        }
        
    }

    public function update(Request $req,$id )
    {
        $req->validate([
            'name'=>'required|max:191',
            'description'=>'required|max:191',
            'price'=>'required|max:191',
            'qty'=>'required' 
             
        ]);
       $product = Product::find($id);
       if ($product) {
        $product->name = $req->name;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->quantity = $req->qty;
        $product->update();
        return response()->json(['message'=>'Product update Successfully'],200);

       } else {
        return response()->json(['message'=>'No Product Found '],404);
       }
    


    }
    public function deleteProduct($id)
    {
        $product  = Product::find($id);  
        if($product) 
        {
            $product->delete();
            return response()->json(['message'=>'product deleted successfully'],200 );
        } else {
            return response()->json(['message'=>'product not found'],200 );
        }
    }   

}
