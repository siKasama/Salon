@extends('layouts.app', ['activePage' => 'diaries.create', 'title' => 'Cabeleila Leila', 'navName' => 'Adicionar Agendamento', 'activeButton' => 'laravel'])


@section('content')
<div class="container">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('Agenda')</span>
                        <a href="{{ url('diary') }}" class="btn-info btn-sm">
                            <i class="fa fa-arrow-left"></i> @lang('Voltar')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
                        <div class="block mb-8">
                            <a href="{{ route('diaries.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Listar Agendamentos</a>
                        </div>
                        <div class="mt-6" style="widht: 95%; border: 1px solid gray;">
                            <form method="post" action="{{ route('diaries.store') }}">
                                @csrf
                                <div class="shadow overflow-hidden" style="font-size: 0.993rem;">

                                    <div class="px-5" style="margin-top:5px;">
                                        <label for="client_id" class="font-medium text-sm text-gray-700">Cliente: </label>
                                        <select name="client_id" id="client_id" class="block rounded-md shadow-sm mt-1 block w-full" style="width:75%;">
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}"{{ $client->id  == old('client_id', '') ? ' selected' : '' }}>{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('client_id')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="px-5 py-3bg-white sm:p-2">
                                        <label for="service_id" class="block font-medium text-sm text-gray-700">Serviço: </label>
                                        <select name="service_id" id="service_id" class="block rounded-md shadow-sm mt-1 block w-full" style="width:75%;">
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}"{{ $service->id  == old('service_id', '') ? ' selected' : '' }}>{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('service_id')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="px-5 py-3bg-white sm:p-2">
                                        <label for="date" class="block font-medium text-sm text-gray-700">Agendar para: </label>
                                        <input type="datetime-local" name="date" id="date" class="form-input rounded-md shadow-sm mt-1 block w-full valor"
                                               value={{ old('date', \Carbon\Carbon::now()->addHours(1)->format('Y-m-d\TH:i')) }} />
                                        @error('date')
                                        <input type="hidden" id="hour" name="hour" value="{{ old('hour', '') }}">
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                   
                                        <label for="hour" class="block font-medium text-sm text-gray-700"> - </label>
                                        <input type="text" id="hour" name="hour" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            readonly value="{{ old('hour', '') }}">
                                        @error('hour')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="px-5 py-3bg-white sm:p-2">
                                        <label for="observations" class="block font-medium text-sm text-gray-700" style="top:0;">Observações: </label>
                                        <br>
                                        <textarea name="observations" id="observations" class="form-input rounded-md shadow-sm mt-1 block w-full" style="width:82%;"
                                             rows="7" value="{{ old('observations', '') }}"></textarea>
                                        @error('observations')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="flex items-center justify-end px-4 py-3 bg-blue-50 text-right sm:px-6">
                                        <button class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-blue disabled:opacity-25 transition ease-in-out duration-150">
                                            Cadastrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="block mb-8">
                            <a href="{{ route('diaries.index') }}" class="bg-gray-200 hover:bg-gray-300 text-blue font-bold py-2 px-4 rounded">Listar Agendamentos</a>
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
<script type="text/javascript">
$(document).ready(function(){
    $(".valor").on("input", function(){
        var input = document.querySelector("#date");
        var texto = input.value;
        
        var dtInicio = document.getElementById('date');
        var dtFim =  document.getElementById('date');

        if(dtInicio.value.length > 0){

            dtInicio = dtInicio.value.split("-");
            dtFim = dtFim.value.split(":")
            auxHour = dtFim[0].substr(dtFim[0].length -2);
            data1 = new Date(dtInicio[2] + "/" + dtInicio[1] + "/" + dtInicio[0]);
            auxHour = auxHour + ":" + dtFim[1];
            $("#hour").val(auxHour);
            console.log(auxHour);
        }
    });
});
</script>
@endpush