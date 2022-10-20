<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\User;

class ClientController extends Controller
{


    public function index()
    {
        $empresa  = Empresa::get();
        $user = User::role('Project')->get();

            return response()->json([
                'empresa'=>$empresa,
                'user'   =>$user,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa  = Empresa::get();
        return response()->json(['empresa'=>$empresa]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa  = Empresa::get();
        $user = User::role('Project')->get();

            return response()->json([
                'empresa'=>$empresa,
                'user'   =>$user,
            ]);
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
        $empresa  = Empresa::get();
        return response()->json(['empresa'=>$empresa]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa  = Empresa::get();
        return response()->json(['empresa'=>$empresa]);
    }
}
