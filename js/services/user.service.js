angular
    .module('app.services')
    .factory('UserService', userService);

/* @ngInject */
function userService($resource) {
    let resource = $resource('/api/user/:id', {
            id: '@id'
        }
    );

    return {
        list: listUsers
    };

    function listUsers(query) {
        return resource.get(query).$promise.then(transformResponse);
    }

    function transformResponse(response) {
        return response.data;
    }
}
