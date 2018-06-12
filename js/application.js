require('angular');
require('angular-resource');
require('angular-ui-router');
require('bootstrap');

require('./services/services.module');
require('./users/users.module');

angular
    .module('app', [
        'ngResource',
        'ui.router',
        'app.services',
        'app.users',
    ])
    .run(setInitialState);

/* @ngInject */
function setInitialState($location, $state) {
    if (!$location.path()) {
        $state.go('user-list');
    }
}