<?php

namespace Mahmoudrdash\CustomePackegConnectOdoo\Repositories;

use Mahmoudrdash\CustomePackegConnectOdoo\Contracts\ClientInterface;
use Mahmoudrdash\CustomePackegConnectOdoo\Contracts\RepositoryInterface;

class CustomerRepository implements RepositoryInterface
{
    protected string $model = 'res.partner';
    public function __construct(
        protected ClientInterface $client
    ){}

    public function findAll(array $criteria = [], array $fields = []):array
    {
        $ids = $this->client->search($this->model, $criteria);
        return $ids ? $this->client->read($this->model, $ids, $fields) : [];
    }
    public function findBy(array $criteria ): ?array
    {
        return $this->client->search($this->model, $criteria) ?? null; 
    }
    public function find($id): ?array
    {
        return $this->client->read($this->model, [$id])[0] ?? null ;
    }
    public function create(array $data): int{
        return $this->client->create($this->model, $data);
    }
    public function update($id, array $data): bool{
        return $this->client->write($this->model, $id, $data);
    }
    public function delete($id):bool{
        return $this->client->write($this->model, $id, ['active' => false]);
    }
}