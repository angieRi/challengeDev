<?php
class Client {
	private $id;
	private $name;

	//TODO: implementar getter y setters $id y $name
	public function setId($id) {
	    if($id){//no debe ser vacío
            $this->id = $id;
        }else{
	        echo "Ingrese un id";
        }

	}

	public function setName($name) {
        if($name){
            $this->name= $name;
        }else{
            echo "Ingrese un Nombre";
        }

		
	}

	public function getId() {
        return $this->id;
	}

	public function getName() {
		return $this->name;
	}
}

class Movement {
	public $currency; // Puede ser 'USD' o 'ARS'
	public $amount; // Puede ser un número positivo o negativo

  function  __construct($currency, $amount) {
		$this->currency = $currency;
		$this->amount = $amount;
	}
}

class Account {
	private $client;
	private $cvu;
	private $movements = array();

	//TODO: implementar getCvu > obtiene el CVU de la cuenta
	public function getCvu() {

	    $name = "";
	    if($this->client){
	        $name = $this->client->getName();
	        $id = $this->client->getId();

           return $this->getNameUpperAndFilter($id,$name);
        }else{
	        echo "Debe ingresar un Cliente";
        }

	}

    /**
     * @param $cvu
     * @param $name
     * @return string,retorna nombre en mayuscula y concatenada con punto.
     */
	private function getNameUpperAndFilter($cvu,$name)
    {
        setlocale(LC_ALL, 'en_US.UTF8');
        $nameAux= preg_replace("/[^A-Za-z0-9 ]/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $name));
        $nameUpper = mb_strtoupper($nameAux,'utf-8');
        $nameFilter = preg_filter("([/ /]+)", ".", $nameUpper);
        $cvuAux = $cvu.'-'.$nameFilter;
       return $cvuAux;
    }

	//TODO: implementar setClient > Asigna el cliente de la cuenta
	public function setClient(Client $client) {

	    if($client){
            $this->client = $client;
        }else{
	        echo "Ingrese Cliente válido";
        }

	}

	//TODO: implementar addMovement > permite agregar un movimiento a la cuenta
	public function addMovement($movement) {
	    if($movement){
	        $this->movements[]=$movement;
        }else{
	        echo "EL Movimiento no es válido";
        }

	}

	//TODO: implementar getBalance > permite obtener el saldo de la cuenta en ARS o USD
	public function getBalance($currency) {

	    if($currency =="USD" || $currency == "ARS")
        {

            $movements = $this->movements;

            $saldo=0;
            foreach($movements as $movement)
            {
                if($movement->currency == $currency )
                {
                    $saldo += $movement->amount;
                }
            }
            return $saldo;
        }else{
	        echo "Moneda inválida";
        }
	}
}