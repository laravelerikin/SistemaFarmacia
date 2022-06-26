<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function create(Request $request)
    {
        try {
            $name = $request->input('name');
            $nit = $request->input('nit');
            $total = $request->input('total');
            $payed = $request->input('payed');
            $return_price = $request->input('return_price');

            $data = [
                'client' => $name,
                'nit' => $nit,
                'total' => $total,
                'payed' => $payed,
                'return_price' => $return_price
            ];

            Sale::storeSale(new Request($data));

            $dataResponse = [
                'status' => 'success',
                'message' => 'Venta guardado correctamente'
            ];
        } catch (\Exception $e) {
            $dataResponse = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }

        return response()->json($dataResponse);
    }

    public function list()
    {
        try {
            //lista todas las ventas
            $sales = Sale::all();

            //listar solo las ventas activos con estado 1
            $sales = Sale::where('state', 1)->get();

            $dataResponse = [
                'status' => 'success',            
                'data' => $sales
            ];
        } catch (\Exception $e) {
            $dataResponse = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }

        return response()->json($dataResponse);
    }

    public function show($sale)
    {
        $dataSale = Sale::find($sale);        
        
        $dataResponse = [
            'status' => 'success',
            'data' => [         
                'client' => $dataSale->client,
                'nit' => $dataSale->nit,
                'total' => $dataSale->total,
                'decimal' => $dataSale->decimal,
                'cambio' => $dataSale->cambio                
                ]
            ];

        return response()->json($dataResponse);
    }

    public function delete(Sale $sale)
    {
        try {
            $sale->state = 0;
            $sale->save();

            $dataResponse = [
                'status' => 'success',
                'message' => 'Venta eliminado correctamente',
            ];
            return response()->json($dataResponse);
        } catch (Exception $e) {
            $dataResponse = [
                'status' => 'error',
                'message' => 'Error al eliminar el venta',
            ];
            return response()->json($dataResponse);
        }
    }

    public function update(Request $request, Sale $sale)
    {
        try {            

            $name = $request->input('name');
            $nit = $request->input('nit');
            $total = $request->input('total');
            $payed = $request->input('payed');
            $return_price = $request->input('return_price');

            $sale->client = $name;
            $sale->nit = $nit;
            $sale->total = $total;
            $sale->decimal = $payed;
            $sale->cambio = $return_price;      

            $sale->save();
            $dataResponse = [
                'status' => 'success',
                'message' => 'venta actualizado correctamente',
            ];
            return response()->json($dataResponse);
        } catch (Exception $e) {
            $dataResponse = [
                'status' => 'error',
                'message' => 'Error al actualizar el venta',
            ];
            return response()->json($dataResponse);
        }
    }
}
