var symfonyServices = angular.module('symfonyServices', []);

symfonyServices.factory('send', function($http){
    return {
        post: function(data, url, callback){
            $http({
                method: "POST",
                url: url,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: $.param(data)
            }).success(callback);
        }

    }
});