/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    //
// Scripts
//

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

function toggleBreakdown(index) {
    var breakdownRow = document.getElementById('breakdown-' + index);
    var icon = document.getElementById('icon-' + index);
    if (breakdownRow.style.display === 'none') {
        breakdownRow.style.display = 'table-row';
        icon.innerHTML = '-'; // Change the icon to minus when expanded
    } else {
        breakdownRow.style.display = 'none';
        icon.innerHTML = '+'; // Change the icon back to plus when collapsed
    }
}
