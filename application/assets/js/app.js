function Article(data) {
    this.title = ko.observable(data.title);
    this.author = ko.observable(data.author);
    this.date = ko.observable(data.timestamp);
    this.body = ko.observable(data.body);
    this.id = ko.observable(data.id);
    this.edit_url = window.g_base_url + "article/edit/" + data.id;
    this.isEditable = ko.observable(false);
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

        $.ajax(g_base_url + "article/delete", {
            data: ko.toJSON({ article_id: item.id }),
            type: "post", contentType: "application/json",
            success: function(result) { console.log(result); }
        });
    };

    self.editArticleField = function(item, event) {
        console.log(item);
        item.isEditable(true);
    };

    self.editArticle = function(item) {
        $.ajax(g_base_url + "article/edit_from_json/", {
            data: ko.toJSON({ article: item }),
            type: "post", contentType: "application/json",
            success: function(result) { console.log(result); item.isEditable(false); }
        });
    }
    
}

ko.applyBindings(new ArticleListViewModel());