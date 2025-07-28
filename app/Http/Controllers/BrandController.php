<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Services\BrandService;
use App\Http\Requests\StoreBrandRequest;

class BrandController extends Controller
{
    public function __construct(private BrandService $service) {}

    public function index()
    {
        return view('brands.index', ['brands' => Brand::all()]);
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(StoreBrandRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('brands.index')->with('success', 'Марка добавлена');
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(StoreBrandRequest $request, Brand $brand)
    {
        $this->service->update($brand, $request->validated());
        return redirect()->route('brands.index')->with('success', 'Марка обновлена');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back()->with('success', 'Марка удалена');
    }
}
