
        <li>{{$rs->title}}</li>
        @if($rs->parent_id > 0))
            @include('admin.categorytree2',['subcategories' => $rs->parent])
        @endif
