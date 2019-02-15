<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idline
 * @property int $idproduct
 * @property float $quantity
 * @property float $price
 * @property float $tax_rate
 * @property float $discount_rate
 * @property string $currency
 * @property Product $product
 * @property Invoice[] $invoices
 */
class Line extends Model
{

    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'line';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idline';

    /**
     * @var array
     */
    protected $fillable = ['idproduct', 'quantity', 'price', 'tax_rate', 'discount_rate', 'currency'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'idproduct', 'idproduct');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany('App\Invoice', 'idline', 'idline');
    }
}
