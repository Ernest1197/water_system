<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    // show all bills
    public function index() {
        $payments = Payment::latest()->with(['client', 'bill'])->paginate(20);

        return $payments; // view('payments.index', compact('payments'));
    }
}
