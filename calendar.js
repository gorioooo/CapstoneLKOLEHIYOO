$(document).ready(function() {
    // Fetch events from server and populate the events table
    function fetchEvents() {
        $.ajax({
            url: 'fetch_events.php',
            type: 'GET',
            success: function(response) {
                // Parse JSON response and populate events table
                var events = JSON.parse(response);
                var tableBody = $('#eventsTable');
                tableBody.empty(); // Clear previous data
                events.forEach(function(event) {
                    var row = $('<tr>');
                    row.append($('<td>').text(event.id));
                    row.append($('<td>').text(event.title));
                    row.append($('<td>').text(event.date));
                    row.append($('<td>').text(event.description));
                    tableBody.append(row);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching events:', error);
            }
        });
    }

    // Call fetchEvents() when the page loads
    fetchEvents();
});
