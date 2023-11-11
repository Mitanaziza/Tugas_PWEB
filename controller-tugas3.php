<?php
class RoleController
{
    static function getRoles($id)
    {
        $roles = Role::selectWhere("id = ?", $id);
        return json_encode($roles);
    }
}