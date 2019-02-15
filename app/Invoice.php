<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idinvoice
 * @property int $idclient
 * @property int $idline
 * @property Client $client
 * @property Line $line
 */
class Invoice extends Model
{

    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'invoice';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idinvoice';

    /**
     * @var array
     */
    protected $fillable = ['idclient', 'idline'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Client', 'idclient', 'idclient');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function line()
    {
        return $this->belongsTo('App\Line', 'idline', 'idline');
    }
}
