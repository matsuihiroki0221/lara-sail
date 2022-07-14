<?php

namespace App\Http\Controllers;

use App\Models\SalesProduct;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSalesProductRequest;
use App\Interfaces\SalesProductInterface;

class SalesProductController extends Controller
{
    protected $salesProductRepository;

    public function __construct(SalesProductInterFace $salesProductRepository)
    {
        $this->salesProductRepository = $salesProductRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->salesProductRepository->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TeacherAssignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesProductRequest $request)
    {
        $this->salesProductRepository->store($request);
    }

    /**
     * Update a resource in storage.
     *
     * @param  TeacherAssignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesProduct $salesProduct)
    {
        $this->salesProductRepository->update($request,$salesProduct);
    }

    /**
     * delete resource in storage.
     *
     * @param  TeacherAssignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesProduct $salesProduct)
    {
        $this->salesProductRepository->destroy($salesProduct);
    }
}
