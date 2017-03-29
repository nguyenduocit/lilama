var appMain = angular.module("appMain", ["summernote", "bw.paging", "ngSanitize"]);
appMain.filter('unsafe', function ($sce) {
    return function (val) {
        return $sce.trustAsHtml(val);
    };
});
appMain.directive('lazy', function ($timeout) {
    return {
        restrict: 'C',
        link: function (scope, elm) {
            $timeout(function () {
                $(elm).lazyload({
                    effect: 'fadeIn',
                    effectspeed: 500,
                    'skip_invisible': false
                });
            }, 0);
        }
    };
});
//appMain.constant('LinkTypeConst', {
//    Page: 0,
//    Content: -1,
//    GroupProduct: 3,
//    GroupNews: 5,
//    GroupProject: 29,
//    GroupService: 26,
//    GroupExchange: 32,
//    Url: -2,
//});