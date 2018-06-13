/* @ngInject */
function userListController($state, UserService) {
    let vm = this;

    vm.data = {
        users: []
    };

    vm.state = {
        sortByColumn: 'user.id',
        sortDirection: 'asc',
        loading: true
    };

    vm.setSortByColumn = setSortByColumn;

    activate();

    function activate() {
        loadUsers();
    }

    function loadUsers() {
        vm.state.loading = true;

        let payload = {
            sort_by: vm.state.sortByColumn,
            sort_dir: vm.state.sortDirection
        };

        UserService.list(payload).then(function (users) {
            vm.data.users = users;
            vm.state.loading = false;
        });
    }

    function setSortByColumn(columnName) {
        if (vm.state.sortByColumn === columnName) {
            vm.state.sortDirection = vm.state.sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            vm.state.sortByColumn = columnName;
            vm.state.sortDirection = 'asc';
        }
        loadUsers();
    }
}

module.exports = userListController;