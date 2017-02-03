<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use App\Eloquent\invoices;
use App\Eloquent\queries;
use App\Eloquent\query_data;
use App\Mail\InvoiceMessage;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;

class EditScheduleController extends Controller
{
    function index()
    {
        $query = queries::all();
        return view('admin.schedule')->with(compact('query'));
    }
    function up($id, Mailer $mail)
    {
        $invoice = new invoices();
        $query = queries::find($id);
        $queryD = query_data::where('query_id', '=', $id)->first();

        $inv = invoices::all()->last();
        $inv_id = $inv->id + 1;


        //Appointment to Invoice Conversion
        $invoice->name = $query->name;
        $invoice->email = $query->email;
        $invoice->phone = $query->phone;
        $invoice->message = $query->message;
        $invoice->contact = $query->contact;
        $invoice->city = $query->city;
        $invoice->state = $query->state;
        $invoice->zip = $query->zip;
        $invoice->address = $query->address;
        $invoice->paid = $query->paid;
        $invoice->amount = $query->amount;
        $invoice->invoice_sent = '0';
        $invoice->reminders = '0';
        $invoice->created_at = $query->created_at;
        $invoice->save();

        $query->delete();
        $queryD->query_id = null;
        $queryD->save();


        $gen = general_settings::find('1');
        if($gen->email_on_upgrade == '1')
        {
            $mail->to($invoice->email)
                ->send(new InvoiceMessage($inv_id, $queryD->ammount_to_pay));
            flash('Invoice #' .$inv_id .' sent succesful', 'success');
            return redirect()->route('schedule');
        }
        else
        {
            flash('Query Upgraded to Invoice #' .$inv_id.' successful', 'info');
            return redirect()->route('schedule');
        }
    }
    function decline($id)
    {
        $query = queries::find($id);
        $queryD = query_data::where('query_id', '=', $id)->first();
        $queryD->query_id = null;
        $queryD->save();
        $query->delete();
        flash('Query #' .$id. ' has been deleted successfully', 'info');
        return redirect()->route('schedule');
    }
    function view($id)
    {
        $query = queries::find($id);
        $queryData = [];
        $queryData['name'] = $query->name;
        $queryData['email'] = $query->email;
        $queryData['phone'] = $query->phone;
        $queryData['message'] = $query->message;

        switch($query->contact)
        {
            case 1:
                $preference = 'Email';
                break;
            case 2:
                $preference = 'Phone';
                break;
            case 3:
                $preference = 'Text';
                break;
        }

        $queryData['contact'] = $preference;
        $queryData['city'] = $query->city;
        $queryData['state'] = $query->state;
        $queryData['zip'] = $query->zip;
        $queryData['address'] = $query->address;
        $queryData['paid'] = $query->paid;
        $queryData['ammount'] = $query->amount;
        $queryData['created_at'] = $query->created_at;

        return view('admin.schedule_view')->with('invoice', $queryData);
    }
}
