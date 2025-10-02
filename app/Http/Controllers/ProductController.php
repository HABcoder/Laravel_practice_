<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Sub_categories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $all_prod = Product::all(); 
        return view('Admin/Product.index', compact('all_prod'));
    }

    public function create()
    {
        $all_cat = Sub_categories::join('categories', 'sub_categories.category_id', '=', 'categories.category_id')
            ->select('sub_categories.sub_category_id', 'sub_categories.sub_category_name', 'categories.category_name')
            ->get();

        return view('Admin/Product.create', compact('all_cat'));
    }

  public function store(Request $request)
{
    $request->validate([
        'product_name' => 'required',
        'description' => 'nullable|string',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'short_description' => 'nullable|string|max:500',
        'sku' => 'required|string|max:100|unique:products,sku',
        'price' => 'required|numeric',
        'discount_price' => 'nullable|numeric',
        'cost_price' => 'nullable|numeric',
        'stock' => 'required|integer',
        'min_stock' => 'nullable|integer',
        'sub_category' => 'required', // must select subcategory
        'is_active' => 'required',
    ]);

    // Collect product data
    $data = $request->only([
        'product_name',
        'price',
        'description',
        'short_description',
        'sku',
        'discount_price',
        'cost_price',
        'is_active'
    ]);

    // Fix field names to match database
    $data['quantity_in_stock'] = $request->stock;
    $data['min_stock_level'] = $request->min_stock ?? 5;
    $data['sub_category_id'] = $request->sub_category;

    // Handle image upload
    if ($request->hasFile('image_url')) {
        $image = $request->file('image_url');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('image'), $imageName);
        $data['image_url'] = $imageName;
    }

    // Insert product
    Product::create($data);

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}

        /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    }


