let controller = require('./user-list.controller');

angular
    .module('app.users')
    .directive('userList', userListDirective);

function userListDirective() {
    return {
        templateUrl: 'users/user-list.html',
        restrict: 'E',
        replace: true,
        scope: {},
        bindToController: true,
        controllerAs: 'vm',
        controller: controller
    };
}
