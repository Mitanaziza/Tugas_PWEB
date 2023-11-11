<?php
class Students
{
    static function selectById($id)
    {
        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    static function selectWhere($clause)
    {
        $sql = "SELECT * FROM students WHERE $clause";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static function updateById($id, $name, $email, $role_fk)
    {
        $sql = "UPDATE students SET name = ?, email = ?, role_fk = ? WHERE id = ?";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $role_fk);
        $stmt->bindParam(4, $id);
        $stmt->execute();
    }

    static function updateWhere($clause, $data)
    {
        $sql = "UPDATE students SET %s WHERE $clause";
        $setClause = "";
        foreach ($data as $key => $value) {
            $setClause .= $key . " = ?, ";
        }
        $setClause = rtrim($setClause, ", ");
        $sql = sprintf($sql, $setClause);
        $stmt = DB::prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindParam($key, $value);
        }
        $stmt->execute();
    }

    static function deleteById($id)
    {
        $sql = "DELETE FROM students WHERE id = ?";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

    static function deleteWhere($clause)
    {
        $sql = "DELETE FROM students WHERE $clause";
        $stmt = DB::prepare($sql);
        $stmt->execute();
    }
}