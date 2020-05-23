<li>{{ $child_menu->name }}</li>
@if ($child_menu->menus)
    <ul>
        @foreach ($child_menu->menus as $childMenu)
            @include('child_menu', ['child_menu' => $childMenu])
        @endforeach
    </ul>
@endif
