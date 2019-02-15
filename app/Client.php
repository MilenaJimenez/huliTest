<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idclient
 * @property string $name
 * @property Invoice[] $invoices
 */
class Client extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'client';
    public $timestamps = false;

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idclient';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['idclient','name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany('App\Invoice', 'idclient', 'idclient');
    }
}
