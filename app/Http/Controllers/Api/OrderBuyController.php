<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderBuyResource;
use Illuminate\Http\Request;
use App\Models\OrderBuy;

class OrderBuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderBuyResource::collection(OrderBuy::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return new OrderBuyResource(OrderBuy::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus(Request $request, OrderBuy $orderBuy){
        // creamos el registro en el campo history para el timelines
        $state = 0;
        $update = 0;
        if($request->firm === 'O'){
            $state = 4;
        }else if($request->firm === 'R'){
            $state = 5;
        }else{
            $state = 6;
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
            $orderBuy->update(['firms' => $request->updatedFirms, 'state_type_id' => $state ]);
            $orderBuy->update(['history' => $request->history]);
        }
        else{
            $orderBuy->update(['history' => $request->history]);
            $orderBuy->update(['firms' => $request->firms, 'state_type_id' => $state ]);
        }
    }
}
