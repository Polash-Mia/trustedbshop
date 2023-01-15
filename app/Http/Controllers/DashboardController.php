<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use DateTime;

class DashboardController extends Controller
{
    // public function index(){
    //     return view('admin.home.index');
    // }

    private $todayOrder,$todayDelivared,$todayPayment,$totalCustomer,$totalOrder,$totalProduct;
    public function index()
   {
    
  $this->todayOrder=Order::whereDate('created_at', '=', date('Y-m-d'))->count();
  $this->todayDelivared=Order::where('delivery_status','Complete')->whereDate('created_at', '=', date('Y-m-d'))->count();
      $this->todayPayment=Order::where('payment_status','Complete')->whereDate('created_at', '=', date('Y-m-d'))->count();
  
     $this->totalCustomer= Customer::count();
      $this->totalOrder= Order::count();
      $this->totalProduct= Product::count();

      return view('admin.home.index',[
      'totalCustomer'   =>$this->totalCustomer,
      'totalOrder'      =>$this->totalOrder,
      'totalProduct'    =>$this->totalProduct,
      'todayOrder'      =>$this->todayOrder,
      'todayDelivared'  =>$this->todayDelivared,
      'todayPayment'    =>$this->todayPayment,
   ]);
   
   }
}
