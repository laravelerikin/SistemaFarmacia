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
        return $this->hasMany(SaleDetail::class, 'id_sale', 'id_sale');
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class, 'id_product', 'id_product');
    }
}
