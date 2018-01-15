<ol class="breadcrumb">
  @foreach ($breadcrumbs as $link => $name)
    @if($loop->last)
      <li class="breadcrumb-item active">{{$name}}</li>
    @else
      <li class="breadcrumb-item"><a href="{{route($link)}}">{{$name}}</a></li>
    @endif
  @endforeach
</ol>
