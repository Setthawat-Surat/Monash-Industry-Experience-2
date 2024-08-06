// add classes for mobile navigation toggling
var CSbody = document.querySelector("body");
const CSnavbarMenu = document.querySelector("#cs-navigation");
const CShamburgerMenu = document.querySelector("#cs-navigation .cs-toggle");

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

document.getElementById('toggleRetypePassword').addEventListener('click', function () {
    const retypePassword = document.getElementById('retype-password');
    const type = retypePassword.getAttribute('type') === 'password' ? 'text' : 'password';
    retypePassword.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});






