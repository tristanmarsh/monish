(function() {
    var app = angular.module('monish', []);

    app.controller("TabController", function() {
        this.tab = 2;

        this.isSet = function(checkTab) {
            return this.tab === checkTab;
        };

        this.setTab = function(setTab) {
            this.tab = setTab;
        };
    });
})();
