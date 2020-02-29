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
            {!!breadLink($category)!!}
        @elseif(request()->routeIs('news.one') and isset($category) and isset($news))
            {!!breadLink('Новости', route('news.all'))!!}
            {!!breadLink('Категории', route('news.categories'))!!}
            {!!breadLink($category, route('news.categoryId'))!!}
            {!!breadLink($news)!!}
        @endif
    </ol>
</nav>
