        <li class="nav-item my-2 {{ $active ? 'active' : '' }}">
            <a class="nav-link" href="{{ $href }}">
                {!! $icon ?? '<i class="fas fa-fw fa-tachometer-alt"></i>' !!}
                <span class="fs-6">{{ $title }}</span></a>
        </li>
