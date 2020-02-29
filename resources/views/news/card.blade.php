@if(!$item->isPrivate)
    <a href="{{route('news.one', $item->id)}}">
        <div class="card-img-icon float-left mr-2">
            <img src="{{asset($item->image)}}" alt="">
        </div>
    </a>
@else
    <div class="card-img-icon float-left mr-2">
        <img src="{{asset($item->image)}}" alt="">
    </div>
@endif
<h3 class="mb-0">
    @if(!$item->isPrivate)
        <a href="{{route('news.one', $item->id)}}">
            {{$item->title}}
        </a>
    @else
        {{$item->title}}
    @endif
</h3>
