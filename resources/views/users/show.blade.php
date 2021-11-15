@extends('layouts.app', ['activePage' => 'user.show', 'title' => 'Cabeleila Leila', 'navName' => 'Usuários', 'activeButton' => 'laravel'])

@section('content')
<meta name = "csrf-token" content = "{{csrf_token ()}}">
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Usuários</h4>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
                            <div class="block mb-8">
                                <a href="{{ route('users.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Listar todos</a>
                            </div>
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg" style="font-size: 0.993rem;">
                                            <table class="table table-hover table-striped">
                                                <tr class="border-b">
                                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        ID
                                                    </th>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                        {{ $user->id }}
                                                    </td>
                                                </tr>
                                                <tr class="border-b">
                                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Nome
                                                    </th>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                        {{ $user->name }}
                                                    </td>
                                                </tr>
                                                <tr class="border-b">
                                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        E-mail
                                                    </th>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                        {{ $user->email }}
                                                    </td>
                                                </tr>
                                                <tr class="border-b">
                                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Criado em
                                                    </th>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                        {{ $user->created_at }}
                                                    </td>
                                                </tr>
                                                <tr class="border-b">
                                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                       Tipo
                                                    </th>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                    @if($user->is_admin)
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-black text-black">
                                                            Admin
                                                        </span>
                                                    @else
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-700 text-black">
                                                            Usuário
                                                        </span>
                                                    @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block mt-8">
                                <a href="{{ route('users.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Listar todos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
