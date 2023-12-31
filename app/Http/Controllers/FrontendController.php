<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::orderBy('created_at','DESC')->paginate(3);
    	return view('frontend.list')->with('products',$products)->with('categories', $categories);
    }
    public function about()
    {
        return view("frontend.about");
    }
    public function contact()
    {
        return view("frontend.contact");
    }
    public function list()
    {
        $categories = Category::all();
        $products = Product::orderBy('created_at','DESC')->paginate(3);
    	return view('frontend.list')->with('products',$products)->with('categories', $categories);
    }
    public function show(string $id)
    {
        $categories = Category::all();
        return view('frontend.show')->with('product', Product::find($id))->with('categories',$categories);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function getByCategory($id=0) {
        $categories = Category::all();
        if (!$id) {
            $id = $categories->first()->id;
        }
        $products = DB::table('products')->where('category_id', $id)->paginate(3);
        return view('frontend.category')
            ->with('products', $products)
            ->with('categories', $categories);
    }
    public function getBySearch(Request $request) {
        $keyword = !empty($request->input('keyword'))?$request->input('keyword'):"";
        $categories = Category::all();
        if( $keyword != ""){
            return view('frontend.search')
                ->with('products', Product::where('name', 'LIKE', '%'.$keyword.'%')->paginate(2))
                ->with('keyword', $keyword)
                ->with('categories', $categories);
        } else {
            return view('frontend.search')
                ->with('products', Product::paginate(2))
                ->with('keyword', $keyword)
                ->with('categories', $categories);
        } 
    }
}
