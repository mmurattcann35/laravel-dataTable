<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $resource = "index";

    public function index(UserDataTable $dataTable){
        return $dataTable->render("$this->resource");
    }
}
