const newsLinks = document.querySelectorAll('news_link');
if (newsLinks) {
    newsLinks.forEach(elem => {
        console.log(elem);
        if (elem.dataset['isPrivate']) {
            elem.href = '#';
        }
    })
}
