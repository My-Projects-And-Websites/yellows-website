// dashboard and appointment form
const dashboard = document.getElementById('dashboard');
const appointments = document.getElementById('none');

// list items, buttons to toggle between the appointment form and dashboard
const appear_dash = document.getElementById('dash');
const appear_app = document.getElementById('apps');

// function for the dashboard to appear
function dash_appear() {
    appointments.style.display = "none";
    dashboard.style.display = "block";
}

// function for the appointment form to appear
function app_appear() {
    appointments.style.display = "block";
    dashboard.style.display = "none";
}