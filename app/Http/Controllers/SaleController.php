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
}
