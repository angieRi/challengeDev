# Account
En el archivo Account.php se encuentran tres clases que hay que completar:
- Client: representa un cliente 
- Account: representa una cuenta  
	- Cada cuenta esta asociada a un cliente
	- Cada cuenta tiene un CVU, dicho CVU se da de alta automaticamente como {id cliente}-{nombre del cliente en mayusculas, sin acentos y reemplazando espacios por punto(.)}
		- Ej. Para el cliente José Perez con id: 2882345, la cuenta tendrá el CVU: 28405123-JOSE.PEREZ
	- Cada cuenta tiene movimientos, dichos movimeinto pueden ser en USD o ARS
	- Cada cuenta permite obtener el saldo de la misma en USD o ARS
- Movement: representa un movimiento de cuenta, tiene una moneda: USD o ARS y una cantidad que puede ser un número positivo o negativo.

## Objetivo
Finalmente se solicita implementar los métodos vacios en las clases Client y Account para completar los tests.

Ejempo del funcionamiento de las clases a implementar:

```php
require('Account.php'); // <-- Implementa los métodos faltantes en Account.php

$account = new Account();

$client = new Client();
$client->setId('2882345');
$client->setName('Maria Mercedes');

$account->setClient($client);

$account->addMovement(new Movement('USD',100));
$account->addMovement(new Movement('ARS',100));
$account->addMovement(new Movement('ARS',-50));

$cvu = $account->getCvu(); // $cvu = "2882345-MARIA.MERCEDES"
$balance = $account->getBalance('ARS'); // $balance = 50

```
