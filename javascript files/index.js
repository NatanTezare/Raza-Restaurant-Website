// Access the form element
const form = document.getElementById('reservation-form');

// Add an event listener for form submission
form.addEventListener('submit', function(event) {
    // Prevent the default form submission behavior
    event.preventDefault();
    
    // Get the form data
    const firstName = document.getElementById('first-name').value;
    const lastName = document.getElementById('last-name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const reservationDate = document.getElementById('reservation-date').value;
    const reservationTime = document.getElementById('reservation-time').value;
    const numberOfPersons = document.getElementById('number-of-persons').value;
    const notes = document.getElementById('notes').value;
    
    // Create an object with the form data
    const formData = {
        'first-name': firstName,
        'last-name': lastName,
        'email': email,
        'phone': phone,
        'reservation-date': reservationDate,
        'reservation-time': reservationTime,
        'number-of-persons': numberOfPersons,
        'notes': notes
    };

    // Send form data to the server via Fetch API
    fetch('../php files/reservation.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams(formData)
    })
    .then(response => response.text())
    .then(result => {
        // Handle the server response (e.g., display a success message)
        alert('Reservation submitted successfully!');
        console.log('Server Response:', result);
    })
    .catch(error => {
        // Handle any errors
        alert('There was an error submitting your reservation. Please try again.');
        console.error('Error:', error);
    });
});

// nav 
function toggleNav() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}



// menu
 // Get all the order buttons
 const orderButtons = document.querySelectorAll('button[type="submit"]');

 // Iterate over each button and add a click event listener
 orderButtons.forEach(button => {
     button.addEventListener('click', () => {
         const menuItem = button.closest('.menu-item');
         const itemName = menuItem.querySelector('h3').innerText;
         const itemPrice = menuItem.querySelector('p:nth-of-type(3)').innerText;

         alert(`You ordered: ${itemName}\nPrice: ${itemPrice}`);
     });
 });





// contact us
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Basic form validation
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const message = document.getElementById('message').value.trim();
        const terms = document.getElementById('terms').checked;
        const formResponse = document.getElementById('formResponse');

        if (name === '') {
            formResponse.textContent = 'Please enter your name';
            formResponse.style.color = 'red';
            return;
        }

        if (email === '' || !isValidEmail(email)) {
            formResponse.textContent = 'Please enter a valid email address';
            formResponse.style.color = 'red';
            return;
        }

        if (message === '') {
            formResponse.textContent = 'Please enter your message';
            formResponse.style.color = 'red';
            return;
        }

        if (!terms) {
            formResponse.textContent = 'Please accept the Terms of Service';
            formResponse.style.color = 'red';
            return;
        }

        // Fetch API form submission
        fetch('../php files/contact.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                name: name,
                email: email,
                message: message,
                terms: terms
            })
        })
        .then(response => response.text())
        .then(data => {
            formResponse.textContent = data;
            formResponse.style.color = 'green';
            form.reset();
        })
        .catch(error => {
            formResponse.textContent = 'An error occurred. Please try again.';
            formResponse.style.color = 'red';
        });
    });

    // Function to validate email format
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});

