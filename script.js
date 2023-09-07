
  // script.js//
  function myFunction(userId) {
    const messageBox = $('#myDIV');
    console.log(userId);
    // Toggle the visibility of the message box//
    messageBox.toggle();
    
    if (messageBox.is(':visible')) {
        // Make an AJAX request to fetch messages for the user//
        $.ajax({
            url: `phpcode.php?userId=${userId}`,
            method: 'POST',
            success: function(response) {
            
                // Process the response and update the message area//
                // You'll need to parse the response and append messages to the message area//
                $('#myDIV .message-area').html(response);
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
}

$(document).ready(function() {
    // Handle Send button click using event delegation
    $(document).on('click', '.sendMessage', function() {
        var receiverId = $(this).data('receiver'); // Get the receiver ID
        // console.log("Receiver ID:", receiverId); // Log the receiver ID to the console
        var message = $(".userInput").val(); // Get the value of the message input

        var dataString = "userId=" + receiverId + "&message=" + encodeURIComponent(message);
        console.log(dataString);
        $.ajax({
            type: "POST",
            url: "phpcode.php", // Replace with the actual path to your server-side script
            data: dataString,
            success: function(data) {
                // After sending the message, fetch and refresh messages
                fetchMessages(receiverId);
            }
        });
    });
});

    // Rest of your code...

    // Function to fetch and display messages
  // Function to fetch and display messages
function fetchMessages(receiverId) {
    // You can use the receiverId parameter to fetch messages specific to the receiver
    $.ajax({
        url: 'phpcode.php', // Replace with the actual path to your server-side script
        method: 'GET',
        data: { receiverId: receiverId },
      
        // Pass the receiverId as a parameter
        success: function(response) {
            $('.message-area').html(response);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log("Error fetching messages:", textStatus);
            console.log("Error details:", errorThrown);
        }
    });
}






    // Initial fetch of messages
  

 

