<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Job;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $catsCount = Category::count();
        $productsCount = Product::count();
        $offersCount = Offer::count();
        $customersCount = Customer::count();
        $jobsCount = Job::count();
        $usersCount = User::count();
        $orders = Order::count();
        return view("Dashboard.index", compact("catsCount", "productsCount", "offersCount", "customersCount", "jobsCount", "usersCount", "orders"));
    }
}
