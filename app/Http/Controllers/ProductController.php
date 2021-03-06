<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:50',
                'price' => 'required|numeric',                
            ]);

            $name = $request->input('name');
            $price = $request->input('price');
            $detail = $request->input('detail');

            if($request->file('photo')->isValid()) {
                $photo = $request->file('photo');
                $path = $photo->store('products','public');
            }

            $data = [
                'name' => $name,
                'price' => $price,
                'detail' => $detail,
                'photo' => $path
            ];

            Product::storeProduct(new Request($data));

            $dataResponse = [
                'status' => 'success',
                'message' => 'Producto guardado correctamente'
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
            //lista todo los productos
            $products = Product::all();

            //listar solo los productos activos con estado 1
            $products = Product::where('state', 1)->get();

            $dataResponse = [
                'status' => 'success',            
                'data' => $products
            ];
        } catch (\Exception $e) {
            $dataResponse = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }

        return response()->json($dataResponse);
    }

    public function show($product)
    {
        $dataProduct = Product::find($product);
        
        $dataResponse = [
            'status' => 'success',
            'data' => [                
                'name' => $dataProduct->name,
                'price' => $dataProduct->price,
                'detail' => $dataProduct->detail,
                'photo' => Storage::url($dataProduct->photo),
                'photo_base64' => base64_encode(Storage::get('public/'.$dataProduct->photo))
            ]
        ];

        return response()->json($dataResponse);
    }

    public function delete(Product $product)
    {
        try {
            $product->state = 0;
            $product->save();

            $dataResponse = [
                'status' => 'success',
                'message' => 'Producto eliminado correctamente',
            ];
            return response()->json($dataResponse);
        } catch (Exception $e) {
            $dataResponse = [
                'status' => 'error',
                'message' => 'Error al eliminar el producto',
            ];
            return response()->json($dataResponse);
        }

        // $dataProduct = Product::find($product);
        // dd($product);
    }

    public function update(Request $request, Product $product)
    {
        try {
            $name = $request->input("name");
            $price = $request->input("price");
            $detail = $request->input("detail");

            $product->name = $name;
            $product->price = $price;
            $product->detail = $detail;

            $product->save();
            $dataResponse = [
                'status' => 'success',
                'message' => 'Producto actualizado correctamente',
            ];
            return response()->json($dataResponse);
        } catch (Exception $e) {
            $dataResponse = [
                'status' => 'error',
                'message' => 'Error al actualizar el producto',
            ];
            return response()->json($dataResponse);
        }
    }
}
