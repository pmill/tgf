angular
    .module('app.users', [])
    .config(setupRoutes);

/* @ngInject */
function setupRoutes($stateProvider) {
    $stateProvider.state('user-list', {
        url: '/',
        template: '<user-list></user-list>'
    });
}

require('./user-list.directive');
