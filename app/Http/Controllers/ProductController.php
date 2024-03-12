<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products =  Product::get();

        return view('products',compact('products'));
    }

    /**
      * Add Categiry form
      * @return view
      */

      public function productForm()
      {
        $categories = Category::get();
        $category = '';
        return view('add_product',compact('category','categories'));
      }

      /**
       * Store the category information
       * @package App\Models\Catgory
       * @param Request $request
       * @return redirect
       */

       public function store(Request $request)
       {
             $product =  Product::updateorcreate(['id' => $request->id],[
                'category_id' => $request['category_id'],
                'sub_category_id' => $request['sub_category_id'],
                'name' => $request['product_name'],


             ]);

            return redirect()->route('product.index');

       }


       /**
       * Edit the category information
       * @package App\Models\Catgory
       * @param Request $request
       * @return redirect
       */

       public function edit( $category)
       {

            $product = Product::findorfail($category);
            $categories = Category::get();
            $sub_categories = SubCategory::get();

            return view('add_product',compact('product','categories','sub_categories'));
       }

       /**
       * Delete the category information
       * @package App\Models\Catgory
       * @param Request $request
       * @return redirect
       */

       public function destroy( $category)
       {

            $category = Product::find($category)->delete();
            return redirect()->route('product.index');
       }


}
