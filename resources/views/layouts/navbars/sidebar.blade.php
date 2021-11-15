<div class="sidebar" data-color="azure" data-image="{{ asset('img/92903.jpg') }}">

    <div class="sidebar-wrapper">
         <div style="align-items: center;">        
            <p style="font-size: 8px; color:purple; margin-left: 40%;">{{ auth()->user()->name }}</p>
        </div>

        <div class="logo">
            <img src="{{ asset('img/beauty-salon_128.png') }}" alt="profile image" >
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="nc-icon nc-app"></i>
                    <p>{{ __("Home") }}</p>
                </a>
            </li>
            @if(auth()->user()->is_admin)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index', 'index') }}">
                    <i class="nc-icon nc-badge"></i>
                    <p>{{ __("Usuário") }}</p>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('services.index', 'index') }}">
                    <i class="nc-icon nc-scissors"></i>
                    <p>{{ __("Serviços") }}</p>
                </a>
            </li>
            @if(auth()->user()->is_admin)
            <li class="nav-item @if($activePage == 'Clientes') active @endif">
                <a class="nav-link" href="{{ route('clients.index', 'index') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>{{ __("Clientes") }}</p>
                </a>
            </li>
            @endif
            <li class="nav-item @if($activePage == 'Agenda') active @endif">
                <a class="nav-link" href="{{ route('diaries.index', 'index') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>{{ __("Agenda") }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>
