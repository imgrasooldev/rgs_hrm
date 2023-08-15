<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\EmployeeRepository;
use App\Repository\RolesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;

class AdminController extends Controller
{
    private $employee = null;
    private $roles = null;

    public function __construct()
    {
        $this->employee = new EmployeeRepository();
        $this->roles = new RolesRepository;
    }

    public function index(){
        return view('admin.dashboard');
    }

    public function register_form(){
        $roles = $this->roles->all();
        return view('admin.pages.employee.index', compact('roles'));
    }

    public function store(Request $request){
        $this->employee->store($request);
    }

}
