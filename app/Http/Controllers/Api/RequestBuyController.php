<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SolicitudCompra;
use App\Http\Resources\RequestBuyResource;


class RequestBuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RequestBuyResource::collection(SolicitudCompra::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return new RequestBuyResource(SolicitudCompra::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SolicitudCompra $solicitudCompra)
    {
        return new RequestBuyResource($solicitudCompra);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SolicitudCompra $solicituCompra)
    {
        $solicituCompra->update($request->all());

        return new RequestBuyResource($solicituCompra);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SolicitudCompra $solicituCompra)
    {
        $solicituCompra->delete();

        return new RequestBuyResource($solicituCompra);
    }
}
