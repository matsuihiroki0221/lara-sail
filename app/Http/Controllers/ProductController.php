<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Interfaces\ProductInterface;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $result = $this->productRepository->index();
       return ProductResource::collection($result);
    }

    public function show($id)
    {
       $result = $this->productRepository->show($id);
       return new ProductResource($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProductCreateRequest $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $this->productRepository->store($request);
    }

    /**
     * Update
     *
     * @param  ProductUpdateRequest  $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->productRepository->update($request, $product);
    }

    /**
     * delete resource in storage.
     *
     * @param  TeacherAssignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $deleteProductId = $request->input('id');
        $this->productRepository->delete($deleteProductId);
    }
}
