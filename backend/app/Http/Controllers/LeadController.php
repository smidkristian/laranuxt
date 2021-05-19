<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function listAll() {
        return Lead::all()->chunk(7);
    }
    public function customerLeads() {
        return Lead::select('date', 'brand', 'promoevent')->get()->chunk(5);
    }
}
