<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestBuy;
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
        return RequestBuyResource::collection(RequestBuy::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        return new RequestBuyResource(RequestBuy::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RequestBuy $RequestBuy)
    {
        return new RequestBuyResource($RequestBuy);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestBuy $RequestBuy)
    {
        $RequestBuy->update($request->all());

        return new RequestBuyResource($RequestBuy);
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

    public function changeStatus(Request $request, RequestBuy $requestBuy){
        // creamos el registro en el campo history para el timelines
        $state = 0;
        $update = 0;
        if($request->firm === 'O'){
            $state = 4;
        }else if($request->firm === 'R'){
            $state = 5;
        }else{
            $state = 3;
        }

        if($request->updatedFirms)
        {
            foreach($request->updatedFirms as $item){
                if($item['state_type_id'] === 0){
                   $update = 1; 
                }
            }
            
        }
        
        if($update === 1){
            $requestBuy->update(['firms' => $request->updatedFirms, 'state_type_id' => $state ]);
        }
        else{
            $requestBuy->update(['history' => $request->history]);
            $requestBuy->update(['firms' => $request->firms, 'state_type_id' => $state ]);
        }
    }
}
