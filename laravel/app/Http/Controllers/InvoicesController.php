<?php

namespace App\Http\Controllers;

use App\Eloquent\inv_history;
use App\Eloquent\invoices;
use App\Eloquent\query_data;
use App\Mail\InvoiceMessage;
use App\Mail\ReminderMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;

class InvoicesController extends Controller
{
    function index()
    {
        $invoice = invoices::all();
        return view('admin.invoices')->with(compact('invoice'));
    }
    function view($id)
    {
        $invoice = invoices::find($id);
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
        $invoiceData['created_at'] = $invoice->created_at;
        return view('admin.invoice_view')->with('invoice', $invoiceData);
    }

    function reminder($id, Mailer $mail)
    {
        $invoice = invoices::find($id);

        $mail->to($invoice->email)
            ->send(new ReminderMessage($id, $invoice->amount));
        $invoice->reminders = '1';
        $invoice->save();
        return redirect()->route('invoices');
    }
    function send($id, Mailer $mail)
    {
        $invoice = invoices::find($id);

        $mail->to($invoice->email)
            ->send(new InvoiceMessage($id, $invoice->amount));
        $invoice->invoice_sent = '1';
        $invoice->save();
        return redirect()->route('invoices');
    }
    function archieve($id)
    {
        $history = new inv_history();

        $invoice = invoices::find($id)->first();

        $qD = query_data::where('invoice_id', '=', $id)->first();

        $history->name = $invoice->name;
        $history->email = $invoice->email;
        $history->phone  = $invoice->phone;
        $history->message = $invoice->message;
        $history->contact = $invoice->contact;
        $history->city = $invoice->city;
        $history->state = $invoice->state;
        $history->zip = $invoice->zip;
        $history->address = $invoice->address;
        $history->paid = $invoice->paid;
        $history->status = $invoice->status;
        $history->invoice_sent = $invoice->invoice_sent;
        $history->reminders = $invoice->reminders;
        $history->date = $qD->date;
        $history->time = $qD->time;
        $history->solved_at = Carbon::now();

        $history->save();

        $invoice->delete();

        return redirect()->route('invoices');
    }
}
