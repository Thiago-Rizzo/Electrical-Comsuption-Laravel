<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Container;
use Illuminate\Support\Facades\DB;

class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Container::query()
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
        $container = new Container();
        $container->fill($request->all());
        $container->save();

        return response()->json(['status' => 'success', 'message' => 'Painel cadastrado com sucesso'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Container::query()->with(['devices', 'flag'])->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $container = Container::query()->find($id);
        $container->fill($request->all());
        $container->save();

        return response()->json(['status' => 'success', 'message' => 'Painel atualizado com sucesso'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Container::query()->find($id)->delete();

        return response()->json(['status' => 'success', 'message' => 'Painel excluido com sucesso'], 200);
    }

    public function deleteDeviceContainer($container_id, $device_id)
    {
        DB::table('container_devices')
            ->where('container_id', $container_id)
            ->where('device_id', $device_id)
            ->delete();

        return response()->json(['status' => 'success', 'message' => 'Dispositivo removido com sucesso'], 200);
    }
}
