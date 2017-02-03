<?php

namespace App\Http\Controllers;

use App\Eloquent\inv_history;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    function index()
    {
        $history = inv_history::all();
        return view('admin.appointments')->with(compact('history'));
    }
    function view($id)
    {
        $invoice = inv_history::find($id);
        $invoiceData = [];
        $invoiceData['id'] = $invoice->id;
        $invoiceData['name'] = $invoice->name;
        $invoiceData['email'] = $invoice->email;
        $invoiceData['phone'] = $invoice->phone;
        $invoiceData['message'] = $invoice->message;

        switch($invoice->contact)
        {
            case 1:
                $pref = 'Email';
                break;
            case 2:
                $pref = 'Phone';
                break;
            case 3:
                $pref = 'Text';
                break;
        }

        $invoiceData['contact'] = $pref;
        $invoiceData['city'] = $invoice->city;
        $invoiceData['state'] = $invoice->state;
        $invoiceData['zip'] = $invoice->zip;
        $invoiceData['address'] = $invoice->address;
        $invoiceData['paid'] = $invoice->paid;
        $invoiceData['ammount'] = $invoice->amount;
        $invoiceData['status'] = $invoice->status;
        $invoiceData['invoice_sent'] = $invoice->invoice_sent;
        $invoiceData['reminders'] = $invoice->reminders;
        $invoiceData['solved_at'] = $invoice->solved_at;
        return view('admin.achieve_view')->with('invoice', $invoiceData);
    }
}
