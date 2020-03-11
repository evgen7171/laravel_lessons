<nav class="container breadcrumb-m" aria-label="breadcrumb">
    <ol class="breadcrumb form-group-flex">
        @if(request()->routeIs('news.all'))
            {!!breadLink('Новости')!!}
        @elseif(request()->routeIs('news.categories'))
            {!!breadLink('Новости', route('news.all'))!!}
            {!!breadLink('Категории')!!}
        @elseif(request()->routeIs('news.categoryId') and isset($category))
            {!!breadLink('Новости', route('news.all'))!!}
            {!!breadLink('Категории', route('news.categories'))!!}
            {!!breadLink($category->caption)!!}
            <div class="card-img-icon-small ml-auto">
                <img src="{{asset($category->image)}}" alt="">
            </div>
        @elseif(request()->routeIs('news.one') and isset($category) and isset($news))
            {!!breadLink('Новости', route('news.all'))!!}
            {!!breadLink('Категории', route('news.categories'))!!}
            {!!breadLink($category->caption, route('news.categoryId',$category->id))!!}
            {!!breadLink($news->title)!!}
            <a href="{{route('news.categoryId',$category->id)}}" class="ml-auto card-img-link">
                <img src="{{asset($category->image)}}" class="card-img-icon-small" alt="">
            </a>
        @endif
    </ol>
</nav>
