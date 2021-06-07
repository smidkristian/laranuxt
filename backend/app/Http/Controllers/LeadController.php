<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function listAll() {
        return Lead::all();
    }
    public function customerLeads() {
        return Lead::select('date', 'brand', 'promoevent')->get();
    }
    public function leadDetail($id) {
        return Lead::findOrFail($id);
    }
    public function listProducts() {
        return Lead::select('country', 'brand', 'promoevent', 'date')->get();
    }
}
