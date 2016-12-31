<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use File;
use Response;

class ProductsController extends Controller
{
    public function index()
    {
    	list($products,$total) = $this->getProducts();
    	return view('products',compact('products','total'));

    }

    public function addProduct(Request $request)
    {
    	$this->validate($request,[
    		'name'=> 'required',
            'price'=> 'required',
            'quantity'=> 'required']); 

        $total_value = $request->price * $request->quantity;   
        //$request->request->add(['total_value'=> $total_value]);
    	Product::create($request->all());
    	
        $products = Product::orderBy('created_at')->get();    
        //$this->setJSONFile();

    	return response()->json(['products'=>$products]); //$request->all()]);
 		
    }

    protected function getProducts()
    {
        $products = Product::orderBy('created_at')->get();
        $total = 0;
        foreach($products as $prod){
            $total+=$prod->price*$prod->quantity;
        } 
        return [$products,$total];
    }

    protected function setJSONFile()
    {
        list($products,$total) = getProducts();
        $arr = [];
        foreach($products as $key => $product){
            $arr[$key][] = $product->name;
            $arr[$key][] = $product->quantity;
            $arr[$key][] = $product->price;
        }
        $data = json_encode($arr,['total'=>$total]);
        $fileName = 'productsfile.json';
        File::put(public_path('/upload/json/'.$fileName),$data);
        return Response::download(public_path('/upload/jsonfile/'.$fileName));
    }
}
