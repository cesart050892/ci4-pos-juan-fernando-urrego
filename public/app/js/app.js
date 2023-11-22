$(document).ready(function () {
    // Initialize sidebar menu
    $(".sidebar-menu").tree();

    // Add click event to the logout button
    $("#btn-logout").on("click", function () {
        // Make a GET request to the logout endpoint
        $.ajax({
            type: "GET",
            url: "api/auth/logout",
            success: function (response) {
                location.reload();
                // Perform actions after successful logout if needed
            },
            error: function (error) {
                console.error("Error on logout:", error);
                // Handle logout errors if needed
            },
        });
    });
});
