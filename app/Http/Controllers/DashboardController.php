<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacature;

class DashboardController extends Controller
{
    public function index()
    {
        $vacatures = Vacature::with(['bedrijf', 'status', 'contactpersoon'])->orderByDesc('created_at')->limit(10)->get();
        return view('dashboard', compact('vacatures'));
    }
}
