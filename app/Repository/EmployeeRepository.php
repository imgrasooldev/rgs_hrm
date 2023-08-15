<?php
namespace  App\Repository;
use App\interface\EmployeeInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EmployeeRepository implements EmployeeInterface{
    public function store($data){
        $user = new User();
        $user->name = $data->first_name;
        $user->middle_name = $data->middle_name;
        $user->last_name = $data->last_name;
        $user->joining_date = $data->joining_date;
        $user->email = $data->work_email;
        $user->password = Hash::make($data->password);
        $user->type = $data->type;
        $user->save();
        //assign role
        $user->assignRole([$data->role]);


    }
}
