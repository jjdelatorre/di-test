function Article(data) {
    this.title = ko.observable(data.title);
    this.author = ko.observable(data.author);
    this.date = ko.observable(data.date);
    this.body = ko.observable(data.body);
}

function ArticleListViewModel() {
    var self = this;
    self.articles = ko.observableArray([]);

     $.getJSON(g_base_url + "article/get_all/json", function(articleData) {
        var mappedArticles = $.map(articleData, function(item) { return new Article(item) });
        self.articles(mappedArticles);
    });
}

ko.applyBindings(new ArticleListViewModel());