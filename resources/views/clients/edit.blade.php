@extends('layouts.app', ['activePage' => 'clients.edit', 'title' => 'Cabeleila Leila', 'navName' => 'Editar Clientes', 'activeButton' => 'laravel'])


@section('content')
<div class="container">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('Editar Cliente')</span>
                        <a href="{{ url('clientes') }}" class="btn-info btn-sm">
                            <i class="fa fa-arrow-left"></i> @lang('Voltar')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
                        <div class="block mb-8">
                            <a href="{{ route('clients.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Listar Clientes</a>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form method="post" action="{{ route('clients.update', $clients->id) }}">
                                @csrf
                                @method('put')
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-5 py-4 bg-white sm:p-2">
                                        <label for="name" class="block font-medium text-sm text-gray-700">Nome: </label>
                                        <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                               value="{{ old('name', $clients->name) }}" />
                                        @error('name')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="px-5 py-4 bg-white sm:p-2">
                                        <label for="email" class="block font-medium text-sm text-gray-700">E-mail: </label>
                                        <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                               value="{{ old('email', $clients->email) }}" />
                                        @error('email')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="px-5 py-4 bg-white sm:p-2">
                                        <label for="fone" class="block font-medium text-sm text-gray-700">Telefone: </label>
                                        <input type="text" name="fone" id="fone" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                               value="{{ old('fone', $clients->fone) }}" />
                                        @error('fone')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="px-5 py-4 bg-white sm:p-2">
                                        <label for="city" class="block font-medium text-sm text-gray-700">Cidade: </label>
                                        <input type="text" name="city" id="city" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                               value="{{ old('city', $clients->city) }}" />
                                        @error('city')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="px-5 py-4 bg-white sm:p-2">
                                        <label for="uf" class="block font-medium text-sm text-gray-700">UF: </label>
                                        <input type="text" name="uf" id="uf" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                               value="{{ old('uf', $clients->uf) }}" />
                                        @error('uf')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-blue-700 active:bg-lue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                            Editar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="block mb-8">
                            <a href="{{ route('clients.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Listar Clientes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
