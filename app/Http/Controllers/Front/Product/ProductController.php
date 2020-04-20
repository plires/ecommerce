<?php

namespace App\Http\Controllers\Front\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show(Product $product) {
		
		$gallery = [];
    	$images = $product->images()->where('featured', false)->pluck('image');
    	foreach ($images as $key => $image) {
    		if (substr($image, 0, 4) === 'http') {
	            $gallery[$key] = $image;
	        } else {
	        	$gallery[$key] = url('img/' . $image);
	        }
    	}

    	if ($gallery) {
    		return view('products.show')->with(compact('product', 'gallery'));
    	} else {
    		return view('products.show')->with(compact('product'));
    	}

    }
}
