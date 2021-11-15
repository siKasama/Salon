@extends('layouts.app', ['activePage' => 'services.edit', 'title' => 'Cabeleila Leila', 'navName' => 'Alterar Serviço', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('Editar (Serviço)')</span>
                        <a href="{{ url('services') }}" class="btn-info btn-sm">
                            <i class="fa fa-arrow-left"></i> @lang('Voltar')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
                        <div class="block mb-8">
                            <a href="{{ route('services.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Listar Serviços</a>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form method="post" action="{{ route('services.update', $service->id) }}">
                                @csrf
                                @method('put')
                                <div class="shadow overflow-hidden sm:rounded-md" style="font-size: 0.993rem;">
                                    <div class="px-4 py-3 bg-white sm:p-8">
                                        <label for="name" class="block font-medium text-sm text-gray-700">Nome: </label>
                                        <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                               value="{{ old('name', $service->name) }}" />
                                        @error('name')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="px-4 py-3 bg-white sm:p-8">
                                        <label for="price" class="block font-medium text-sm text-gray-700">Valor: </label>
                                        <input type="text" name="price" id="price" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                               value="{{ old('price', $service->price) }}" />
                                        @error('price')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-blue-700 active:bg-gray-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-blue disabled:opacity-25 transition ease-in-out duration-150">
                                            Editar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="block mb-8">
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

@push('js')
<script language='JavaScript'>
    $(".mmss").focusout(function () {
        var id = $(this).attr('id');
        var vall = $(this).val();
        var regex = /[^0-9]/gm;
        const result = vall.replace(regex, ``);
        $('#' + id).val(result);
    });
</script>
@endpush
