<?php

namespace App\Http\Controllers;

use App\Models\Campaing;
use Illuminate\Http\Request;

class Campaings extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $list = Campaing::all();

            $response = [
                'code' => 200,
                'status' => 'success',
                'data' => $list,
                'message' => 'Listado generado con exito'
            ];

            return response()->json($response, $response['code']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Campaing $campaing)
    {
        try {
            $campaing->fill($request->all());
            $campaing->save();

            $response = [
                'code' => 200,
                'status' => 'success',
                'data' => $campaing,
                'message' => 'Registro guardado con exito'
            ];

            return response()->json($response, $response['code']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $campaing = Campaing::find($id);

            $response = [
                'code' => 200,
                'status' => 'success',
                'data' => $campaing,
                'message' => 'Registro encontrado con exito'
            ];

            return response()->json($response, $response['code']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $campaing = Campaing::find($id);
            $campaing->fill($request->all());
            $campaing->save();

            $response = [
                'code' => 200,
                'status' => 'success',
                'data' => $campaing,
                'message' => 'Registro actualizado con exito'
            ];

            return response()->json($response, $response['code']);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $campaing = Campaing::find($id);

            Campaing::where('id', $id)->update([
                'estado' => 0
            ]);

            $response = [
                'code' => 200,
                'status' => 'success',
                'data' => $campaing,
                'message' => 'Registro eliminado con exito'
            ];
            return response()->json($response, $response['code']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
