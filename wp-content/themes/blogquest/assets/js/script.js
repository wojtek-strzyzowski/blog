"use strict";

var blogquest = blogquest || {};

//  Nodelist forEach polyfill
if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = function (callback, thisArg) {
        thisArg = thisArg || window;
        for (let i = 0; i < this.length; i++) {
            callback.call(thisArg, this[i], i, this);
        }
    };
}

/* Handle Accessiblity for Menu Items
 **-----------------------------------------------------*/
blogquest.traverseMenu = {
    init: function () {
        let topNavigation = document.querySelector(".blogquest-top-nav");
        let primaryNavigation = document.getElementById("site-navigation");

        // For top menu navigation
        if (topNavigation) {
            this.traverse(topNavigation);
        }
        // For primary menu navigation
        if (primaryNavigation) {
            this.traverse(primaryNavigation);
        }
    },

    traverse: function (navigation) {
        let menu = navigation.getElementsByTagName("ul")[0];
        if ("undefined" !== typeof menu) {
            if (!menu.classList.contains("nav-menu")) {
                menu.classList.add("nav-menu");
            }
            // Get all the link elements within the menu.
            let links = menu.getElementsByTagName("a");

            // Get all the link elements with children within the menu.
            let linksWithChildren = menu.querySelectorAll(
                ".menu-item-has-children > a, .page_item_has_children > a"
            );

            // Toggle focus each time a menu link is focused or blurred.
            for (let link of links) {
                link.addEventListener("focus", this.toggleFocus, true);
                link.addEventListener("blur", this.toggleFocus, true);
            }

            // Toggle focus each time a menu link with children receive a touch event.
            for (let link of linksWithChildren) {
                link.addEventListener("touchstart", this.toggleFocus, false);
            }
        }
    },

    toggleFocus: function (event) {
        if (event.type === "focus" || event.type === "blur") {
            let self = this;
            // Move up through the ancestors of the current link until we hit .nav-menu.
            while (!self.classList.contains("nav-menu")) {
                // On li elements toggle the class .focus.
                if ("li" === self.tagName.toLowerCase()) {
                    self.classList.toggle("focus");
                }
                self = self.parentNode;
            }
        }

        if (event.type === "touchstart") {
            let menuItem = this.parentNode;
            event.preventDefault();
            for (let link of menuItem.parentNode.children) {
                if (menuItem !== link) {
                    link.classList.remove("focus");
                }
            }
            menuItem.classList.toggle("focus");
        }
    },
};

/* Handle Focus for Dialog Accessiblity
 **-----------------------------------------------------*/
blogquest.handleFocus = {
    init: function () {
        this.keepFocusInModal();
    },

    keepFocusInModal: function () {
        let searchModal = document.querySelector(".theme-search-panel");
        let canvasMenuModal = document.querySelector(".theme-offcanvas-panel-menu");
        let canvasWidgetModal = document.querySelector(".theme-offcanvas-panel-widget");

        document.addEventListener("keydown", function (event) {
            // Check for if tab key is pressed
            let KEYCODE_TAB = 9;
            let isTabPressed =
                event.key === "Tab" || event.keyCode === KEYCODE_TAB;
            if (!isTabPressed) {
                return;
            }

            let modal;

            if (document.body.classList.contains("blogquest-search-canvas-open")) {
                modal = searchModal;
            }

            if (document.body.classList.contains("blogquest-offcanvas-menu-open")) {
                modal = canvasMenuModal;
            }

            if (document.body.classList.contains("blogquest-offcanvas-widget-open")) {
                modal = canvasWidgetModal;
            }

            if (modal) {
                let focusableEls = modal.querySelectorAll(
                    'a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="search"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled]), [tabindex]:not([tabindex="-1"])'
                );

                let firstFocusableEl = focusableEls[0];
                let lastFocusableEl = focusableEls[focusableEls.length - 1];

                // if shift key pressed for shift + tab combination
                if (event.shiftKey) {
                    if (document.activeElement === firstFocusableEl) {
                        lastFocusableEl.focus(); // add focus for the last focusable element
                        event.preventDefault();
                    }
                } else {
                    // if tab key is pressed
                    if (document.activeElement === lastFocusableEl) {
                        // if focused has reached to last focusable element then focus first focusable element after pressing tab
                        firstFocusableEl.focus(); // add focus for the first focusable element
                        event.preventDefault();
                    }
                }
            }
        });
    },
};

/* Preloader
 **-----------------------------------------------------*/
blogquest.fadeOutPreloader = {
    init: function () {

        let preloader = document.querySelector("#theme-preloader-initialize");

        if (preloader) {
            let fadeOut = setInterval(function () {
                preloader.style.transition = "0.2s";

                if (!preloader.style.opacity) {
                    preloader.style.opacity = 1;
                }
                if (preloader.style.opacity > 0) {
                    preloader.style.opacity -= 0.2;
                } else {
                    preloader.style.display = "none";
                    clearInterval(fadeOut);
                }
            }, 100);
        }
    },
};

/* Scroll to top
 **-----------------------------------------------------*/
blogquest.scrollToTop = {
    init: function () {
        let scrollToTopBtn = document.getElementById("theme-scroll-to-start");
        let rootElement = document.documentElement;

        if (scrollToTopBtn) {
            // Scroll to top on click
            this.goToTop(scrollToTopBtn, rootElement);

            // Render scroll to top button
            this.scrollToTopPosition(scrollToTopBtn, rootElement);
        }
    },

    goToTop: function (scrollToTopBtn, rootElement) {
        scrollToTopBtn.addEventListener("click", function (elem) {
            elem.preventDefault();
            rootElement.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        });
    },

    scrollToTopPosition: function (scrollToTopBtn, rootElement) {
        window.addEventListener("scroll", function (event) {
            let scrollTotal =
                rootElement.scrollHeight - rootElement.clientHeight;
            // Show on certain window height
            if (rootElement.scrollTop / scrollTotal > 0.4) {
                scrollToTopBtn.classList.add("visible");
            } else {
                scrollToTopBtn.classList.remove("visible");
            }
        });
    },
};

/* Sticky Menu
 **-----------------------------------------------------*/
blogquest.stickyMenu = {
    init: function () {
        let navBar = document.querySelector(".masthead-main-navigation");

        // Handle stikcy menu on scroll
        if (navBar && navBar.classList.contains("has-sticky-header")) {
            this.stickMenuOnScroll(navBar);
        }
    },

    stickMenuOnScroll: function (navBar) {
        window.addEventListener("scroll", function (event) {
            let navOffset = navBar.offsetTop;
            let currentScrollPos = window.pageYOffset;

            if (navOffset > currentScrollPos || currentScrollPos === 0) {
                navBar.classList.remove("sticky-header-active");
            } else {
                navBar.classList.add("sticky-header-active");
            }
        });
    },
};

/* Off Canvas
 **-----------------------------------------------------*/
blogquest.offCanvasModal = {
    init: function () {
        let offCanvasBtn = document.getElementById(
            "theme-toggle-offcanvas-button"
        );
        let closeOffCanvas = document.getElementById("theme-offcanvas-close");
        let overlayDiv = document.querySelector("#page.site");

        if (offCanvasBtn) {
            let focusElement = document.querySelector(
                "#theme-offcanvas-close"
            );

            // Handle canvas modal when opened
            this.onOpen(offCanvasBtn, focusElement);

            // Handle canvas modal when closed
            this.onClose(offCanvasBtn, closeOffCanvas, focusElement);

            // When open, close if visitor clicks on the wrapping element of the modal.
            this.outsideModal(offCanvasBtn, overlayDiv, focusElement);

            // Close on escape key press.
            this.closeOnEscape(offCanvasBtn, focusElement);
        }
    },

    onOpen: function (offCanvasBtn, focusElement) {
        offCanvasBtn.addEventListener("click", function (event) {
            event.preventDefault();
            document.body.classList.add("blogquest-offcanvas-menu-open");

            offCanvasBtn.setAttribute("aria-expanded", true);

            // Add focus after a timeout to take effect on hidden element to make the "all" transition work
            setTimeout(function () {
                focusElement.focus();
            }, 500);
        });
    },

    onClose: function (offCanvasBtn, closeOffCanvas, focusElement) {
        closeOffCanvas.addEventListener("click", function (event) {
            event.preventDefault();
            document.body.classList.remove("blogquest-offcanvas-menu-open");
            offCanvasBtn.setAttribute("aria-expanded", false);
            focusElement.blur();
            offCanvasBtn.focus();
        });
    },

    outsideModal: function (offCanvasBtn, overlayDiv, focusElement) {
        document.addEventListener("click", function (event) {
            if (document.body.classList.contains("blogquest-offcanvas-menu-open")) {
                if (event.target == overlayDiv) {
                    document.body.classList.remove("blogquest-offcanvas-menu-open");
                    offCanvasBtn.setAttribute("aria-expanded", false);
                    focusElement.blur();
                    offCanvasBtn.focus();
                    console.log(offCanvasBtn);
                }
            }
        });
    },

    closeOnEscape: function (offCanvasBtn, focusElement) {
        document.addEventListener("keydown", function (event) {
            if (document.body.classList.contains("blogquest-offcanvas-menu-open")) {
                if (event.key === "Escape") {
                    event.preventDefault();
                    document.body.classList.remove("blogquest-offcanvas-menu-open");
                    offCanvasBtn.setAttribute("aria-expanded", false);
                    focusElement.blur();
                    offCanvasBtn.focus();
                }
            }
        });
    },
};

/* Off Canvas Dropdown menu item
 **-----------------------------------------------------*/
blogquest.offCanvasDropdown = {
    init: function () {
        let subMenuToggles = document.querySelectorAll(".sub-menu-toggle");
        subMenuToggles.forEach(function (toggle) {
            toggle.addEventListener("click", function () {
                let duration =
                    toggle.getAttribute("data-toggle-duration") || 350;
                toggle.classList.toggle("active");
                toggle.setAttribute(
                    "aria-expanded",
                    toggle.getAttribute("aria-expanded") === "true"
                        ? "false"
                        : "true"
                );
                let currentClass = toggle.getAttribute("data-toggle-target");
                let currentTarget = document.querySelector(currentClass);
                currentTarget.classList.toggle("active");
                currentTarget.style.transition = `height ${duration}ms ease`;
                if (currentTarget.style.display === "block") {
                    currentTarget.style.height =
                        currentTarget.offsetHeight + "px";
                    setTimeout(() => {
                        currentTarget.style.height = "0";
                    }, 20);
                    setTimeout(() => {
                        currentTarget.style.display = "none";
                    }, duration);
                } else {
                    currentTarget.style.display = "block";
                    currentTarget.style.height = "0";
                    setTimeout(() => {
                        currentTarget.style.height = "auto";
                    }, duration);
                }
            });
        });
    },
};

/* Off-Canvas Widget
**-----------------------------------------------------*/
blogquest.offCanvasWidget = {
    init: function () {
        let offCanvasWidgetBtn = document.getElementById("theme-offcanvas-widget-button");
        let closeOffCanvasWidget = document.getElementById("theme-offcanvas-widget-close");
        let overlayWidgetDiv = document.querySelector("#page.site");

        if (offCanvasWidgetBtn) {
            let focusElement = document.querySelector("#theme-offcanvas-widget-close");

            // Handle canvas widget when opened
            this.onOpen(offCanvasWidgetBtn, focusElement);

            // Handle canvas widget when closed
            this.onClose(offCanvasWidgetBtn, closeOffCanvasWidget, focusElement);

            // When open, close if visitor clicks on the wrapping element of the widget.
            this.outsideWidget(offCanvasWidgetBtn, overlayWidgetDiv, focusElement);

            // Close on escape key press.
            this.closeOnEscape(offCanvasWidgetBtn, focusElement);
        }
    },

    onOpen: function (offCanvasWidgetBtn, focusElement) {
        offCanvasWidgetBtn.addEventListener("click", function (event) {
            event.preventDefault();
            document.body.classList.add("blogquest-offcanvas-widget-open");

            offCanvasWidgetBtn.setAttribute("aria-expanded", true);

            // Add focus after a timeout to take effect on hidden element to make the "all" transition work
            setTimeout(function () {
                focusElement.focus();
            }, 500);
        });
    },

    onClose: function (offCanvasWidgetBtn, closeOffCanvasWidget, focusElement) {
        closeOffCanvasWidget.addEventListener("click", function (event) {
            event.preventDefault();
            document.body.classList.remove("blogquest-offcanvas-widget-open");
            offCanvasWidgetBtn.setAttribute("aria-expanded", false);
            focusElement.blur();
            offCanvasWidgetBtn.focus();
        });
    },

    outsideWidget: function (offCanvasWidgetBtn, overlayWidgetDiv, focusElement) {
        document.addEventListener("click", function (event) {
            if (document.body.classList.contains("blogquest-offcanvas-widget-open")) {
                if (event.target == overlayWidgetDiv) {
                    document.body.classList.remove("blogquest-offcanvas-widget-open");
                    offCanvasWidgetBtn.setAttribute("aria-expanded", false);
                    focusElement.blur();
                    offCanvasWidgetBtn.focus();
                }
            }
        });
    },

    closeOnEscape: function (offCanvasWidgetBtn, focusElement) {
        document.addEventListener("keydown", function (event) {
            if (document.body.classList.contains("blogquest-offcanvas-widget-open")) {
                if (event.key === "Escape") {
                    event.preventDefault();
                    document.body.classList.remove("blogquest-offcanvas-widget-open");
                    offCanvasWidgetBtn.setAttribute("aria-expanded", false);
                    focusElement.blur();
                    offCanvasWidgetBtn.focus();
                }
            }
        });
    },
};

/* Search Canvas
 **-----------------------------------------------------*/
blogquest.searchCanvasModal = {
    init: function () {
        let searchCanvasBtn = document.getElementById(
            "theme-toggle-search-button"
        );
        let closeSearchCanvas = document.getElementById(
            "blogquest-search-canvas-close"
        );
        let overlayDiv = document.querySelector("#page.site");

        if (searchCanvasBtn) {
            let focusElement = document.querySelector(
                ".theme-search-panel .search-field"
            );

            // Handle cover modals when they're opened
            this.onOpen(searchCanvasBtn, focusElement);

            // Handle cover modals when they're closed
            this.onClose(searchCanvasBtn, closeSearchCanvas, focusElement);

            // When open, close if visitor clicks on the outside the modal.
            this.outsideModal(searchCanvasBtn, overlayDiv, focusElement);

            // Close on escape key press.
            this.closeOnEscape(searchCanvasBtn, focusElement);
        }
    },

    onOpen: function (searchCanvasBtn, focusElement) {
        searchCanvasBtn.addEventListener("click", function (event) {
            event.preventDefault();
            document.body.classList.add("blogquest-search-canvas-open");

            searchCanvasBtn.setAttribute("aria-expanded", true);

            // Add focus after a timeout to take effect on hidden element to make the "all" transition work
            setTimeout(function () {
                focusElement.focus();
            }, 500);
        });
    },

    onClose: function (searchCanvasBtn, closeSearchCanvas, focusElement) {
        closeSearchCanvas.addEventListener("click", function (event) {
            event.preventDefault();
            document.body.classList.remove("blogquest-search-canvas-open");
            searchCanvasBtn.setAttribute("aria-expanded", false);
            focusElement.blur();
            searchCanvasBtn.focus();
        });
    },

    outsideModal: function (searchCanvasBtn, overlayDiv, focusElement) {
        document.addEventListener("click", function (event) {
            if (document.body.classList.contains("blogquest-search-canvas-open")) {
                if (event.target == overlayDiv) {
                    document.body.classList.remove("blogquest-search-canvas-open");
                    searchCanvasBtn.setAttribute("aria-expanded", false);
                    focusElement.blur();
                    searchCanvasBtn.focus();
                }
            }
        });
    },

    closeOnEscape: function (searchCanvasBtn, focusElement) {
        document.addEventListener("keydown", function (event) {
            if (document.body.classList.contains("blogquest-search-canvas-open")) {
                if (event.key === "Escape") {
                    event.preventDefault();
                    document.body.classList.remove("blogquest-search-canvas-open");
                    searchCanvasBtn.setAttribute("aria-expanded", false);
                    focusElement.blur();
                    searchCanvasBtn.focus();
                }
            }
        });
    },
};

/* Background Image
 **-----------------------------------------------------*/
blogquest.setBackgroundImage = {
    init: function () {
        let bgImageContainer = document.querySelectorAll(".blogquest-bg-image");
        if (bgImageContainer) {
            bgImageContainer.forEach(function (item) {
                let image = item.querySelector("img");
                if (image) {
                    let imageSrc = image.getAttribute("src");
                    if (imageSrc) {
                        item.style.backgroundImage = "url(" + imageSrc + ")";
                        if (item.classList.contains("blogquest-header-image")) {
                            image.style.visibility = "hidden";
                        } else {
                            image.style.display = "none";
                        }
                    }
                }
            });
        }

        let pageSections = document.querySelectorAll(".data-bg");
        pageSections.forEach(function (section) {
            let background = section.getAttribute("data-background");
            if (background) {
                section.style.backgroundImage = "url(" + background + ")";
            }
        });
    },
};

/* Progress Bar
 **-----------------------------------------------------*/
blogquest.progressBar = {
    init: function () {
        let progressBarDiv = document.getElementById("blogquest-progress-bar");

        if (progressBarDiv) {
            let body = document.body;
            let rootElement = document.documentElement;

            window.addEventListener("scroll", function (event) {
                let winScroll = body.scrollTop || rootElement.scrollTop;
                let height =
                    rootElement.scrollHeight - rootElement.clientHeight;
                let scrolled = (winScroll / height) * 100;
                progressBarDiv.style.width = scrolled + "%";
            });
        }
    },
};

/* Tab Widget
 **-----------------------------------------------------*/
blogquest.tabWidget = {
    init: function () {

        const widgetContainers = document.querySelectorAll(".theme-widget-tab");
        widgetContainers.forEach((container) => {
            const tabs = container.querySelectorAll(
                ".tab-header-list .widget-tab-presentation"
            );
            const tabPanes = container.querySelectorAll(
                ".widget-tab-content .tab-content-panel"
            );

            tabs.forEach((tab) => {
                tab.addEventListener("click", function (event) {
                    const tabid = this.getAttribute("tab-data");
                    tabs.forEach((tab) => tab.classList.remove("active"));
                    tabPanes.forEach((tabPane) =>
                        tabPane.classList.remove("active")
                    );
                    this.classList.add("active");
                    container
                        .querySelector(`.content-${tabid}`)
                        .classList.add("active");
                });
            });
        });
    },
};

/* Swiper slides
 **-----------------------------------------------------*/
blogquest.swiperJs = {
    init: function () {
        const swiperContainers = document.querySelectorAll(".theme-banner-slider");
        const commonOptions = {
            slidesPerView: 1,
            effect: "slide",
            loop: false,
            keyboard: true,
            mousewheel: false,
            speed: 1000,
            simulateTouch: false,
            roundLengths: true,
            autoplay: {
                disableOnInteraction: false,
                delay: 9000,
            },
            a11y: {
                prevSlideMessage: "Previous slide",
                nextSlideMessage: "Next slide",
            },
        };

        swiperContainers.forEach((swiperContainer) => {
            const options = {};
            if (
                swiperContainer.parentNode.classList.contains("site-banner-layout-slider")
            ) {
                Object.assign(options, {
                    parallax: true,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        type: "progressbar",
                    },
                });
            } else if (
                swiperContainer.parentNode.classList.contains("site-banner-layout-carousal")
            ) {
                Object.assign(options, {
                    slidesPerView: 1,
                    loop: true,
                    spaceBetween: 30,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                        },
                        1190: {
                            slidesPerView: 3,
                            centeredSlides: true,
                            centeredSlidesBounds: true
                        },
                    },
                });
            }

            const mergedOptions = {...commonOptions, ...options};
            const swiper = new Swiper(swiperContainer, mergedOptions);

            if (
                swiperContainer.parentNode.classList.contains("site-banner-layout-slider")
            ) {
                swiper.on("slideChangeTransitionEnd", () => {
                    document.querySelector(
                        ".swiper-fraction-pagination span:first-child"
                    ).textContent = swiper.activeIndex + 1;
                });
                document.querySelector(
                    ".swiper-fraction-pagination span:first-child"
                ).textContent = "1";
                document.querySelector(
                    ".swiper-fraction-pagination span:last-child"
                ).textContent = swiper.slides.length;
            }
        });
    },
};

/* Popup ModelBox
 **-----------------------------------------------------*/
blogquest.lightBox = {
    init: function () {
        let light = document.querySelector("[data-glightbox]");
        if (light) {
            GLightbox({
                selector: "[data-glightbox]",
                openEffect: "zoom",
                closeEffect: "fade",
            });
        }
    },
};

/* Sticky Footer
 **-----------------------------------------------------*/
blogquest.stickyFooter = {
    init: function () {
        const footer = document.querySelector('[data-sticky-footer=true]');
        const spacer = document.querySelector('.sticky-footer-spacer');

        if (!footer || !spacer) return;

        const footerHeight = footer.offsetHeight;

        function updateSpacerHeight() {
            spacer.style.height = `${footerHeight}px`;
        }

        window.addEventListener('load', updateSpacerHeight);
        window.addEventListener('resize', updateSpacerHeight);

        function handleScroll() {
            const scrollPosition = window.pageYOffset;
            const spacerTopOffset = spacer.offsetTop;
            const shouldStickyFooter = scrollPosition >= spacerTopOffset - window.innerHeight;
            footer.classList.toggle('has-footer-stuck', shouldStickyFooter);
        }

        document.body.classList.add('has-sticky-footer');
        window.addEventListener('scroll', handleScroll);
    },
};

/* simple Tooltip
 **-----------------------------------------------------*/
blogquest.simpleTooltip = {
    init: function () {
        const buttons = document.querySelectorAll('.theme-button-tooltip');

        buttons.forEach((button) => {
            const tooltipText = button.querySelector('.screen-reader-text').textContent;

            button.addEventListener('mouseover', () => {
                const tooltipElement = document.createElement('span');
                tooltipElement.classList.add('tooltiptext');
                tooltipElement.innerText = tooltipText;
                button.appendChild(tooltipElement);
                button.classList.add('tooltip');
            });

            button.addEventListener('mouseout', () => {
                const tooltipElement = button.querySelector('.tooltiptext');
                button.removeChild(tooltipElement);
                button.classList.remove('tooltip');
            });
        });
    },
};

/* Welcome Screen Advertisement
 **-----------------------------------------------------*/

blogquest.fullpageAdvertisement = {
    init() {
        const adCountDown = document.querySelector('.welcome-screen-countdown');
        const headerAds = document.querySelector('.welcome-screen-banner');
        const adBtn = document.querySelector('.welcome-screen-skip');

        if (!headerAds) return;

        let counter = 6;
        let startCount = null;

        function startScroll() {
            headerAds.classList.add('welcome-screen-vanished');
        }

        adBtn.addEventListener('click', () => {
            clearInterval(startCount);
            startScroll();
        });

        startCount = setInterval(() => {
            counter--;
            adCountDown.textContent = `${counter}sec`;

            if (counter === 0) {
                clearInterval(startCount);
                startScroll();
            }
        }, 1000);
    },
};

/* Custom Cursor
 **-----------------------------------------------------*/
let cursorObj;
blogquest.customCursor = {
    init: function () {
        cursorObj = this;
        this.customCursor();
    },
    isVariableDefined: function (el) {
        return typeof !!el && el != "undefined" && el != null;
    },
    select: function (selectors) {
        return document.querySelector(selectors);
    },
    selectAll: function (selectors) {
        return document.querySelectorAll(selectors);
    },
    customCursor: function () {
        let c = cursorObj.select(".cursor-dot");
        if (cursorObj.isVariableDefined(c)) {
            let cursor = {
                delay: 8,
                _x: 0,
                _y: 0,
                endX: window.innerWidth / 2,
                endY: window.innerHeight / 2,
                cursorVisible: true,
                cursorEnlarged: false,
                $dot: cursorObj.select(".cursor-dot"),
                $outline: cursorObj.select(".cursor-dot-outline"),

                init: function () {
                    // Set up element sizes
                    this.dotSize = this.$dot.offsetWidth;
                    this.outlineSize = this.$outline.offsetWidth;

                    this.setupEventListeners();
                    this.animateDotOutline();
                },

                updateCursor: function (e) {
                    let self = this;

                    // Show the cursor
                    self.cursorVisible = true;
                    self.toggleCursorVisibility();

                    // Position the dot
                    self.endX = e.clientX;
                    self.endY = e.clientY;
                    self.$dot.style.top = self.endY + "px";
                    self.$dot.style.left = self.endX + "px";
                },

                setupEventListeners: function () {
                    let self = this;

                    // Reposition cursor on window load
                    window.addEventListener("load", (event) => {
                        self.cursorEnlarged = false;
                        self.toggleCursorSize();
                    });

                    // Anchor hovering
                    cursorObj.selectAll("a, button").forEach(function (el) {
                        el.addEventListener("mouseover", function () {
                            self.cursorEnlarged = true;
                            self.toggleCursorSize();
                        });
                        el.addEventListener("mouseout", function () {
                            self.cursorEnlarged = false;
                            self.toggleCursorSize();
                        });
                    });

                    // Click events
                    document.addEventListener("mousedown", function () {
                        self.cursorEnlarged = true;
                        self.toggleCursorSize();
                    });
                    document.addEventListener("mouseup", function () {
                        self.cursorEnlarged = false;
                        self.toggleCursorSize();
                    });

                    document.addEventListener("mousemove", function (e) {
                        // Show the cursor
                        self.cursorVisible = true;
                        self.toggleCursorVisibility();

                        // Position the dot
                        self.endX = e.clientX;
                        self.endY = e.clientY;
                        self.$dot.style.top = self.endY + "px";
                        self.$dot.style.left = self.endX + "px";
                    });

                    // Hide/show cursor
                    document.addEventListener("mouseenter", function (e) {
                        self.cursorVisible = true;
                        self.toggleCursorVisibility();
                        self.$dot.style.opacity = 1;
                        self.$outline.style.opacity = 1;
                    });

                    document.addEventListener("mouseleave", function (e) {
                        self.cursorVisible = true;
                        self.toggleCursorVisibility();
                        self.$dot.style.opacity = 0;
                        self.$outline.style.opacity = 0;
                    });
                },

                animateDotOutline: function () {
                    let self = this;

                    self._x += (self.endX - self._x) / self.delay;
                    self._y += (self.endY - self._y) / self.delay;
                    self.$outline.style.top = self._y + "px";
                    self.$outline.style.left = self._x + "px";

                    requestAnimationFrame(this.animateDotOutline.bind(self));
                },

                toggleCursorSize: function () {
                    let self = this;

                    if (self.cursorEnlarged) {
                        self.$dot.style.transform =
                            "translate(-50%, -50%) scale(0.75)";
                        self.$outline.style.transform =
                            "translate(-50%, -50%) scale(1.6)";
                    } else {
                        self.$dot.style.transform =
                            "translate(-50%, -50%) scale(1)";
                        self.$outline.style.transform =
                            "translate(-50%, -50%) scale(1)";
                    }
                },

                toggleCursorVisibility: function () {
                    let self = this;

                    if (self.cursorVisible) {
                        self.$dot.style.opacity = 1;
                        self.$outline.style.opacity = 1;
                    } else {
                        self.$dot.style.opacity = 0;
                        self.$outline.style.opacity = 0;
                    }
                },
            };
            cursor.init();
        }
    },
};

/* Load functions at proper events
 *--------------------------------------------------*/
/**
 * Is the DOM ready?
 *
 * This implementation is coming from https://gomakethings.com/a-native-javascript-equivalent-of-jquerys-ready-method/
 *
 * @param {Function} fn Callback function to run.
 */
function blogquestDomReady(fn) {
    if (typeof fn !== "function") {
        return;
    }

    if (
        document.readyState === "interactive" ||
        document.readyState === "complete"
    ) {
        return fn();
    }

    document.addEventListener("DOMContentLoaded", fn, false);
}

blogquestDomReady(function () {
    blogquest.offCanvasModal.init();
    blogquest.offCanvasDropdown.init();
    blogquest.offCanvasWidget.init();
    blogquest.searchCanvasModal.init();
    blogquest.stickyMenu.init();
    blogquest.scrollToTop.init();
    blogquest.handleFocus.init();
    blogquest.traverseMenu.init();
    blogquest.setBackgroundImage.init();
    blogquest.progressBar.init();
    blogquest.tabWidget.init();
    blogquest.swiperJs.init();
    blogquest.lightBox.init();
    blogquest.stickyFooter.init();
    blogquest.simpleTooltip.init();
    blogquest.fullpageAdvertisement.init();
    blogquest.customCursor.init();
});

window.addEventListener("load", function (event) {
    blogquest.fadeOutPreloader.init();
});
