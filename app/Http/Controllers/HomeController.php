<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use function foo\func;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getUsers(){
        $user = new User();
        return DataTables::of($user::query())
            ->setRowClass(function ($user) {
            return $user->id % 2 == 0 ? 'alert-success' : 'alert-warning';})
            ->setRowId(function($user){ return $user->id;})
            ->setRowAttr(["align" => "center"])
            ->addColumn("intro",function ($user){ return "Hi! $user->name" ; })
            ->addColumn("created_at", function ($user) {return $user->created_at->diffForHumans();})
            ->editColumn("updated_at", "btn")
            ->rawColumns(["updated_at"])
            ->make(true);
    }
}
