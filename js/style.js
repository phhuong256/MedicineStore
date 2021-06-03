// Bắt sự kiện zoom ấn F11
window.addEventListener('load', function() {
    document.querySelector(".expand").addEventListener('click', function() {
        var elem = document.documentElement;
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) { /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { /* IE/Edge */
            elem.msRequestFullscreen();
        }
    })
});

// btn circle
function frame(x) {


    var btn = document.getElementsByClassName("btn")[0].firstElementChild.className;
    console.log(btn);
    var elem = document.getElementsByClassName("sidebar")[0];
    var main = document.getElementsByClassName("main")[0];
    if (main.style.width == "100%") {
        main.style.width = "calc(100% - 260px)";
        // elem.style.width = "0" + 'px';
        elem.style.display = 'block';

    } else {
        elem.style.width = "260" + 'px';
        // elem.style.display = "block";
        main.style.width = "100%";
        elem.style.display = "none";
    }


}

function myFunction(x) {

    x.classList.toggle("lnr-arrow-right-circle");
    var main = document.getElementsByClassName("main")[0];

}


// Click user
window.addEventListener('load', function(e) {
    e.preventDefault();

    var usedrop = document.querySelector(".usedrop");
    usedrop.addEventListener('click', function(e) {
        e.preventDefault();
        var user = document.getElementsByClassName("user")[0];
        if (user.style.display == 'none') {
            user.style.display = 'block';
            usedrop.style.padding = "0px 20px";
            usedrop.style.background = "#fafafa";
            // padding: 0 px 20 px;
            // background - color:
            usedrop.style.height = "fit-content";
            // height: fit - content;
        } else {
            user.style.display = 'none';
            usedrop.style.background = "none";
        }

    });
    document.getElementById("bodymain").addEventListener('click', e => {
        // e.preventDefault();
        var user = document.getElementsByClassName("user")[0];
        var usedrop = document.querySelector(".usedrop");
        if (!user.contains(e.target) && (!usedrop.contains(e.target))) {
            user.style.display = 'none';
            usedrop.style.background = "none";
        }

    });

})


// sidebar
const element = document.getElementsByClassName("nav")[0];
element.addEventListener('click', onTabClick, false);

function onTabClick(event) {
    event.stopPropagation();

    let activeTabs = document.querySelectorAll('.active');
    activeTabs.forEach(function(tab) {

        tab.className = tab.className.replace('active', '');
    });

    // activate new tab and panel
    event.target.parentElement.className += ' active';





}
// jQuery(document).ready(function($) {
//     // Get current path and find target link
//     var path = window.location.pathname.split("/").pop();

//     // Account for home page with empty path
//     if (path == '') {
//         path = 'dashboard.php';
//     }

//     var target = $('nav a[href="' + path + '"]');
//     // Add active class to target link
//     target.addClass('active');
// });



// childPages
//page
window.addEventListener('load', function() {

    const page = document.getElementById("page");
    page.addEventListener('click', function(ev) {
        ev.preventDefault();
        var navpage = document.getElementsByClassName("nav1")[0];
        var apages = document.getElementById("apages").lastElementChild.className = "lnr lnr-chevron-down";
        var subpage = document.getElementById("subPages");
        if ((navpage.style.display == 'none')) {
            console.log(apages);
            subpage.style.display = 'block';
            navpage.style.display = 'block';
            subpage.style.background = '#252c35';


        } else {
            subpage.style.display = 'none';
            navpage.style.display = 'none';
            document.getElementById("apages").lastElementChild.className = "lnr lnr-chevron-left";
        }

    });
    document.getElementsByClassName("nav")[0].addEventListener('click', e => {
        e.stopPropagation();
        var page = document.getElementById("page");

        var subpage = document.getElementById("subPages");
        var navpage = document.getElementsByClassName("nav1")[0];
        if (!subpage.contains(e.target) && (!navpage.contains(e.target) && (!page.contains(e.target)))) {
            navpage.style.display = 'none';
            subpage.style.display = 'none ';
            var apages = document.getElementById("apages").lastElementChild.className = "lnr lnr-chevron-left";
        }
    });

})