<?php
abstract class Model {
    protected $table_name;

    public function __construct($table_name) {
        $this->table_name = $table_name;
    }

    public abstract function selectById($id);

    public abstract function selectWhere($clause);

    public abstract function updateById($id, $data);

    public abstract function updateWhere($clause, $data);

    public abstract function deleteById($id);

    public abstract function deleteWhere($clause);
}