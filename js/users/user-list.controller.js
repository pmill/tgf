/* @ngInject */
function userListController($state, UserService) {
    let vm = this;

    vm.data = {
        users: []
    };

    vm.state = {
        sortByColumn: 'user.id',
        loading: true
    };

    vm.setSortByColumn = setSortByColumn;

    activate();

    function activate() {
        loadUsers();
    }

    function loadUsers() {
        vm.state.loading = true;

        UserService.list({sort_by: vm.state.sortByColumn}).then(function (users) {
            vm.data.users = users;
            vm.state.loading = false;
        });
    }

    function setSortByColumn(columnName) {
        vm.state.sortByColumn = vm.state.sortByColumn === columnName ? 'user.id' : columnName;
        loadUsers();
    }
}

module.exports = userListController;