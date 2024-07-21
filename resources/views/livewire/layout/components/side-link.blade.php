        <li class="nav-item {{ $active ? 'active' : '' }}">
            <a class="nav-link " href="{{ $href }}">
                {!! $icon ?? '<i class="fas fa-fw fa-tachometer-alt"></i>' !!}
                <span>{{ $title }}</span></a>
        </li>
