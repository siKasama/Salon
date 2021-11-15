@extends('layouts.app', ['activePage' => 'diaries.show', 'title' => 'Cabeleila Leila', 'navName' => 'Agendamento', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Agendamento</h4>
                        </div>
                        <div class="card-body">
                            <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
                                <div class="block mb-8">
                                    <a href="{{ route('diaries.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Listar Agendamentos</a>
                                </div>
                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                <table class="table table-hover table-striped" style="font-size: 0.993rem;">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            ID:
                                                        </th>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                            {{ $diary->id }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Cliente:
                                                        </th>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                            {{ $diary->client->name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Serviço:
                                                        </th>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                            {{ $diary->service->name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Agendado para:
                                                        </th>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                        <?php
                                                       $hourMark = $diary->hour;
                                                       echo $dataAgendada = substr($diary->dateBr, 0, 10) .' - '.  (strlen($hourMark) == 1 ? '0' . $hourMark : $hourMark) .   ':00';
                                                    ?>

                                                            <!-- {{ $diary->dateBr }} -->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Observações:
                                                        </th>
                                                        <td class="px-6 py-4 text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                            {{ $diary->observations }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Criado em:
                                                        </th>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                            {{ $diary->created_at }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block mt-8">
                                    <a href="{{ route('diaries.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Listar Agendamentos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
