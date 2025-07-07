<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HandleAPIController extends Controller
{
    private $baseUrl = 'https://petstore.swagger.io/v2'; /* adres petstore */

    public function showForm() {
        return view('pet.form');
    }
    public function store(Request $request) {
        $response = Http::post($this->baseUrl . '/pet', [
            'id' => (int) $request->id,
            'name' => $request->name,
            'photoUrls' => [$request->photo_url],
            'status' => $request->status
        ]);

        return back()->with('response', $response->json());
    }

    public function get(Request $request) { /* pobranie danych */
        $response = Http::get($this->baseUrl . '/pet/' . $request->id);

        if ($response->successful()) {
            return view('pet.details', ['pet' => $response->json()]);
        } 

        return back()->withErrors(['Nie znaleziono i/lub nie pobrano danych']);
    }

    public function update(Request $request) { /* aktualizacja danych */
        $response = Http::put($this->baseUrl . '/pet', [
            'id' => (int) $request->id,
            'name' => $request->name,
            'photoUrls' => [$request->photo_url],
            'status' => $request->status,
        ]);

        return back()->with('response', $response->json());
    }

    public function delete(Request $request) { /* usunięcie */
        $response = Http::delete($this->baseUrl . '/pet/' . $request->id);

        if ($response->successful()) {
            return back()->with('deleted', 'Usunięto pomyślnie');
        }

        return back()->withErrors(['Błąd podczas usuwania']);
    }

    

}
