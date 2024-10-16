<?php

Trait Model
{
    use DatabaseConnection;
    protected int $limit = 10;
    protected int $offset = 0;
    protected string $order_type = 'asc';

    public function findAll()
    {
        $query = "SELECT * FROM $this->table 
         order by $this->primaryKey $this->order_type 
         LIMIT $this->limit OFFSET $this->offset";

        $result = $this->query($query);
        return $result;
    }
    private function buildSelectQuery(array $data, array $dataNot): string
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE ';

        foreach ($data as $key => $value) {
            $query .= $key . ' = :' . $key . ' AND ';
        }
        foreach ($dataNot as $key => $value) {
            $query .= $key . ' != :' . $key . ' AND ';
        }

        $query = substr($query, 0, -5);
        $query .= ' order by ' . $this->primaryKey . ' ' . $this->order_type . ' LIMIT ' . $this->limit . ' OFFSET ' . $this->offset;

        return $query;
    }

    public function firstID()
    {
        $query = "SELECT * FROM $this->table 
         order by $this->primaryKey $this->order_type 
         LIMIT 1 OFFSET 0";

        $result = $this->query($query);
        return $result;
    }

    public function where(array $data, array $dataNot = [])
    {
        $query = $this->buildSelectQuery($data, $dataNot);
        $params = array_merge($data, $dataNot);

        return $this->query($query, $params);
    }

    public function first(array $data, array $dataNot = [])
    {
        $query = $this->buildSelectQuery($data, $dataNot);
        $params = array_merge($data, $dataNot);

        $result = $this->query($query, $params);

        return $result ? $result[0] : false;
    }

    public function insert(array $data)
    {
        $columns = implode(',', array_keys($data));
        $placeholders = ':' . implode(',:', array_keys($data));

        $query = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";

        $this->query($query, $data);

        return false;
    }

    public function update(int $id, array $data, string $idColumn = USERTABLE_ID): bool
    {
        if (!empty($this->allowedColumns)) {
            $data = array_filter($data, function ($key) {
                return in_array($key, $this->allowedColumns);
            }, ARRAY_FILTER_USE_KEY);
        }

        $setClause = '';
        foreach ($data as $key => $value) {
            $setClause .= "{$key} = :{$key}, ";
        }
        $setClause = substr($setClause, 0, -2);

        $query = "UPDATE {$this->table} SET {$setClause} WHERE {$idColumn} = :{$idColumn}";

        $data[$idColumn] = $id;

        $this->query($query, $data);

        return false;
    }

    public function delete(int $id, string $idColumn = USERTABLE_ID)
    {
        $query = "DELETE FROM {$this->table} WHERE {$idColumn} = :{$idColumn}";

        $this->query($query, [$idColumn => $id]);

        return false;
    }
}