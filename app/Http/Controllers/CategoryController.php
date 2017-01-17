<?php

namespace App\Http\Controllers;

use Validator;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index() {
        return view('category/index');
    }

    public function validator($data) {
        return Validator::make($data, [
            'name' => 'required|min:6|max:255',
            'description' => 'required|max:2000',
        ]);
    }

    public function create() {
        return view('category/create');
    }

    public function doCreate(Request $request) {
        $data = $request->all();

        $this->validator($data)->validate();

        $category = Category::create([
            'name'          => $data['name'],
            'description'   => $data['description'],
        ]);

        $category->save();

        return Redirect::to('/administrator/category');
    }

    public function edit($id) {
        $category = Category::find($id);
        
        return view('category/edit', [
            'category' => $category,
        ]);
    }

    public function doEdit($id, Request $request) {
        $data = $request->all();

        if(isset($data['id']) && $data['id'] != $id) {
            return Redirect::to('/administrator/category');
        }

        $this->validator($data)->validate();

        $category = Category::find($id);

        $category->fill([
            'name'          => $data['name'],
            'description'   => $data['description'],
        ]);

        $category->save();

        return Redirect::to('/administrator/category');
    }

    public function delete($id) {
        $category = Category::find($id);

        return view('category/delete', [
            'category' => $category,
        ]);
    }

    public function doDelete($id, Request $request) {
        $data = $request->all();

        if(isset($data['id']) && $data['id'] == $id) {
            return Redirect::to('/administrator/category');
        }

        $category = Category::find($id);
        $category->delete();

        return Redirect::to('/administrator/category');
    }
}
