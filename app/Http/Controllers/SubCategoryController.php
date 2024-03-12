<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories =  SubCategory::get();

        return view('sub_categories',compact('subCategories'));
    }

    /**
      * Add Categiry form
      * @return view
      */

      public function categoryForm()
      {
        $categories = Category::get();
        $category = '';
        return view('add_sub_category',compact('categories','category'));
      }

      /**
       * Store the category information
       * @package App\Models\Catgory
       * @param Request $request
       * @return redirect
       */

       public function store(Request $request)
       {
             $storeCatgory =  SubCategory::updateorcreate(['id' => $request->id],[
                'category_id' => $request['category_id'],
                'sub_category_name' => $request['category_name']
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

            $category = SubCategory::findorfail($category);
            $categories = Category::get();

            return view('add_sub_category',compact('category','categories'));
       }

       /**
       * Delete the category information
       * @package App\Models\Catgory
       * @param Request $request
       * @return redirect
       */

       public function destroy( $category)
       {

            $category = SubCategory::find($category)->delete();
            return redirect()->route('sub_category.index');
       }


       public function getsubCategories(Request $request)
       {
            $categoryId = $request->categoryId;
            $subCategories =  SubCategory::whereCategoryId($categoryId)->get();

            return response()->json($subCategories);
       }
}
