<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Mail\CustomerEmailNotification;
use Illuminate\Support\Facades\Mail;

class CustomerEmailController extends Controller
{
    public function sendEmailToAllCustomers()
    {
        try {
            $customers = Customer::all();
            $subject = 'CRM Notification';
            $messageContent = 'This is a notification from your CRM.';

            foreach ($customers as $customer) {
                Mail::to($customer->email)
                    ->send(new CustomerEmailNotification(
                        $customer,
                        $subject,
                        $messageContent
                    ));
            }

            return redirect()->back()->with('success', 'Emails sent successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send emails: ' . $e->getMessage());
        }
    }
}
