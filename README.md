# Odoo Connector Package

Odoo xml - RPC Connector using Ripcord with Repositry pattern and Solid archiecture .

## Installation

You can install the package via Composer:

```bash
composer require mahmoudrdash/custome_packeg_connect_odoo
```

## Usage

To use the package, you first need to configure your Odoo connection details.

```php
// Example usage

require_once __DIR__ . '/vendor/autoload.php';

use Mahmoudrdash\CustomePackegConnectOdoo\Client\ClientOdoo;
use Mahmoudrdash\CustomePackegConnectOdoo\Repositories\CustomerRepository;
use Mahmoudrdash\CustomePackegConnectOdoo\Services\CustomerService;


$clentOdoo = new ClientOdoo(
    "http://localhost:8069",
    "admin",
    "admin" ,
    "admin"
);

$customerRepository = new CustomerRepository($clentOdoo);
$customerService = new CustomerService($customerRepository);

$allCustomer  =  $customerService->getCustomerAll();

print_r($allCustomer);

// Create  Or Update 

$result = $customerService->syncCustomer([
    'name' => 'Mahmoud Reda',
    'email' => 'exampel@gmail.com',
    'phone' => '01000000000'
]);

print_r($result);

// Delete 
$customerService->deleteCustomerById(1);    
```
