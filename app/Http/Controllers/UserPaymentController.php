<?php

namespace App\Http\Controllers;

use App\Models\UserPayment;
use Illuminate\Http\Request;

class UserPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function upload(Request $request)
    {
       
        // Verifica si se ha enviado un archivo
        if ($request->hasFile('file')) {
            // Obtiene el archivo del request
            $file = $request->file('file');

            // Define la ubicación de almacenamiento
            $path = storage_path('app/public/uploads');

            // Genera un nombre único para el archivo
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Mueve el archivo a la ubicación de almacenamiento
            if($file->move($path, $fileName)){
                $payment = new UserPayment();
                $payment->img = $path.'/'.$fileName;
                $payment->id_user = $request->userId;
                $payment->monto = $request->amount;
                $payment->codigoCamp = $request->campaignId;
                $payment->estado = '0';

                $payment->save();
            }

            // Devuelve una respuesta de éxito
            return response()->json(['message' => 'Archivo cargado con éxito']);
        } else {
            // Devuelve una respuesta de error si no se proporciona un archivo
            return response()->json(['error' => 'No se proporcionó ningún archivo'], 400);
        }
    }
}
