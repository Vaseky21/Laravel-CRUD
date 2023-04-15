<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductControler extends Controller
{
    public function index(){
        $product= Product::paginate(3);

        return view('product.index',compact('product'));//['product'=>Product::latest()->paginate(5)]);
    }


    public function create(){
        return view('product.create');
    }
    public function store(Request $request){
        //validate date
        $request->validate(
            [
                'name' => 'required',
                'description'=> 'required',
                'image' => 'required | mimes:jpeg,jpg,png,gif| max:10000'
            ]);

        //upload image
       $imageName = time().'.'.$request->image->extension();
       $request->image->move(public_path('Product'),$imageName);

       $product = new Product;
       $product ->image = $imageName;
       $product ->name = $request->name;
       $product ->description = $request ->description;

       $product->save();

       return back()->withSuccess('Produkt vytvořen');

    }

    public function edit($id){
                $product = Product::where('id',$id)-> first();
                return view('product.edit',['product'=> $product]);
                
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'description'=> 'required',
                'image' => 'nullable | mimes:jpeg,jpg,png,gif| max:10000'
            ]);

            $product = Product::where('id',$id)->first();

            if(isset($request->image)){
                //upload image
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('Product'),$imageName);
                $product->image = $imageName;
            }
       

      
       $product ->name = $request->name;
       $product ->description = $request ->description;

       $product->save();

       return back()->withSuccess('Produkt upraven');
    }

    public function delete($id)
    {
      
        $product = Product::where('id', $id)->first();
           
            //Delete Image

            $image_name = $product->image;
            $image_path = 'product/' . $image_name;
            if(file_exists($image_path)){
             unlink($image_path);
            }
            $product->delete();
            return back()->withSuccess('Produkt smazán');
    }
    public function show($id)
    {
      
        $product = Product::where('id', $id)->first();
           
            return view('product.show',['product'=> $product]);
    }
}
