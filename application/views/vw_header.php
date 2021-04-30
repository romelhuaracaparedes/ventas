<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Spruha - Codeigniter Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin template, admin dashboard, bootstrap dashboard template, bootstrap 4 admin template, codeigniter 4 admin panel, template codeigniter bootstrap, php, codeigniter, php framework, web template, html5 template, php code, php html, codeigniter 4, codeigniter mvc">

    <!-- Favicon -->
    <link rel="icon" href="<?=base_url()?>assets/img/brand/favicon.ico" type="image/x-icon" />

    <!-- Title -->
    <title>Sistema de Ventas</title>

    <!-- Bootstrap css-->
    <link href="<?=base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Icons css-->
    <link href="<?=base_url()?>assets/plugins/web-fonts/icons.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/web-fonts/plugin.css" rel="stylesheet" />

    <!-- Style css-->
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/skins.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/dark-style.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/colors/default.css" rel="stylesheet" />

    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>assets/css/colors/color.css" />

    <!-- Select2 css-->
    <link href="<?=base_url()?>assets/plugins/select2/css/select2.min.css" rel="stylesheet">

    <!-- Sidemenu css-->
    <link href="<?=base_url()?>assets/css/sidemenu/sidemenu.css" rel="stylesheet">

    <!-- Switcher css-->
    <link href="<?=base_url()?>assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/switcher/demo.css" rel="stylesheet">

    <!-- Mutipleselect css-->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/multipleselect/multiple-select.css">

</head>

<body class="main-body leftmenu">


    <!-- Loader -->
    <div id="global-loader">
        <img src="<?=base_url()?>assets/img/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- End Loader -->

    <!-- Page -->
    <div class="page">

        <!-- Sidemenu -->
        <div class="main-sidebar main-sidebar-sticky side-menu">
            <div class="sidemenu-logo">
                <a class="main-logo" href="index.html">
                    <img src="<?=base_url()?>assets/img/brand/logo-light.png" class="header-brand-img desktop-logo" alt="logo">
                    <img src="<?=base_url()?>assets/img/brand/icon-light.png" class="header-brand-img icon-logo" alt="logo">
                    <img src="<?=base_url()?>assets/img/brand/logo.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
                    <img src="<?=base_url()?>assets/img/brand/icon.png" class="header-brand-img icon-logo theme-logo" alt="logo">
                </a>
            </div>
            <div class="main-sidebar-body">
                <ul class="nav">
                    <li class="nav-header"><span class="nav-label">Dashboard</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-layout sidemenu-icon"></i><span class="sidemenu-label">Layouts</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link with-sub" href="#"></span><span class="sidemenu-label">Horizontal</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="nav-sub">
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="horizontallight.html">Light</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="horizontaldark.html">Dark</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="horizontal-light-boxed.html">Light-Boxed</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="horizontal-dark-boxed.html">Dark-Boxed</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link with-sub" href="#"></span><span class="sidemenu-label">Horizontal-Centerlogo</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="nav-sub">
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="horizontal-light-centerlogo.html">Light</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="horizontal-dark-centerlogo.html">Dark</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="horizontal-light-center-logo-boxed.html">Light-Boxed</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="horizontal-dark-center-logo-boxed.html">Dark-Boxed</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link with-sub" href="#"></span><span class="sidemenu-label">Sidemenu-Icon</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="nav-sub">
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-light.html">Light</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-dark.html">Dark</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-light-boxed.html">Light-Boxed</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-dark-boxed.html">Dark-Boxed</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link with-sub" href="#"></span><span class="sidemenu-label">Sidemenu-Closed</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="nav-sub">
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-light-closed.html">Light</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-dark-closed.html">Dark</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-light-closed-boxed.html">Light-Boxed</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-dark-closed-boxed.html">Dark-Boxed</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link with-sub" href="#"></span><span class="sidemenu-label">Sidemenu-Toggle</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="nav-sub">
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-toggle-light-sidebar.html">Light</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-toggle-light-sidebar-dark.html">Dark</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-toggle-light-sidebar-boxed.html">Light-Boxed</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-toggle-light-sidebar-dark-boxed.html">Dark-Boxed</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link with-sub" href="#"></span><span class="sidemenu-label">Sidemenu-Icontext</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="nav-sub">
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-icontext.html">Light</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-icontext-dark.html">Dark</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-icontext-boxed.html">Light-Boxed</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-icontext-dark-boxed.html">Dark-Boxed</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link with-sub" href="#"></span><span class="sidemenu-label">Sidemenu-Iconoverlay</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="nav-sub">
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-light-icon-overlay.html">Light</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-light-icon-overlay-dark.html">Dark</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-light-icon-overlay-boxed.html">Light-Boxed</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-light-icon-overlay-dark-boxed.html">Dark-Boxed</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link with-sub" href="#"></span><span class="sidemenu-label">Menu-hoversubmenu</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="nav-sub">
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-hoversubmenu.html">Light</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-hoversubmenu-dark.html">Dark</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-hoversubmenu-boxed.html">Light-Boxed</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-hoversubmenu-dark-boxed.html">Dark-Boxed</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link with-sub" href="#"></span><span class="sidemenu-label">Menu-hoversubmenu-1</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="nav-sub">
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-hoversubmenu-style-1.html">Light</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-hoversubmenu-style-1-dark.html">Dark</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-hoversubmenu-style-1-boxed.html">Light-Boxed</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="sidemenu-hoversubmenu-style-1-dark-boxed.html">Dark-Boxed</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-wallet sidemenu-icon"></i><span class="sidemenu-label">Crypto Currencies</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="crypto-dashbaord.html">Dashboard</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="crypto-market.html">Marketcap</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="crypto-currency-exchange.html">Currency exchange</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="crypto-buy-sell.html">Buy & Sell</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="crypto-wallet.html">Wallet</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="crypto-transcations.html">Transcations</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-shopping-cart-full sidemenu-icon"></i><span class="sidemenu-label">E-Commerce</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="ecommerce-dashboard.html">Dashboard</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="ecommerce-products.html">Products</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="ecommerce-product-details.html">Product Details</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="ecommerce-cart.html">Cart</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="ecommerce-checkout.html">Checkout</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="ecommerce-orders.html">Orders</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="ecommerce-account.html">Account</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header"><span class="nav-label">Applications</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="widgets.html"><span class="shape1"></span><span class="shape2"></span><i class="ti-server sidemenu-icon"></i><span class="sidemenu-label">Widgets</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-email sidemenu-icon"></i><span class="sidemenu-label">Mail</span><span class="badge badge-warning side-badge">2</span></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="mail-inbox.html">Mail-Inbox</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="viewmail.html">View-Mail</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-write sidemenu-icon"></i><span class="sidemenu-label">Apps</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="chat.html">Chat</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="cards.html">Cards</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="calendar.html">Calendar</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="contacts.html">Contacts</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-face-smile sidemenu-icon"></i><span class="sidemenu-label">Icons</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="icons1.html">Font Awesome</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="icons2.html">Material Design Icons</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="icons3.html">Simple Line Icons</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="icons4.html">Feather Icons</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="icons5.html">Ionic Icons</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="icons6.html">Flag Icons</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="icons7.html">Pe7 Icons</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="icons8.html">Themify Icons</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="icons9.html">Typicons Icons</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="icons10.html">Weather Icons</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="icons11.html">Material Icons</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-map-alt sidemenu-icon"></i><span class="sidemenu-label">Maps</span><span class="badge badge-secondary side-badge">2</span></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="map-mapel.html">Mapel Maps</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="map-vector.html">Vector Maps</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-agenda sidemenu-icon"></i><span class="sidemenu-label">Tables</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="table-basic.html">Basic Tables</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="table-data.html">Data Tables</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header"><span class="nav-label">Components</span></li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-package sidemenu-icon"></i><span class="sidemenu-label">Elements</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="alerts.html">Alerts</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="avatar.html">Avatar</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="breadcrumbs.html">Breadcrumbs</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="buttons.html">Buttons</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="badge.html">Badge</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="dropdown.html">Dropdown</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="thumbnails.html">Thumbnails</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="list-group.html">List Group</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="navigation.html">Navigation</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="pagination.html">Pagination</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="popover.html">Popover</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="progress.html">Progress</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="spinners.html">Spinners</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="media-object.html">Media Object</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="typography.html">Typography</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="tooltip.html">Tooltip</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="toast.html">Toast</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="tags.html">Tags</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-briefcase sidemenu-icon"></i><span class="sidemenu-label">Advanced UI</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="accordion.html">Accordion</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="carousel.html">Carousel</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="collapse.html">Collapse</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="modals.html">Modals</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="timeline.html">Timeline</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="draggablecard.html">Draggable-Cards</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="sweet-alert.html">Sweet Alert</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="rating.html">Ratings</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="search.html">Search</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="userlist.html">Userlist</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="blog.html">Blog</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header"><span class="nav-label">Forms &amp; Charts</span></li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-receipt sidemenu-icon"></i><span class="sidemenu-label">Forms</span><span class="badge badge-info side-badge">6</span></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="form-elements.html">Form Elements</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="form-advanced.html">Advanced Forms</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="form-layouts.html">Form Layouts</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="form-validation.html">Form Validation</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="form-wizards.html">Form Wizards</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="form-editor.html">WYSIWYG Editor</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-bar-chart-alt sidemenu-icon"></i><span class="sidemenu-label">Charts</span><span class="badge badge-danger side-badge">5</span></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="chart-morris.html">Morris Charts</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="chart-flot.html">Flot Charts</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="chart-chartjs.html">ChartJS</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="chart-spark-peity.html">Sparkline &amp; Peity</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="chart-echart.html">Echart</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header"><span class="nav-label">Other Pages</span></li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-palette sidemenu-icon"></i><span class="sidemenu-label ">Pages</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="profile.html">Profile</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="invoice.html">Invoice</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="pricing.html">Pricing</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="gallery.html">Gallery</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="faq.html">Faqs</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="success-message.html">Success Message</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="danger-message.html">Danger Message</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="warning-message.html">Warning Message</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="empty.html">Empty Page</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-shield sidemenu-icon"></i><span class="sidemenu-label">Utilities</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="background.html">Background</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="border.html">Border</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="display.html">Display</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="flex.html">Flex</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="height.html">Height</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="margin.html">Margin</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="padding.html">Padding</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="position.html">Position</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="width.html">Width</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="extras.html">Extras</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-lock sidemenu-icon"></i><span class="sidemenu-label">Custom Pages</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="signin.html">Sign In</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="signup.html">Sign Up</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="forgot.html">Forgot Password</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="reset.html">Reset Password</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="lockscreen.html">Lockscreen</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="underconstruction.html">UnderConstruction</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="error-404.html">404 Error</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="error-500.html">500 Error</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-menu sidemenu-icon"></i><span class="sidemenu-label">Submenu</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="#">Submenu-01</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link with-sub" href="#"></span><span class="sidemenu-label">Submenu-02</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="nav-sub">
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="#">Level-01</a>
                                    </li>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link with-sub" href="#"></span><span class="sidemenu-label">level-02</span><i class="angle fe fe-chevron-right"></i></a>
                                        <ul class="nav-sub">
                                            <li class="nav-sub-item">
                                                <a class="nav-sub-link" href="#">Submenu-01</a>
                                            </li>
                                            <li class="nav-sub-item">
                                                <a class="nav-sub-link" href="#">Submenu-02</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Sidemenu -->
        <!-- Main Header-->
        <div class="main-header side-header sticky">
            <div class="container-fluid">

                <div class="main-header-left">
                    <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
                </div>
                <div class="main-header-center">
                    <div class="responsive-logo">
                        <a href="index.html"><img src="<?=base_url()?>assets/img/brand/logo.png" class="mobile-logo" alt="logo"></a>
                        <a href="index.html"><img src="<?=base_url()?>assets/img/brand/logo-light.png" class="mobile-logo-dark" alt="logo"></a>
                    </div>
                </div>
                <div class="main-header-right">
              
               
                    <div class="dropdown d-md-flex full-screen-link">
                        <a class="nav-link icon " href="#">
                            <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                            <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                        </a>
                    </div>
                    <div class="dropdown main-header-notification">
                        <a class="nav-link icon" href="#">
                            <i class="fe fe-bell header-icons"></i>
                            <span class="badge badge-danger nav-link-badge">4</span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="header-navheading">
                                <p class="main-notification-text">You have 1 unread notification<span class="badge badge-pill badge-primary ml-3">View all</span></p>
                            </div>
                            <div class="main-notification-list">
                                <div class="media new">
                                    <div class="main-img-user online"><img alt="avatar" src="<?=base_url()?>assets/img/users/5.jpg"></div>
                                    <div class="media-body">
                                        <p>Congratulate <strong>Olivia James</strong> for New template start</p><span>Oct 15 12:32pm</span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="main-img-user"><img alt="avatar" src="<?=base_url()?>assets/img/users/2.jpg"></div>
                                    <div class="media-body">
                                        <p><strong>Joshua Gray</strong> New Message Received</p><span>Oct 13 02:56am</span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="main-img-user online"><img alt="avatar" src="<?=base_url()?>assets/img/users/3.jpg"></div>
                                    <div class="media-body">
                                        <p><strong>Elizabeth Lewis</strong> added new schedule realease</p><span>Oct 12 10:40pm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-footer">
                                <a href="#">View All Notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown main-profile-menu">
                        <a class="d-flex" href="#">
                            <span class="main-img-user"><img alt="avatar" src="<?=base_url()?>assets/img/users/1.jpg"></span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="header-navheading">
                                <h6 class="main-notification-title">Sonia Taylor</h6>
                                <p class="main-notification-text">Web Designer</p>
                            </div>
                            <a class="dropdown-item border-top" href="profile.html">
                                <i class="fe fe-user"></i> My Profile
                            </a>
                            <a class="dropdown-item" href="profile.html">
                                <i class="fe fe-edit"></i> Edit Profile
                            </a>
                            <a class="dropdown-item" href="profile.html">
                                <i class="fe fe-settings"></i> Account Settings
                            </a>
                            <a class="dropdown-item" href="profile.html">
                                <i class="fe fe-settings"></i> Support
                            </a>
                            <a class="dropdown-item" href="profile.html">
                                <i class="fe fe-compass"></i> Activity
                            </a>
                            <a class="dropdown-item" href="signin.html">
                                <i class="fe fe-power"></i> Sign Out
                            </a>
                        </div>
                    </div>
                    <div class="dropdown d-md-flex header-settings">
                        <a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
                            <i class="fe fe-align-right header-icons"></i>
                        </a>
                    </div>
                    <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
								<i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
							</button>
                    <!-- Navresponsive closed -->
                </div>
            </div>
        </div>
        <!-- End Main Header-->

        <!-- Mobile-header -->
        <div class="mobile-main-header">
            <div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <div class="d-flex order-lg-2 ml-auto">
                        <div class="dropdown header-search">
                            <a class="nav-link icon header-search">
                                <i class="fe fe-search header-icons"></i>
                            </a>
                        </div>
                        <div class="dropdown full-screen-link">
                            <a class="nav-link icon ">
                                <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                                <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                            </a>
                        </div>
                        <div class="dropdown main-header-notification">
                            <a class="nav-link icon" href="#">
                                <i class="fe fe-bell header-icons"></i>
                                <span class="badge badge-danger nav-link-badge">4</span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="header-navheading">
                                    <p class="main-notification-text">You have 1 unread notification<span class="badge badge-pill badge-primary ml-3">View all</span></p>
                                </div>
                                <div class="main-notification-list">
                                    <div class="media new">
                                        <div class="main-img-user online"><img alt="avatar" src="<?=base_url()?>assets/img/users/5.jpg"></div>
                                        <div class="media-body">
                                            <p>Congratulate <strong>Olivia James</strong> for New template start</p><span>Oct 15 12:32pm</span>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="main-img-user"><img alt="avatar" src="<?=base_url()?>assets/img/users/2.jpg"></div>
                                        <div class="media-body">
                                            <p><strong>Joshua Gray</strong> New Message Received</p><span>Oct 13 02:56am</span>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="main-img-user online"><img alt="avatar" src="<?=base_url()?>assets/img/users/3.jpg"></div>
                                        <div class="media-body">
                                            <p><strong>Elizabeth Lewis</strong> added new schedule realease</p><span>Oct 12 10:40pm</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-footer">
                                    <a href="#">View All Notifications</a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown main-profile-menu">
                            <a class="d-flex" href="#">
                                <span class="main-img-user"><img alt="avatar" src="<?=base_url()?>assets/img/users/1.jpg"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="header-navheading">
                                    <h6 class="main-notification-title">Sonia Taylor</h6>
                                    <p class="main-notification-text">Web Designer</p>
                                </div>
                                <a class="dropdown-item border-top" href="profile.html">
                                    <i class="fe fe-user"></i> My Profile
                                </a>
                                <a class="dropdown-item" href="profile.html">
                                    <i class="fe fe-edit"></i> Edit Profile
                                </a>
                                <a class="dropdown-item" href="profile.html">
                                    <i class="fe fe-settings"></i> Account Settings
                                </a>
                                <a class="dropdown-item" href="profile.html">
                                    <i class="fe fe-settings"></i> Support
                                </a>
                                <a class="dropdown-item" href="profile.html">
                                    <i class="fe fe-compass"></i> Activity
                                </a>
                                <a class="dropdown-item" href="signin.html">
                                    <i class="fe fe-power"></i> Sign Out
                                </a>
                            </div>
                        </div>
                        <div class="dropdown  header-settings">
                            <a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
                                <i class="fe fe-align-right header-icons"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile-header closed -->
        <!-- Main Content-->
        <div class="main-content side-content pt-0">

            <div class="container-fluid">
                <div class="inner-body">