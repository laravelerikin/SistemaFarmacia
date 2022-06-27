<?php

namespace App\Models;

use App\Models\BuyProduct;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleDetail extends Model
{
    use HasFactory;
    protected $table = 'sales_details';
    protected $primaryKey = 'id_sale_detail';

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'id_sale', 'id_sale');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }

    public static function storeSaleDetail($id_sale, $id_product, $price, $subtotal)
    {
        $saleDetail = new SaleDetail();

        $saleDetail->id_sale = $id_sale;
        $saleDetail->id_product = $id_product;
        $saleDetail->price = $price;
        $saleDetail->subtotal = $subtotal;
        $saleDetail->state = 1;

        $saleDetail->save();

        return $saleDetail;
    }
}
