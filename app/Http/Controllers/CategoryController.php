<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
    {

        $order = $request->get('order');

        $search = $request->get('search');

        if ($order == 'asc' || $order == 'desc') {
            if (!empty($search)) {
                $categories = Category::query()
                    ->where('created_at', '<=', now())
                    ->where('name', 'like', "%$search%") //busca algo que contenga el search
                    ->orderBy('created_at', $order)
                    ->paginate(5);
            } else {
                // Si no hay título, solo aplica el orden
                $categories = Category::query()
                    ->where('created_at', '<=', now())
                    ->orderBy('created_at', $order)
                    ->paginate(5);
            }

        } else {

            if (!empty($search)) {
                $categories = Category::query()
                    ->where('created_at', '<=', now())
                    ->where('name', 'like', "%$search%")
                    ->paginate(5);

            } else {
                // Sin filtro ni orden, simplemente muestra los posts
                $categories = Category::query()
                    ->where('created_at', '<=', now())
                    ->paginate(5);
            }
        }

        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $posts = Post::all();

        return view('categories.show', compact('category', 'posts'));
    }
    public function create()
    {
        return view('categories.create', ['category' => new Category()]);
    }

    public function store(StoreCategoryRequest $request){

        Category::create($request->validated());

        return to_route('categories.index')
            ->with('status', 'Category creates succesfully!');
    }

    public function edit(Category $category){
        return view('categories.edit', compact('category'));
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {

        $category->update($request->validated());

        return to_route('categories.show', $category)
            ->with('status', 'Category updates succesfully!');
    }

    public function destroy(Category $category){
        $category->delete();

        return to_route('categories.index')
            ->with('status', 'Category deletes succesfully!');
    }
}
