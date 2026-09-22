$(document).ready(function () {
    fetchUsers();

    // Fetch users
    function fetchUsers() {
        $.ajax({
            url: '../data_fetch/fetch_users.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                const tableBody = $('#usersTableBody');
                tableBody.empty();
                data.forEach(user => renderUser(user, tableBody));
            },
            error: function () {
                Swal.fire('Error', 'Failed to fetch users.', 'error');
            }
        });
    }

    // Render user
    function renderUser(user, container) {
        const row = $(`
            <tr>
                <td>${user.id}</td>
                <td>${user.username}</td>
                <td>${user.created_at}</td>
                <td>
                    <button class="btn btn-warning btn-sm edit m-1" data-id="${user.id}" data-username="${user.username}"><i class="fas fa-pen"></i> Edit</button>
                    <button class="btn btn-danger btn-sm delete m-1" data-id="${user.id}"><i class="fas fa-trash"></i> Delete</button>
                </td>
            </tr>
        `);
        container.append(row);
    }

    // Add user
    $('#addUserForm').on('submit', function (e) {
    e.preventDefault();
    const data = {
        username: $('#username').val(),
        password: $('#password').val()
    };

    $.post('../data_proccessing/add_user.php', data, function (response) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        if (response.success) {
            Toast.fire({
                icon: 'success',
                title: 'User added successfully.'
            });
            fetchUsers();
            $('#addUserModal').modal('hide');
        } else {
            Toast.fire({
                icon: 'error',
                title: response.error || 'Failed to add user.'
            });
        }
    }, 'json').fail(function () {
        Toast.fire({
            icon: 'error',
            title: 'Failed to add user.'
        });
    });
});


    // Edit user
  $(document).on('click', '.edit', function () {
    const userId = $(this).data('id');
    const username = $(this).data('username');

    Swal.fire({
        title: 'Edit User',
        html: `
            <div class="mb-3">
                <label for="editUsername" class="form-label">Username</label>
                <input type="text" id="editUsername" class="form-control" value="${username}">
            </div>
        `,
        focusConfirm: false,
        preConfirm: () => {
            const username = $('#editUsername').val();
            if (!username) {
                Swal.showValidationMessage('Username is required');
                return false;
            }
            return { username };
        }
    }).then(result => {
        if (result.isConfirmed) {
            const data = {
                id: userId,
                username: result.value.username
            };

            $.post('../data_proccessing/edit_user.php', data, function (response) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });

                if (response.success) {
                    Toast.fire({
                        icon: 'success',
                        title: 'User updated successfully.'
                    });
                    fetchUsers();
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.error || 'Failed to update user.'
                    });
                }
            }, 'json').fail(function () {
                Toast.fire({
                    icon: 'error',
                    title: 'Failed to update user.'
                });
            });
        }
    });
});


    // Delete user
   $(document).on('click', '.delete', function () {
    const userId = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: 'This will delete the user.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then(result => {
        if (result.isConfirmed) {
            $.post('../data_proccessing/delete_user.php', { id: userId }, function (response) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });

                if (response.success) {
                    Toast.fire({
                        icon: 'success',
                        title: 'User deleted successfully.'
                    });
                    fetchUsers();
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.error || 'Failed to delete user.'
                    });
                }
            }, 'json').fail(function () {
                Toast.fire({
                    icon: 'error',
                    title: 'Failed to delete user.'
                });
            });
        }
    });
});
});