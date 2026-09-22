$(document).ready(function() {
    fetchUserDetails();

    function fetchUserDetails() {
        $.ajax({
            url: '../data_fetch/fetch_user_details.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    const userDetailsBody = $('#userDetailsBody');
                    userDetailsBody.empty();
                    let sno = 1;
                    response.users.forEach(user => {
                        const userRow = `<tr>
                            <td>${sno}</td>
                            <td>${user.name}</td>
                            <td>${user.email}</td>
                            <td>${user.mobile}</td>
                            <td>${user.created_at}</td>
                        </tr>`;
                        userDetailsBody.append(userRow);
                        sno++;
                    });
                } else {
                    alert('Failed to fetch user details.');
                }
            },
            error: function() {
                alert('An error occurred while fetching user details.');
            }
        });
    }
});

