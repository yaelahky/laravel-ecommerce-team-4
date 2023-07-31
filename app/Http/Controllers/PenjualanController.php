// app/Http/Controllers/PenjualanController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualanData = Penjualan::all(); // Ambil semua data penjualan dari database
        return view('penjualan.index', compact('penjualanData'));
    }
}
