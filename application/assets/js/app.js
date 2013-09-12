function Article(data) {
    this.title = ko.observable(data.title);
    this.author = ko.observable(data.author);
    this.date = ko.observable(data.timestamp);
    this.body = ko.observable(data.body);
    this.id = ko.observable(data.id);
}

function ArticleListViewModel() {
    var self = this;
    self.articles = ko.observableArray([]);

    $.getJSON(g_base_url + "article/get_all/json", function(articleData) {
        var mappedArticles = $.map(articleData, function(item) { return new Article(item) });
        self.articles(mappedArticles);
    });

     self.deleteArticle = function(item) {
        self.articles.remove(item);

        $.ajax(g_base_url + "article/delete/json", {
            data: ko.toJSON({ article_id: item.id }),
            type: "post", contentType: "application/json",
            success: function(result) { console.log(result); }
        });
    };
    
}

ko.applyBindings(new ArticleListViewModel());