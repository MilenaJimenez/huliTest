<?php
namespace App\Providers;
use App\Library\Services\ExchangeRateServiceInterface;
  
class ExchangeRateService implements ExchangeRateServiceInterface
{

	private $ind_econom_ws = "http://indicadoreseconomicos.bccr.fi.cr/indicadoreseconomicos/WebServices/wsIndicadoresEconomicos.asmx";
	
	private $ind_econom_func = "ObtenerIndicadoresEconomicos";
	
	private $type = "314";

	private $name = "";


    public function getRateExchange()
    {		
		$urlWS = $this->ind_econom_ws."/".$this->ind_econom_func."?tcIndicador=".$this->type."&tcfechaInicio=".date('m/d/Y')."&tcfechaFinal=".date('m/d/Y')."&tcNombre=".$this->name."&tnSubNiveles=N";
		$exchangeRate = "";
		
		if (file_get_contents($urlWS)!=false) {
			$indWS = file_get_contents($urlWS);
			$xml = simplexml_load_string($indWS);
			$exchange_rate = trim(strip_tags(substr($xml,strpos($xml,"<NUM_VALOR>"),strripos($xml,"</NUM_VALOR>"))));
			$exchangeRate = number_format($exchangeRate,2);
		}		
		
		return $exchangeRate;				
	}
}