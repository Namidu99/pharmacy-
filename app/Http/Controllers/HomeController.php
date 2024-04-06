<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {
        return view('home');
    }
 
    public function ownerHome()
    {
        return view('dashboard');
    }

    public function ManagerHome()
    {
        return view('manager');
    }

    public function cashierHome()
    {
        return view('cashier');
    }
}