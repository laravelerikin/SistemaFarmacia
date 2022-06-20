<?php

namespace App\Models;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $primaryKey = 'id_sale';

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class, 'id_product', 'id_product');
    }

    public static function storeSale(Request $request)
    {
        $sale = new Sale();        
        $sale->client = $request->input('client');
        $sale->nit = $request->input('nit', 0);
        $sale->total = $request->input('total', 0);
        $sale->decimal = $request->input('payed', 0);
        $sale->cambio = $request->input('return_price', 0);
        $sale->state = 1;
        $sale->save();
    }
}
