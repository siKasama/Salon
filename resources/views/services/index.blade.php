@extends('layouts.app', ['activePage' => 'services.index', 'title' => 'Cabeleila Leila', 'navName' => 'Serviços', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Serviços</h4>
                            <p class="card-category">Listagem</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped" style="font-size: 0.993rem;">
                                <thead>
                                    <th>ID</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                {{ csrf_field() }}
                                @foreach($service as $serv)
                                    <tr>
                                        <td>{{ $serv->id }}</td>
                                        <td>{{ $serv->name }}</td>
                                        <td>{{ $serv->price }}</td>
                                        <td>
                                        <a href="{{ route('services.show', $serv->id) }}" class="text-green-600 hover:text-blue-900 mb-2 mr-2" title="Exibir Serviços">Ver</a>
                                        @if(auth()->user()->is_admin)
                                            <a href="{{ route('services.edit', $serv->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2" title="Editar Serviço">Editar</a>
                                            <form class="inline-block" action="{{ route('services.destroy', $serv->id) }}" method="POST" onsubmit="return confirm('Deseja mesmo excluir este Serviço?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2 cursor-pointer" value="Excluir" title="Excluir">
                                            </form>
                                        @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if(auth()->user()->is_admin)
                <div class="col-md-12">
                    <button class="btn-md"><a class="nav-link" href="{{ route('services.create') }}">Incluir</a></button>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection


