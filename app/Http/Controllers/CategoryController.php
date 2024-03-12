<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Retrive the list of categories
     * @param Request $request
     * @return array
     */

     public function index(Request $request)
     {
        // get all categories
        $categories =  Category::where('id',1)-;

        // return the view
        return view('categories',compact('categories'));

     }

     /**
      * Add Categiry form
      * @return view
      */

      public function categoryForm()
      {
        return view('add_category');
      }

      /**
       * Store the category information
       * @package App\Models\Catgory
       * @param Request $request
       * @return redirect
       */

       public function store(Request $request)
       {

             $storeCatgory =  Category::updateorcreate(['id' => $request->id],[
                'category_name' => $request->category_name
             ]);

            return redirect()->route('category.index');

       }

       /**
       * Edit the category information
       * @package App\Models\Catgory
       * @param Request $request
       * @return redirect
       */

       public function edit( $category)
       {

            $category = Category::findorfail($category);
            return view('add_category',compact('category'));
       }

       /**
       * Delete the category information
       * @package App\Models\Catgory
       * @param Request $request
       * @return redirect
       */

       public function destroy( $category)
       {

            $category = Category::find($category)->delete();
            return redirect()->route('category.index');
       }



}
