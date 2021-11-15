@extends('layouts.app', ['activePage' => 'clients.index', 'title' => 'Cabeleila Leila', 'navName' => 'Clientes', 'activeButton' => 'laravel'])

@section('content')
<meta name = "csrf-token" content = "{{csrf_token ()}}">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Clientes</h4>
                            <p class="card-category">Listagem</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped" style="font-size: 0.979rem;">
                                <thead>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>e-mail</th>
                                    <th>Fone</th>
                                    <th>Cidade</th>
                                    <th>UF</th>
                                    <td colspan="2" class="text-center" style="font-size: 10px; color: gray;">Ações</td>
                                </thead>
                                <tbody>
                                {{ csrf_field() }}
                                @foreach($clients as $paci)
                                    <tr>
                                        <td>{{ $paci->id }}</td>
                                        <td>{{ $paci->name }}</td>
                                        <td>{{ $paci->email }}</td>
                                        <td>{{ $paci->fone}}</td>
                                        <td>{{ $paci->city }}</td>
                                        <td>{{ $paci->uf }}</td>
                                        <td  class="text-center p-0 align-middle"  style="font-size: 10px; max-width:10%">
                                            <a href="{{ route('clients.edit', $paci->id)}}" class="btn btn-primary btn-sm">@lang('Editar')</a>
                                        </td>
                                        <td  class="text-center p-0 align-middle"  style="font-size: 10px; max-width:10%">
                                            <form action="{{ route('clients.destroy', $paci->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm align-middle" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn-md"><a class="nav-link" href="{{ route('clients.create') }}">Incluir</a></button>

                 </form>
                </div>
            </div>
        </div>
    </div>
@endsection
