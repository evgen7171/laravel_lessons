<nav class="container breadcrumb-m" aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if(request()->routeIs('news.all'))
            {!!breadLink('Новости')!!}
        @elseif(request()->routeIs('news.categories'))
            {!!breadLink('Новости', route('news.all'))!!}
            {!!breadLink('Категории')!!}
        @elseif(request()->routeIs('news.categoryId') and isset($category))
            {!!breadLink('Новости', route('news.all'))!!}
            {!!breadLink('Категории', route('news.categories'))!!}
            {!!breadLink($category->caption)!!}
        @elseif(request()->routeIs('news.one') and isset($category) and isset($news))
            {!!breadLink('Новости', route('news.all'))!!}
            {!!breadLink('Категории', route('news.categories'))!!}
            {!!breadLink($category->caption, route('news.categoryId',$category->id))!!}
            {!!breadLink($news->title)!!}
        @endif
    </ol>
</nav>
