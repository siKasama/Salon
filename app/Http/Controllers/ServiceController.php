<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;


class ServiceController extends Controller
{
    public function index() {
        $service = Service::all();
        return view('services.index', compact('service'));
    }

    public function create() {
        return view('services.create');
    }

    public function store(StoreServiceRequest $request) {
        $service = Service::create($request->validated());
        return redirect()->route('services.index');
    }

    public function show($id) {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }

    public function edit($id) {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service) {
        $service->update(array_filter($request->validated()));
        return redirect()->route('services.index');
    }

    public function destroy(Service $service) {
        $service->delete();
        return redirect()->route('services.index');
    }

}
