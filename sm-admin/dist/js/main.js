var scotchApp = angular.module('AutoDomain', ['ngRoute']);

    // configure our routes
    scotchApp.config(function($routeProvider) {
        $routeProvider

            // route for the home page
            .when('/', {
                templateUrl : '../../pages/home.html',
                controller  : 'mainController'
            })

    });