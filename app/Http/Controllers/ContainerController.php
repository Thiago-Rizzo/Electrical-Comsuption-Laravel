<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Container;
use App\Models\ContainerDevice;
use Exception;
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
        $containers = Container::query()
            ->with(['flag', 'cont_dev'])
            ->where('user_id', auth('api')->user()->id)
            ->get();

        foreach ($containers as $container) {
            $container->kw_total = 0;
            foreach ($container->cont_dev as $device) {
                $container->kw_total += $device->device->power * $device->consu_time * $device->consu_days * $device->quantity / 1000;
            }
            $container->rs_total = ($container->kw_total * 1.04) + ($container->kw_total * $container->flag->cost);
            $container->rs_total = round($container->rs_total, 2);

            $container->qtd_devices = count($container->cont_dev);
        }


        return $containers;
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
        $container->user_id = auth('api')->user()->id;
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
        $container = Container::query()
            ->with(['cont_dev'])
            ->where('user_id', auth('api')->user()->id)
            ->find($id);
        return $container;
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
        $container->user_id = auth('api')->user()->id;
        $container->save();

        try {
            $container->devices()->sync($request->devices);
        }
        catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'erro inesperado'], 429);
        }

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

    public function deleteContainerDevice($container_id, $device_id)
    {
        ContainerDevice::query()
            ->where('container_id', $container_id)
            ->where('device_id', $device_id)
            ->delete();

        return response()->json(['status' => 'success', 'message' => 'Dispositivo removido com sucesso'], 200);
    }

    public function getContainerDevice($container_id)
    {
        ContainerDevice::query()
            ->with('container')
            ->where('container_id', $container_id)
            ->get();

        return response()->json(['status' => 'success', 'message' => 'Dispositivo removido com sucesso'], 200);
    }
}
