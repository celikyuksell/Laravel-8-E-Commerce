@foreach($subcategories as $rs)
    <ul>
        <li>{{$rs->title}}</li>
        @if(count($rs->children))
            @include('admin.categorytree',['subcategories' => $rs->children])
        @endif
    </ul>
@endforeach
