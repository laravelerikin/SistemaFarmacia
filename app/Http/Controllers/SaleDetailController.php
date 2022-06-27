<?php

namespace App\Http\Controllers;

use App\Models\SaleDetail;
use Illuminate\Http\Request;
use App\Http\Resources\SaleDetailResource;
use App\Http\Resources\SaleDetailCollection;

class SaleDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saleDetails = SaleDetail::where('state', 1)->get();        
        return new SaleDetailCollection($saleDetails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_sale = $request->input('id_sale');
        $id_product = $request->input('id_product');
        $price = $request->input('price');
        $subtotal = $request->input('subtotal');
        //dd($request);
        $saleDetail = SaleDetail::storeSaleDetail($id_sale, $id_product, $price, $subtotal);

        return new SaleDetailResource($saleDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SaleDetail $sale)
    {        
        return new SaleDetailResource($sale);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleDetail $sale)
    {
        //dd($request);
        $id_sale = $request->input('id_sale');
        $id_product = $request->input('id_product');
        $price = $request->input('price');
        $subtotal = $request->input('subtotal');

        $sale->id_sale = $id_sale;
        $sale->id_product = $id_product;
        $sale->price = $price;
        $sale->subtotal = $subtotal;        
        //state
        $sale->save();

        return new SaleDetailResource($sale);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleDetail $sale)
    {        
        $sale->state = 0;
        $sale->save();
        return new SaleDetailResource($sale);
    }
}
