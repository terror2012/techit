<?php

namespace App\Http\Controllers;

use App\Eloquent\payment_history;
use Illuminate\Http\Request;

class AdminPaymentsController extends Controller
{
        function index()
        {
            $paymentArray = [];
            $payments = payment_history::all();
            foreach($payments as $p)
            {
                $paymentArray[$p->id]['id'] = $p->id;
                $paymentArray[$p->id]['user_id'] = $p->user_id;
                $paymentArray[$p->id]['query_id'] = $p->query_id_data;
                $paymentArray[$p->id]['email'] = $p->email;
                $paymentArray[$p->id]['paid'] = $p->paid_amount;
                $paymentArray[$p->id]['created'] = $p->created_at->diffForHumans();
            }
            return view('admin/payments')->with('payment', $paymentArray);
        }
}
