<?php

namespace Mahmoudrdash\CustomePackegConnectOdoo\Services;

use Mahmoudrdash\CustomePackegConnectOdoo\Contracts\RepositoryInterface;

class CustomerService
{
    public function __construct(protected RepositoryInterface $repository){}

    public function syncCustomer(array $data)
    {
        $existingCustomer = $this->repository->findBy(['email' => $data['email']]);
        if ($existingCustomer) {
            $this->repository->update($existingCustomer['id'], $data);
            return  ['update' => true, 'id' => $existingCustomer['id']];
        } 
        return ['create' => true, 'id' => $this->repository->create($data)];
    }
    public function getCustomerAll()
    {
        return  $this->repository->findAll();
    }

    public function getCustomerBy(array $criteria): array|null
    {
        return $this->repository->findBy($criteria);
    }
    public function deleteCustomerById($id)
    {
        $this->repository->delete($id);
    }
}