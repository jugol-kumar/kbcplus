<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $otherAddress  = Address::where('user_id', Auth::id())->where('delivery_option', 'OTHER')->orderBy('id', 'desc')->first();
        $officeAddress = Address::where('user_id', Auth::id())->where('delivery_option', 'WORK')->orderBy('id', 'desc')->first();
        $homeAddress   = Address::where('user_id', Auth::id())->where('delivery_option', 'HOME')->orderBy('id', 'desc')->first();
        $address = [ $otherAddress,  $officeAddress,  $homeAddress];

        return response()->json([
           'code' => 200,
           'address' => $address,
        ]);

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
    public function store(Request $request){

        Address::create([
            'user_id' => Auth::id(),
            'delivery_address' => $request->area,
            'completed_address' => $request->address,
            'phone' => $request->phone,
            'delivery_institutions' => $request->instruction,
            'delivery_option' => $request->option,
        ]);


        return response()->json([
            'code' => 200,
            'msg' => "Address Save Successfully Done.. "
        ]);
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



    public function updateUserAddress(Request $request){
        $address = Address::findOrFail($request->addId);
        $address->update([
            'user_id' => Auth::id(),
            'delivery_address' => $request->area,
            'completed_address' => $request->address,
            'phone' => $request->phone,
            'delivery_institutions' => $request->instruction,
            'delivery_option' => $request->option,
        ]);

        return response()->json([
            'code' => 200,
            'msg' => "Address Update Successfully Done.. "
        ]);
    }


}
