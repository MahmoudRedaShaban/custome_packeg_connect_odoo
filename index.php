<?php


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