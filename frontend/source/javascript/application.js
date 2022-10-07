var hamburger = function () {
    var menulist = document.querySelector(".navbar-menu-list");
    var sublist = document.querySelector('.sub-menu');
    var mobile = document.querySelector('.mobile-menu-open'),
        responsiveNavButton = document.querySelector('.icon_hamburguer'),
        toggleIcon = document.querySelector('.icon_hamburguer'),
        responsiveNavMenu = document.querySelector('nav#responsive'),
        overlay = document.querySelector('.overlay')
    
    responsiveNavButton.addEventListener('click', toggleNav)
    toggleIcon.onclick = function() {
        console.log('icon')
        toggleIcon.classList.toggle('active')
        overlay.classList.toggle('active')
    }
    
    function toggleNav(){
        return responsiveNavMenu.style.right === '0%' ? responsiveNavMenu.style.right = '-100%' : responsiveNavMenu.style.right = '0%'; // DEV
        // return responsiveNavMenu.style.right === '0%' ? responsiveNavMenu.style.right = '0%' : responsiveNavMenu.style.right = '-100%'; // PROD
    }
    
    function openMenu(){
        menulist.classList.toggle('shown');
    }
    openMenu()

    overlay.addEventListener('click', function() {
        toggleNav()
        toggleIcon.classList.toggle('active')
        overlay.classList.toggle('active')
    })
    
    var childrens = document.querySelectorAll(".menu-item-has-children")
    if (childrens) {
        childrens.forEach(function(children) {
            children.addEventListener('click', function() {
                console.log('chil')
                children.children[1].classList.toggle('shown')
                children.classList.toggle('active')
            })
        })
    }
}

var navContent = function () {
    var tabs = document.querySelectorAll('#main2 .header__list .navbar-wrapper ul li.menu-item-object-post a'),
        subTabs = document.querySelectorAll('#main2 .header__list .navbar-wrapper ul li .sub-menu li a'),
        list_mobile = document.getElementById("menu-list-mobile"),
        childrens = document.querySelectorAll(".menu-item-has-children")

    for (var i = 0; i < tabs.length; i++) {
        tabs[i].setAttribute('href', 'javascript:void(0);')
        if (!tabs[i].parentNode.classList.contains('menu-item-has-children')) {
            tabs[i].parentNode.setAttribute('data-id', tabs[i].innerHTML)
        }
    }
    for (var i = 0; i < subTabs.length; i++) {
        subTabs[i].parentNode.setAttribute('data-id', subTabs[i].innerHTML)
        subTabs[i].setAttribute('href', 'javascript:void(0);')
    }

    // if (childrens) {
    //     childrens.forEach(function(children) {
    //         children.addEventListener('click', function() {
    //             console.log('chil')
    //             children.children[1].classList.toggle('shown')
    //             children.classList.toggle('active')
    //         })
    //     })
    // }

    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            var content = document.querySelectorAll('.blanca__tab'),
                home = document.querySelector('.blanca__home'),
                banner_home = document.querySelector('.blanca__banner_home'),
                banner_tab = document.querySelectorAll('.blanca__banner_tabs')

            for (var i = 0; i < content.length; i++) {
                if ( tab.innerHTML == content[i].getAttribute('data-id') && !tab.parentNode.classList.contains('menu-item-has-children') ) {
                    removeActiveTab()
                    home.classList.add('hidden')
                    content[i].classList.add('active')
                }
            }

            for (var i = 0; i < banner_tab.length; i++) {
                if ( tab.innerHTML == banner_tab[i].getAttribute('data-id') && !tab.parentNode.classList.contains('menu-item-has-children') ) {
                    removeActiveBanner()
                    banner_home.classList.add('hidden')
                    banner_tab[i].classList.add('active')
                }
            }
        })
    })

    // list_mobile.addEventListener('change', function() {
    //     var content = document.querySelectorAll('.blanca__tab'),
    //         home = document.querySelector('.blanca__home'),
    //         banner_home = document.querySelector('.blanca__banner_home'),
    //         banner_tab = document.querySelectorAll('.blanca__banner_tabs')

    //     for (var i = 0; i < content.length; i++) {
    //         if ( this.value == content[i].getAttribute('data-id') ) {
    //             removeActiveTab()
    //             home.classList.add('hidden')
    //             content[i].classList.add('active')
    //         }
    //     }

    //     for (var i = 0; i < banner_tab.length; i++) {
    //         if ( this.value == banner_tab[i].getAttribute('data-id') ) {
    //             removeActiveBanner()
    //             banner_home.classList.add('hidden')
    //             banner_tab[i].classList.add('active')
    //         }
    //     }
    // });
}

var removeActiveTab = function () {
    var contents = document.querySelectorAll('.blanca__tab')

    contents.forEach(function(content) {
        content.classList.remove('active')            
    })
}

var removeActiveBanner = function () {
    var banners = document.querySelectorAll('.blanca__banner_tabs')

    banners.forEach(function(banner) {
        banner.classList.remove('active')            
    })
}

var main = function () {
    // navContent()
    hamburger()
};
  
document.addEventListener('DOMContentLoaded', main);