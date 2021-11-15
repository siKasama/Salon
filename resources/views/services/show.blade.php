@extends('layouts.app', ['activePage' => 'services.show', 'title' => 'Cabeleila Leila', 'navName' => 'Serviços', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header">
                            <h4 class="card-title">Serviços</h4>
                        </div>
                        <div class="card-body">
                            <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
                                <div class="block mb-8">
                                    <a href="{{ route('services.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Listar Serviços</a>
                                </div>
                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"  style="font-size: 0.993rem;">
                                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                <table class="table table-hover table-striped">
                                                    <tr>
                                                        <th scope="col">
                                                            ID
                                                        </th>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                            {{ $service->id }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">
                                                            Descrição
                                                        </th>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                            {{ $service->name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">
                                                            Valor
                                                        </th>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                            {{ $service->price }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">
                                                            Cadastrado em
                                                        </th>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                            {{ $service->created_at }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block mt-8">
                                    <a href="{{ route('services.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Listar Serviços</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
