<?php
namespace App\Repository;
use App\interface\RolesInterface;
use Spatie\Permission\Models\Role;

class RolesRepository implements RolesInterface{
    public function all(){
        return Role::all();
    }
}
