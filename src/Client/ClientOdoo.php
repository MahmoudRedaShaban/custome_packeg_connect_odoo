<?php

namespace Mahmoudrdash\CustomePackegConnectOdoo\Client;

use Exception;
use Ripcord\Ripcord;
use Mahmoudrdash\CustomePackegConnectOdoo\Contracts\ClientInterface;

class ClientOdoo implements ClientInterface
{
    protected $common ;
    protected $object; 
    public function __construct(
        protected string $url,
        protected string $db,
        protected string $user,
        protected string $pass,
        protected int $user_odoo_id,
    )
    {
        $this->common = Ripcord::client($this->url."/xmlrpc/2/common");
        $this->object = Ripcord::client($this->url."/xmlrpc/2/object");

        $this->user_odoo_id = $this->authenticate();
    }
    public function authenticate(): int
    {
       $uid = $this->common->authenticate($this->db, $this->user, $this->pass, array());
           
       if (!$uid) {
           throw new Exception("ODoo authentication failed");
       }
       return $uid;
    }
    public function search(string $model, array $criteria): array{
        return $this->object->execute_kw($this->db, $this->user_odoo_id, $this->pass, $model, 'search', [$criteria]);
    }
    public function read(string $model, array $ids, array $fields=[]): array{
        return $this->object->execute_kw($this->db, $this->user_odoo_id, $this->pass, $model, 'read', [$ids, $fields]);
    }
    public function write(string $model,int $id , array $data): bool{
        return (bool) $this->object->execute_kw($this->db, $this->user_odoo_id, $this->pass, $model, 'write', [[$id], $data]);
    }
    public function create(string $model, array $data): int{
        return $this->object->execute_kw($this->db, $this->user_odoo_id, $this->pass, $model, 'create', [$data]);
    }
}