// 
function userDropdown() {
    var dropdown = document.getElementById("userDropdown");
    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
    } else {
        dropdown.style.display = "block";
    }
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches('.user-drop')) {
        var dropdown = document.getElementById("userDropdown");
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
        }
    }
}

// Slide list
$(document).ready(function() {
    $(".activity_slide").owlCarousel({
      items: 10,
      dots: false,
      nav: false,
      smartSpeed: 200,
      slideSpeed: 500,
      slideBy: 10,
      responsiveRefreshRate: 100,
    });

    $(".offers_slider").owlCarousel({
        items: 3,
        slideSpeed: 2000,
        nav: true,
        autoplay: false,
        dots: true,
        loop: true,
        responsiveRefreshRate: 200,
        navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 2px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 2px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
      });

      $(".categories_slide").owlCarousel({
        items: 4,
        slideSpeed: 2000,
        nav: true,
        autoplay: false,
        dots: true,
        loop: true,
        responsiveRefreshRate: 200,
        navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 2px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 2px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
      });
      
      $(".thumbnail_slider").owlCarousel({
        items: 1,
        slideBy: 1,
        slideSpeed: 2000,
        nav: false, // Set nav to false to hide next and previous buttons
        autoplay: false,
        dots: true,
        loop: true,
        responsiveRefreshRate: 200,
    });

  });

//   Modal tab
document.getElementById('tabList').addEventListener('click', function(event) {
    var target = event.target;

    // Check if the clicked element is a button
    if (target.tagName === 'BUTTON') {
        var tabName = target.innerText.trim().replace(/\s/g, ''); // Extract tab name without spaces
        var signInTab = document.getElementById('SignInTab');
        var signUpTab = document.getElementById('SignUpTab');

        if (signInTab && signUpTab) {
            signInTab.classList.add('hidden');
            signUpTab.classList.add('hidden');

            // Remove "active" class from all li elements
            document.querySelectorAll('.modal_tab li').forEach(li => {
                li.classList.remove('active');
            });

            // Show the selected tab
            document.getElementById(tabName + 'Tab').classList.remove('hidden');

            // Add "active" class to the clicked li element
            target.parentElement.classList.add('active');
        }
    }
});


//   Accordion tab
document.getElementById('accordionTabList').addEventListener('click', function(event) {
    var target = event.target;

    // Check if the clicked element is a button
    if (target.tagName === 'BUTTON') {
        var tabName = target.innerText.trim().replace(/\s/g, ''); // Extract tab name without spaces
        var accordionTab01 = document.getElementById('AccordionTab01');
        var accordionTab02 = document.getElementById('AccordionTab02');

        if (accordionTab01 && accordionTab02) {
            accordionTab01.classList.add('hidden');
            accordionTab02.classList.add('hidden');

            // Remove "active" class from all li elements inside #accordionTabList
            document.querySelectorAll('#accordionTabList li').forEach(li => {
                li.classList.remove('active');
            });

            // Show the selected tab
            var selectedTab;
            if (tabName === 'General') {
                selectedTab = accordionTab01;
            } else if (tabName === 'Booking') {
                selectedTab = accordionTab02;
            }

            if (selectedTab) {
                selectedTab.classList.remove('hidden');
            }

            // Add "active" class to the clicked li element
            target.parentElement.classList.add('active');
        }
    }
});


  

