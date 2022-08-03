<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Device::query()
            ->where('user_id', auth('api')->user()->id)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $device = new Device();
        $device->fill($request->all());
        $device->user_id = auth('api')->user()->id;
        $device->save();

        return response()->json(['status' => 'success', 'message' => 'Dispositivo cadastrado com sucesso'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Device::query()->find($id);
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
        $device = Device::query()->find($id);
        $device->fill($request->all());
        $device->save();

        return response()->json(['status' => 'success', 'message' => 'Dispositivo atualizado com sucesso'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Device::query()->find($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Dispositivo excluido com sucesso'], 200);
    }
}
