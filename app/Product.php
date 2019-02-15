<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idproduct
 * @property string $product_name
 */
class Product extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Product';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idproduct';

    /**
     * @var array
     */
    protected $fillable = ['product_name'];

}
