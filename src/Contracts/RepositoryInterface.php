<?php

namespace Mahmoudrdash\CustomePackegConnectOdoo\Contracts;

interface RepositoryInterface
{
    public function findAll(array $criteria = [], array $fields = []): array;
    public function findBy(array $criteria ): ?array;
    public function find($id): ?array;
    public function create(array $data): int;
    public function update($id, array $data): bool;
    public function delete($id):bool;
}