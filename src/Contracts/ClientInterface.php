<?php

namespace Mahmoudrdash\CustomePackegConnectOdoo\Contracts;

interface ClientInterface {

    public function authenticate(): int;
    public function search(string $model, array $criteria): array;
    public function read(string $model, array $ids, array $fields=[]): array;
    public function write(string $model,int $id , array $data): bool;
    public function create(string $model, array $data): int;

}


