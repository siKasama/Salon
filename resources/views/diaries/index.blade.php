@extends('layouts.app', ['activePage' => 'diaries.index', 'title' => 'Cabeleila Leila', 'navName' => 'Agenda', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Agenda</h4>

                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg" style="font-size: 0.993rem;">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <th>ID</th>
                                                    <th>Cliente</th>
                                                    <th>Serviço</th>
                                                    <th>Agendado</th>
                                                    <th>Obs</th>
                                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">  </th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($diaries as $diary)
                                                    <?php
                                                       $hourMark = $diary->hour;
                                                       $dataAgendada = substr($diary->dateBr, 0, 10) .' - '.  (strlen($hourMark) == 1 ? '0' . $hourMark : $hourMark) .   ':00';
                                                    ?>
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                            {{ $diary->id }}
                                                        </td>

                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                            {{ $diary->client->name }}
                                                        </td>

                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                            {{ $diary->service->name }}
                                                        </td>

                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                             {{ $dataAgendada }}
                                                        </td>

                                                        <td class="px-6 py-4 text-sm text-gray-900">
                                                            {{ Str::limit($diary->observations, 50)  }}
                                                        </td>

                                                        <td class="px-6 py-4 text-sm font-medium">
                                                            <a href="{{ route('diaries.show', $diary->id) }}" class="text hover:text-blue-900 mb-2 mr-2" title="Exibir usuário">Ver</a>
                                                            @if (substr($diary->dateBr, 0, 10) >= date('d/m/Y') && (auth()->user()->is_admin)) 
                                                            <a href="{{ route('diaries.edit', $diary->id) }}" class="text hover:text-indigo-900 mb-2 mr-2" title="Editar usuário">Editar</a>
                                                            <form class="inline-block" action="{{ route('diaries.destroy', $diary->id) }}" method="POST" onsubmit="return confirm('Deseja mesmo excluir este horário?');">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2 cursor-pointer" value="Excluir" title="Excluir usuário">
                                                            </form>
                                                            @endif 
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                            <p style="color: #5092EC; padding-left: 5%;">Total: {{$diaries->count()}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn-md"><a class="nav-link" href="{{ route('diaries.create') }}">Incluir</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection
