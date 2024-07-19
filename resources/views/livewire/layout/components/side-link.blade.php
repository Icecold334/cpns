        <li class="nav-item {{ $active ? 'active' : '' }}">
            <a class="nav-link " href="{{ $href }}" wire:navigate.hover>
                {!! $icon ?? '<i class="fas fa-fw fa-tachometer-alt"></i>' !!}
                <span>{{ $title }}</span></a>
        </li>
