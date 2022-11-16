<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Act;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ActResource;

class ActController extends Controller
{
    protected $acts;
    
    public function __construct(Act $acts)
    {
        $this->acts = $acts;
    }

    public function index()
    {
        // return response()->json(
        //     new ActResource(
        //         $this->acts->orderBy('id', 'desc')->get()
        //     )
        // );
        return ActResource::collection(Act::orderBy('order_buy_id','desc')->orderBy('id','desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
