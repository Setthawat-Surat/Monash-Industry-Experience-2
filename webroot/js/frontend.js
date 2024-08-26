// add classes for mobile navigation toggling
var CSbody = document.querySelector("body");
const CSnavbarMenu = document.querySelector("#cs-navigation");
const CShamburgerMenu = document.querySelector("#cs-navigation .cs-toggle");


// FAQ

const faqItems = Array.from(document.querySelectorAll('.cs-faq-item'));
for (const item of faqItems) {
    const onClick = () => {
        item.classList.toggle('active')
    }
    item.addEventListener('click', onClick)
}


CShamburgerMenu.addEventListener('click', function() {
    CShamburgerMenu.classList.toggle("cs-active");
    CSnavbarMenu.classList.toggle("cs-active");
    CSbody.classList.toggle("cs-open");
    // run the function to check the aria-expanded value
    ariaExpanded();
});

// checks the value of aria expanded on the cs-ul and changes it accordingly whether it is expanded or not
function ariaExpanded() {
    const csUL = document.querySelector('#cs-expanded');
    const csExpanded = csUL.getAttribute('aria-expanded');

    if (csExpanded === 'false') {
        csUL.setAttribute('aria-expanded', 'true');
    } else {
        csUL.setAttribute('aria-expanded', 'false');
    }
}

// This script adds a class to the body after scrolling 100px
// and we used these body.scroll styles to create some on scroll
// animations with the navbar

document.addEventListener('scroll', (e) => {
    const scroll = document.documentElement.scrollTop;
    if(scroll >= 100){
        document.querySelector('body').classList.add('scroll')
    } else {
        document.querySelector('body').classList.remove('scroll')
    }
});


// mobile nav toggle code
const dropDowns = Array.from(document.querySelectorAll('#cs-navigation .cs-dropdown'));
for (const item of dropDowns) {
    const onClick = () => {
        item.classList.toggle('cs-active')
    }
    item.addEventListener('click', onClick)
}


function scrollToTimeline() {
    document.getElementById('timeline-1517').scrollIntoView({ behavior: 'smooth' });
}


function calculateProfit(event) {
    event.preventDefault(); // Prevent the default form submission

    // Get input values
    const quantity = parseInt(document.getElementById('number-of-towels').value);
    const sellingPrice = parseFloat(document.getElementById('selling-price').value);

    // Price per item based on quantity
    let costPerItem;
    if (quantity >= 500) {
        costPerItem = 11.50;
    } else if (quantity >= 250) {
        costPerItem = 12;
    } else if (quantity >= 50) {
        costPerItem = 13.50;
    } else if (quantity >= 25) {
        costPerItem = 18;
    } else {
        document.getElementById('profitMessage').textContent = '*Minimum order: 25 pieces per class';
        return;
    }

    // Calculate total cost and profit
    const totalCost = quantity * costPerItem;
    const totalRevenue = quantity * sellingPrice;
    const profit = totalRevenue - totalCost;

    // Display profit message
    document.getElementById('profitMessage').textContent = `Your profit is $${profit.toFixed(2)} !`;
}

document.getElementById('togglePassword').addEventListener('click', function () {
    const password = document.getElementById('password');
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});



document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const checklistItems = document.querySelectorAll('#registration-form .list-item');
    const form = document.getElementById('registration-form'); // Ensure the form has this ID


    // Regex patterns for each condition
    const conditions = [
        { regex: /.{8,}/, index: 0 },                // At least 8 characters
        { regex: /[0-9]/, index: 1 },                // At least 1 number
        { regex: /[A-Z]/, index: 2 },                // At least 1 uppercase character
        { regex: /[!@#$%^&*(),.?":{}|<>]/, index: 3 } // At least 1 special character
    ];

    function checkPasswordStrength() {
        const password = passwordInput.value;

        conditions.forEach(condition => {
            const listItem = checklistItems[condition.index];
            if (!listItem) {
                console.error(`List item at index ${condition.index} not found`);
                return;
            }
            if (condition.regex.test(password)) {
                listItem.classList.add('valid');
            } else {
                listItem.classList.remove('valid');
            }
        });
    }

    function isPasswordValid() {
        return conditions.every(condition => condition.regex.test(passwordInput.value));
    }

    // Add event listener to password input field
    passwordInput.addEventListener('input', checkPasswordStrength);

    // Add event listener to form submit
    form.addEventListener('submit', function (event) {
        if (!isPasswordValid()) {
            event.preventDefault(); // Prevent form submission
            alert('Please ensure your password meets all the requirements.');
        }
    });

    checkPasswordStrength();
});

document.addEventListener('DOMContentLoaded', () => {
    const sourceField = document.getElementById('repemail');
    const targetField = document.getElementById('email');

    // Function to synchronize fields
    function syncFields(event)
    {
        // Avoid infinite loop
        if (event.target === sourceField) {
            targetField.value = sourceField.value;
        } else if (event.target === targetField) {
            sourceField.value = targetField.value;
        }
    }

    // Add event listeners to both fields
    sourceField.addEventListener('input', syncFields);
    targetField.addEventListener('input', syncFields);
});

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registration-form');
    const fileInput = document.getElementById('schoollogo');

    form.addEventListener('submit', function(event) {
        const file = fileInput.files[0];

        if (file) {
            const allowedExtensions = ['jpeg', 'jpg', 'png', 'webp'];
            const fileExtension = file.name.split('.').pop().toLowerCase();

            if (!allowedExtensions.includes(fileExtension)) {
                alert('Please upload a valid image file. (JPEG, JPG, PNG, WebP)');
                event.preventDefault();
            }
        } else {
            alert('Please select a file to upload.');
            event.preventDefault();
        }
    });
});








