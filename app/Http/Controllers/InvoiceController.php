<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\ExchangeRateService;

use App\Invoice;
use App\Line;
use App\Client;
use App\Product;

 
class InvoiceController extends Controller
{
    public function index()
    {
        return Invoice::all();
    }

    public function show(Invoice $invoice)
    {
        return $invoice;
    }

    public function store(Request $request, ExchangeRateService $rateService)
    {
    	// $exchangeRate;
    	// $price;
    	$items[] = array();
    	$client = Client::where('idclient', '=', $request['client']['id'])->first();
    	if ($client === null) {
    		$client = Client::create([
    			'idclient'=> $request['client']['id'],
    			'name' => $request['client']['name']
    		]);
    	}

    	
    	foreach($request['lines'] as $line) {
    		$product = Product::where ('product_name', '=', $line['product'])->first();
    		if ($product === null) {
    			$product = Product::create([
    			'product_name' => $line['product']
    		]);
    	}

/*    	if( $line['currency'] ==="USD"){
    		$exchangeRate = $rateService->getRateExchange(); //Error 500
    		$price = $line['price'] * $exchangeRate;
    	}else{
    		$price = $line['price'];
    	}*/

    	$curline = Line::create([
    			'idproduct' => $product['idproduct'],
    			'quantity' => $line['quantity'],
    			'price' => $line['price'], //$price,
    			'tax_rate' => $line['tax_rate'],
    			'discount_rate' => $line['discount_rate'],
    			'currency' => $line['currency'] // "CRC",
    		]);

    	$items[] = $invoice = Invoice::create([
    			'idclient' => $client['idclient'],
    			'idline' => $curline['idline']
    		]);
    	}
    	return response()->json($items, 201);
    }


    public function update(Request $request, Invoice $invoice)
    {
        $invoice->update($request->all());

        return response()->json($invoice, 200);
    }

    public function delete(Invoice $invoice)
    {
        $invoice->delete();

        return response()->json(null, 204);
    }
}