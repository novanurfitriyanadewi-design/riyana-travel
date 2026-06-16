<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | USER SIDE (PUBLIC)
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $q = $request->q;

        $data = Product::with('category')
            ->when($q, function ($query) use ($q) {
                $query->where('nama_paket', 'like', "%{$q}%")
                      ->orWhere('jenis', 'like', "%{$q}%")
                      ->orWhere('harga', 'like', "%{$q}%")
                      ->orWhere('durasi', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(6);

        return view('produk.index', compact('data'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN SIDE
    |--------------------------------------------------------------------------
    */

    public function adminIndex()
    {
        $data = Product::with('category')
            ->latest()
            ->paginate(10);

        return view('produk.admin_index', compact('data'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('produk.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'nama_paket' => 'required',
            'jenis' => 'required',
            'durasi' => 'required',
            'harga' => 'required|numeric',
            'hotel' => 'nullable',
            'maskapai' => 'nullable',
            'kuota' => 'required|integer',
            'tanggal_berangkat' => 'required|date',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('produk', 'public');
        }

        Product::create($data);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        $categories = Category::all();

        return view('produk.edit', compact('data', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = Product::findOrFail($id);

        $request->validate([
            'category_id' => 'required',
            'nama_paket' => 'required',
            'jenis' => 'required',
            'durasi' => 'required',
            'harga' => 'required|numeric',
            'hotel' => 'nullable',
            'maskapai' => 'nullable',
            'kuota' => 'required|integer',
            'tanggal_berangkat' => 'required|date',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('gambar')) {
            if ($data->gambar) {
                Storage::disk('public')->delete($data->gambar);
            }

            $input['gambar'] = $request->file('gambar')
                ->store('produk', 'public');
        }

        $data->update($input);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Product::findOrFail($id);

        if ($data->gambar) {
            Storage::disk('public')->delete($data->gambar);
        }

        $data->delete();

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}