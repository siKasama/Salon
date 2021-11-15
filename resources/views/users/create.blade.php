@extends('layouts.app', ['activePage' => 'users.create', 'title' => 'Cabeleila Leila', 'navName' => 'Usuarios Add', 'activeButton' => 'laravel'])


@section('content')
<div class="container">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('Novo Usuário')</span>
                        <a href="{{ url('users') }}" class="btn-info btn-sm">
                            <i class="fa fa-arrow-left"></i> @lang('Voltar')
                        </a>
                    </div>
            </div>
            <div class="card-body">
               <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="block mb-8">
                    <a href="{{ route('users.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Listar Usuários</a>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2" style="font-size: 0.993rem;">
                    <form method="post" action="{{ route('users.store') }}">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-3 bg-white sm:p-6">
                                <label for="name" class="block font-medium text-sm text-gray-700">Nome: </label>
                                <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('name', '') }}" />
                                @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-3  bg-white sm:p-6">
                                <label for="email" class="block font-medium text-sm text-gray-700">E-mail: </label>
                                <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('email', '') }}" />
                                @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-3 bg-white sm:p-6">
                                <label for="password" class="block font-medium text-sm text-gray-700">Senha: </label>
                                <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                @error('password')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            @if(auth()->user()->is_admin)
                            <div class="px-4 py-5 bg-white sm:p-6"> 
                                <label for="type" class="block font-medium text-sm text-gray-700">Tipo: </label>
                                <select name="type" id="type" class="block rounded-md shadow-sm mt-1 block w-full">
                                    @foreach($types as $key => $value)
                                        <option value="{{ $key }}"{{ $key == old('$types', '') ? ' selected' : '0' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            @endif

                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-blue disabled:opacity-25 transition ease-in-out duration-150">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="block mb-8">
                    <a href="{{ route('users.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Listar Usuários</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
