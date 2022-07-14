<?php

namespace App\Interfaces;


interface SalesProductInterface {
    public function index();

    public function store($request);

    public function update($request,$salesproduct);

    

    public function show($salesproduct);

    public function destroy($salesproduct);
}