<?php

namespace App\Interfaces;


interface SalesProductInterface {
    public function index($storeId = null);

    public function store($request);

    public function update($request,$salesproduct);


    public function show($salesproduct);

    public function destroy($salesproduct);

    public function changeStatus($request);
}