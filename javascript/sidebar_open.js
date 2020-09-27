// target the hamburger icona nd the sidebar
// only for mobile view
const hbg = document.querySelector('.open-side');
const sidebar = document.querySelector('.sidebar');

// when hamburger icon is clicked, the sidebar will appear by setting its left margin to 0
hbg.addEventListener('click', () => {
    if (sidebar.style.marginLeft == "-270px") {
        sidebar.style.marginLeft = "0px";
    }
    // if clicked again, set it back to its original position
    else {
        sidebar.style.marginLeft = "-270px";
    }
});