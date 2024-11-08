<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login"); // Redirect to login page if not logged in
    exit;
}

// The rest of your dashboard.php code goes here
?>
<!DOCTYPE html><html lang=en class=black>
<title>Quotex demo account | QxBroker demo</title>
<meta name=theme-color content=#ffffff>
<link rel="stylesheet" href="assets/css/style1.css">
<link rel="stylesheet" href="assets/css/style2.css">
<link rel="stylesheet" href="assets/css/style8.css">
<style>
   /* Adjust sidebar for mobile screens */
@media (max-width: 768px) {
    .sidebar {
        width: 80px; /* narrower sidebar */
    }
    .sidebar__buttons {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
}
   .hidden {
    display: none;
}
.chart-container {
    width: 100%;
    height: 100%;
    position: relative;
}
body {
    font-size: 1.6vw;
}
@media (max-width: 768px) {
    body {
        font-size: 3vw;
    }
}

@media (max-width: 567px) {
    .header__banner {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    .header__banner-container {
        width: 100%;
        padding: 10px;
    }
}
@media (max-width: 768px) {
    .chart-container {
        width: 100%;
        height: auto;
    }
    .trading-chart {
        flex-direction: column;
    }
}
@media (max-width: 567px) {
    .tabs, .asset-select {
        display: none;
    }
    .trading-chart__top, .trading-chart__left {
        display: none;
    }
}
.button {
    padding: 10px 20px;
    font-size: 14px;
}
@media (max-width: 567px) {
    .button {
        padding: 8px 16px;
        font-size: 12px;
    }
}
@media (max-width: 567px) {
    .sidebar__footer, .server-time, .pair-information {
        display: none;
    }
}
.sidebar__button {
   /* Existing styles */
}

.sidebar__button[data-text="Logout"] {
   background-color: none; /* Example red color */
   color: white; /* Text color */
}
</style>

<meta name=referrer content=no-referrer>

<style>.sf-hidden{display:none!important}</style>

</head>

<body class=loading>
    <div id=root>
        <div class="app app--fixed animate app--sidebar_name-open">
            <aside class="sidebar app__sidebar">
                <div>
                   <svg class="icon-burger-dark sidebar__toggle">
                      <symbol fill=none id=icon-burger-dark viewBox="0 0 20 16">
                         <rect width=20 height=1.5 fill=#FFFFFF></rect>
                         <rect y=7 width=15 height=1.5 fill=#FFFFFF></rect>
                         <rect y=14 width=20 height=1.5 fill=#FFFFFF></rect>
                      </symbol>
                      <use xlink:href=#icon-burger-dark></use>
                   </svg>
                </div>
                <!-- Ensure icons.svg is accessible in the specified path -->
                <object type="image/svg+xml" data="assets/icons.svg" style="display: none;"></object>

                <nav class="sidebar__buttons">
                    <a data-text="Trade" class="sidebar__button open-name" href="#">
                        <div class="sidebar__button-icon">
                            <svg class="icon-trade-sidebar">
                                <use xlink:href="assets/icons.svg#icon-trade-sidebar"></use>
                            </svg>
                            <span>Trade</span>
                        </div>
                    </a>

                    <button class="sidebar__button open-name" data-text="Support">
                        <div class="sidebar__button-icon">
                            <svg class="icon-help">
                                <use xlink:href="assets/icons.svg#icon-help"></use>
                            </svg>
                            <span>Support</span>
                        </div>
                    </button>

                    <a data-text="Account" class="sidebar__button open-name" href="account.php">
                        <div class="sidebar__button-icon">
                            <svg class="icon-profile">
                                <use xlink:href="assets/icons.svg#icon-profile"></use>
                            </svg>
                            <span>Account</span>
                        </div>
                    </a>

                    <a data-text="Tournaments" class="sidebar__button open-name" href="#">
                        <div class="sidebar__button-icon">
                            <div class="sidebar__button-icon-tournament">4</div>
                            <svg class="icon-tournaments">
                                <use xlink:href="assets/icons.svg#icon-tournaments"></use>
                            </svg>
                            <span>Tournaments</span>
                        </div>
                    </a>

                    <a data-text="Market" class="sidebar__button open-name" href="#">
                        <div class="sidebar__button-icon">
                            <svg class="icon-market">
                                <use xlink:href="assets/icons.svg#icon-market"></use>
                            </svg>
                            <span>Market</span>
                        </div>
                    </a>

                    <button class="sidebar__button open-name" data-text="More">
                        <div class="sidebar__button-icon">
                            <svg class="icon-more-sidebar">
                                <use xlink:href="assets/icons.svg#icon-more-sidebar"></use>
                            </svg>
                            <span>More</span>
                        </div>
                    </button>

                    <!-- Logout Button -->
                    <button class="sidebar__button open-name" data-text="Logout" onclick="logoutUser()">
                        <div class="sidebar__button-icon">
                            <svg class="icon-logout">
                                <use xlink:href="assets/spritemap.svg#icon-logout"></use>
                            </svg>
                            <span>Logout</span>
                        </div>
                    </button>
                    </nav>

                    <script>
                    function logoutUser() {
                        // Redirect to logout script or perform logout action
                        window.location.href = 'logout'; // Update this with your logout script URL
                    }
                    </script>
                <div class="sidebar__usermenu sf-hidden"></div>
                <div class="sidebar__footer sidebar__footer--closed">
                  <div class="sidebar__settings-block">
                     <!-- Fullscreen Settings Button -->
                     <button class="sidebar__settings-button">
                        <svg class="icon-settings-full-screen">
                           <use xlink:href="assets/fullscreen-icons.svg#icon-settings-full-screen"></use>
                        </svg>
                     </button>
                     
                     <!-- Sidebar Button -->
                     <button class="sidebar__settings-button">
                        <svg class="icon-left-sidebar">
                           <use xlink:href="assets/sidebar-icons.svg#icon-left-sidebar"></use>
                        </svg>
                     </button>
                  </div>
                  
                  <!-- Load Settings Icons SVG Sprite -->
                  <object type="image/svg+xml" data="assets/settings-icons.svg" style="display: none;"></object>
                  
                  <div class="sidebar__settings">
                     <!-- General Settings Button -->
                     <button class="sidebar__settings-button">
                        <svg class="icon-settings">
                           <use xlink:href="assets/settings-icons.svg#icon-settings"></use>
                        </svg>
                     </button>
                     
                     <!-- Sound Settings Button -->
                     <button class="sidebar__settings-button">
                        <svg class="icon-settings-sound">
                           <use xlink:href="assets/settings-icons.svg#icon-settings-sound"></use>
                        </svg>
                     </button>
                  </div>
                  
                  <!-- Load Social Media Icons SVG Sprite -->
                  <object type="image/svg+xml" data="assets/social-icons.svg" style="display: none;"></object>
                  
                  <!-- Social Media Button -->
                  <button class="sidebar__social-media">
                     <svg width="28" height="28" viewBox="0 0 28 28" class="icon-social-media">
                        <use xlink:href="assets/social-icons.svg#icon-social-media"></use>
                     </svg>
                     Join us
                  </button>
                  
                  <div class="sidebar__livechat">
                     <a class="sidebar__livechat-status online" href="#">Help</a>
                  </div>
               </div>
                <div class="sidebar__footer sidebar__footer--open sf-hidden" dir=auto></div>
             </aside>
            <aside class="sidepanel app__sidepanel sidepanel__bg-black"></aside>

<div class="page app__page">
   <header class="header page__header">
      <div class=header__brand>
         <!-- HTML file linking to the external SVG -->
         <!-- HTML file linking to the external SVG -->
         <a class="header__logo" href="#">
            <svg class="icon-logo-dark">
                  <use xlink:href="assets/icon-logo-dark.svg#icon-logo-dark"></use>
            </svg>
         </a>
         <div class=header__slogan>Web Trading Platform</div>
      </div>
      <div class="header__mobile-menu sf-hidden"></div>
      <div class=header__banner>
         <img class=header__banner-bg src="assets/banner.png" alt="Banner bg">

         <a class=header__banner-container href="#">
            <img class=header__banner-icon src="assets/rocket.png" alt="Banner icon">
            <span>Get a 30% bonus on your first deposit</span>
            <div class=header__banner-percents>30%</div>
         </a>
      </div>

      <div class="trading-chart__mobile-select sf-hidden">
         <svg class="icon-caret trading-chart__mobile-select__caret">
            <symbol fill=none id=icon-caret viewBox="0 0 9 6">
               <path d="M1.08341 0.679043C0.83589 0.440319 0.443217 0.440319 0.195695 0.679043C-0.0690109 0.93434 -0.063765 1.35935 0.20285 1.60115L4.05975 5.32096C4.18042 5.43734 4.34284 5.5 4.5036 5.5C4.6698 5.5 4.82584 5.43826 4.94746 5.32096L8.80436 1.60115C9.06521 1.34957 9.06521 0.930626 8.80436 0.679043C8.55684 0.440319 8.16416 0.440319 7.91664 0.679043L4.49668 3.97745L1.08341 0.679043Z" fill=currentColor></path>
            </symbol>
            <use xlink:href=#icon-caret></use>
         </svg>
      </div>
      <div class="trading-chart__mobile__payout sf-hidden">Your payout: </div>
      <div class="header-notifications header-notifications-mobile sf-hidden"></div>
      <div class="usermenu usermenu-mobile sf-hidden"></div>
      <div class="header__container">
         <div class="header-notifications">
            <div class="header-notifications__button">
               <svg class="icon-notification header-notifications__icon">
                  <use xlink:href="icons-header.svg#icon-notification"></use>
               </svg>
            </div>
         </div>
         <div class="usermenu">
            <div class="usermenu__info">
               <div class="usermenu__info-levels">
                  <svg class="icon-profile-level-standart">
                     <use xlink:href="icons-header.svg#icon-profile-level-standart"></use>
                  </svg>
               </div>
               <div class="usermenu__info-wrapper"></div>
               <div class="usermenu__info-text">
                  <div class="usermenu__info-name">Demo Account</div>
                  <div class="usermenu__info-balance">$10,000.00</div>
               </div>
               <div class="usermenu__info-caret">
                  <svg class="icon-caret">
                     <use xlink:href="icons-header.svg#icon-caret"></use>
                  </svg>
               </div>
            </div>
         </div>
         <div class="header__sidebar">
            <a class="button button--success button--small header__sidebar-button deposit" href="#">
               <div class="button__icon">
                  <svg class="icon-plus">
                     <use xlink:href="icons-header.svg#icon-plus"></use>
                  </svg>
               </div>
               <span>Deposit</span>
            </a>
            <a class="button button--small header__sidebar-button hide-md-down" href="#">Withdrawal</a>
         </div>
      </div>
   </header>
   <main class=page__body>
      <div class=page__content>
         <div class="trading-chart trading-chart--fade-in">
            <div class=trading-chart__wrapper>
               <div class=chart>
                  <div class="trading-chart__button-arrow">
                     <svg class=icon-arrow-right>
                        <symbol id=icon-arrow-right viewBox="0 0 20 20">
                           <path d="M10.458 6.00259L10.1304 6.33015C10.0274 6.433 9.97041 6.57048 9.97041 6.71682C9.97041 6.86332 10.0274 7.01324 10.1304 7.11609L12.2356 9.23389H5.54724C5.24561 9.23389 5 9.45405 5 9.7556V10.2191C5 10.5206 5.24561 10.7964 5.54724 10.7964H12.2594L10.1304 12.91C10.0274 13.013 9.97041 13.1426 9.97041 13.2891C9.97041 13.4354 10.0274 13.5691 10.1304 13.672L10.458 13.9978C10.6713 14.211 11.0182 14.2101 11.2315 13.9969L14.8403 10.3876C14.9431 10.2849 15 10.147 15 9.99942V9.99788C15 9.85145 14.9431 9.71389 14.8403 9.61113L11.2315 6.00259C11.0184 5.78926 10.6713 5.78926 10.458 6.00259Z"></path>
                        </symbol>
                        <use xlink:href=#icon-arrow-right></use>
                     </svg>
                  </div>
                  <!-- Charts -->
                  <!-- Updated HTML structure -->
                  <div class="chart-container" id="currency-chart" style="cursor: default; position: relative; width: 100%; height: 80vh;">
                     <!-- TradingView Widget Integration -->
                     <!-- TradingView Widget BEGIN -->
                     <div class="tradingview-widget-container" style="height:100%;width:100%">
                        <div class="tradingview-widget-container__widget" style="height:calc(100% - 10px);width:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                        {
                        "autosize": true,
                        "symbol": "CRYPTOCAP:USDT",
                        "interval": "1",
                        "timezone": "Etc/UTC",
                        "theme": "dark",
                        "style": "1",
                        "locale": "en",
                        "allow_symbol_change": true,
                        "calendar": false,
                        "hide_volume": true,
                        "support_host": "https://www.tradingview.com"
                     }
                        </script>
                     </div>
                     <!-- TradingView Widget END -->
                  </div>
               </div>
            </div>
            <div class="trading-chart__top">
               <div class="trading-chart__assets">
                  <div class="asset-select">
                     <button id="toggleDropdownButton" class="asset-select__button">
                        <svg class="icon-plus"><use xlink:href="assets/spritemap.svg#icon-plus"></use></svg>
                     </button>
                     <div id="dropdownContent" class="asset-select__dropdown hidden" style="left: 0px;">
                        
                     <div dir="auto" class="asset-select__dropdown-title">Select trade pair
                        <div>
                           <svg class="icon-close">
                              <use xlink:href="assets/spritemap.svg#icon-close"></use>
                           </svg>
                        </div>
                     </div>
                     <div dir="auto" class="asset-select__search-filters active">
                        <button class="asset-select__search-filter active">Currencies</button>
                        <button class="asset-select__search-filter ">Crypto</button>
                        <button class="asset-select__search-filter ">Commodities</button>
                        <button class="asset-select__search-filter ">Stocks</button>
                     </div>
                     <div dir="" class="asset-select__block">
                        <div class="asset-select__favorit  ">
                           <svg class="icon-favorite-filled">
                              <use xlink:href="assets/spritemap.svg#icon-favorite-filled"></use>
                           </svg>
                           <div>0</div>
                        </div>
                        <div class="asset-select__search">
                           <div class="asset-select__search-button">
                              <svg class="icon-search">
                                 <use xlink:href="assets/spritemap.svg#icon-search"></use>
                              </svg>
                           </div>
                           <input type="text" class="asset-select__search-input" placeholder="Search">
                        </div>
                     </div>
                     <div class="asset-select__content-wrapper">
                        <div class="asset-select__content">
                            <div class="assets-table">
                                <div class="assets-table__header">
                                    <div class="assets-table__header-item" dir="">
                                        <a>Name</a>
                                    </div>
                                    <div class="assets-table__header-item mobile-none" dir="">
                                        <a>24h changing</a>
                                    </div>
                                    <div class="assets-table__header-item">
                                        <a>Profit 1+ min</a>
                                        <svg class="icon-sort-mark">
                                            <use xlink:href="assets/spritemap.svg#icon-sort-mark"></use>
                                        </svg>
                                    </div>
                                    <div class="assets-table__header-item">
                                        <a>5+ min</a>
                                    </div>
                                </div>
                                
                                <div class="assets-table__item">
                                    <div class="assets-table__favorit">
                                        <svg class="icon-favorite">
                                            <use xlink:href="assets/spritemap.svg#icon-favorite"></use>
                                        </svg>
                                    </div>
                                    <div class="assets-table__name">
                                        <div class="flags assets-table__flags flags">
                                            <svg class="flag-aud">
                                                <use xlink:href="assets/flags.svg#flag-aud"></use>
                                            </svg>
                                            <svg class="flag-usd">
                                                <use xlink:href="assets/flags.svg#flag-usd"></use>
                                            </svg>
                                        </div>
                                        <span>AUD/USD (OTC)</span>
                                    </div>
                                    <div class="assets-table__change assets-table__change--down">
                                        <svg class="icon-arrow-down">
                                            <use xlink:href="assets/spritemap.svg#icon-arrow-down"></use>
                                        </svg>
                                        <span>-1.49%</span>
                                    </div>
                                    <div class="assets-table__percent payoutOne text-center">
                                        <span>93%</span>
                                    </div>
                                    <div class="assets-table__percent payoutTwo">
                                        <span>93%</span>
                                    </div>
                                </div>
                    
                                <div class="assets-table__item">
                                    <div class="assets-table__favorit">
                                        <svg class="icon-favorite">
                                            <use xlink:href="assets/spritemap.svg#icon-favorite"></use>
                                        </svg>
                                    </div>
                                    <div class="assets-table__name">
                                        <div class="flags assets-table__flags flags">
                                            <svg class="flag-brl">
                                                <use xlink:href="assets/flags.svg#flag-brl"></use>
                                            </svg>
                                            <svg class="flag-usd">
                                                <use xlink:href="assets/flags.svg#flag-usd"></use>
                                            </svg>
                                        </div>
                                        <span>USD/BRL (OTC)</span>
                                    </div>
                                    <div class="assets-table__change assets-table__change--up">
                                        <svg class="icon-arrow-up">
                                            <use xlink:href="assets/spritemap.svg#icon-arrow-up"></use>
                                        </svg>
                                        <span>0.06%</span>
                                    </div>
                                    <div class="assets-table__percent payoutOne text-center">
                                        <span>93%</span>
                                    </div>
                                    <div class="assets-table__percent payoutTwo">
                                        <span>93%</span>
                                    </div>
                                </div>
                    
                                <div class="assets-table__item">
                                    <div class="assets-table__favorit">
                                        <svg class="icon-favorite">
                                            <use xlink:href="assets/spritemap.svg#icon-favorite"></use>
                                        </svg>
                                    </div>
                                    <div class="assets-table__name">
                                        <div class="flags assets-table__flags flags">
                                            <svg class="flag-eur">
                                                <use xlink:href="assets/flags.svg#flag-eur"></use>
                                            </svg>
                                            <svg class="flag-gbp">
                                                <use xlink:href="assets/flags.svg#flag-gbp"></use>
                                            </svg>
                                        </div>
                                        <span>EUR/GBP (OTC)</span>
                                    </div>
                                    <div class="assets-table__change assets-table__change--up">
                                        <svg class="icon-arrow-up">
                                            <use xlink:href="assets/spritemap.svg#icon-arrow-up"></use>
                                        </svg>
                                        <span>0.8%</span>
                                    </div>
                                    <div class="assets-table__percent payoutOne text-center">
                                        <span>93%</span>
                                    </div>
                                    <div class="assets-table__percent payoutTwo">
                                        <span>93%</span>
                                    </div>
                                </div>
                    
                                <div class="assets-table__item">
                                    <div class="assets-table__favorit">
                                        <svg class="icon-favorite">
                                            <use xlink:href="assets/spritemap.svg#icon-favorite"></use>
                                        </svg>
                                    </div>
                                    <div class="assets-table__name">
                                        <div class="flags assets-table__flags flags">
                                            <svg class="flag-gbp">
                                                <use xlink:href="assets/flags.svg#flag-gbp"></use>
                                            </svg>
                                            <svg class="flag-aud">
                                                <use xlink:href="assets/flags.svg#flag-aud"></use>
                                            </svg>
                                        </div>
                                        <span>GBP/AUD (OTC)</span>
                                    </div>
                                    <div class="assets-table__change assets-table__change--up">
                                        <svg class="icon-arrow-up">
                                            <use xlink:href="assets/spritemap.svg#icon-arrow-up"></use>
                                        </svg>
                                        <span>0.31%</span>
                                    </div>
                                    <div class="assets-table__percent payoutOne text-center">
                                        <span>93%</span>
                                    </div>
                                    <div class="assets-table__percent payoutTwo">
                                        <span>93%</span>
                                    </div>
                                </div>
                    
                                <div class="assets-table__item">
                                    <div class="assets-table__favorit">
                                        <svg class="icon-favorite">
                                            <use xlink:href="assets/spritemap.svg#icon-favorite"></use>
                                        </svg>
                                    </div>
                                    <div class="assets-table__name">
                                        <div class="flags assets-table__flags flags">
                                            <svg class="flag-usd">
                                                <use xlink:href="assets/flags.svg#flag-usd"></use>
                                            </svg>
                                            <svg class="flag-bdt">
                                                <use xlink:href="assets/flags.svg#flag-bdt"></use>
                                            </svg>
                                        </div>
                                        <span>USD/BDT (OTC)</span>
                                    </div>
                                    <div class="assets-table__change assets-table__change--down">
                                        <svg class="icon-arrow-down">
                                            <use xlink:href="assets/spritemap.svg#icon-arrow-down"></use>
                                        </svg>
                                        <span>-0.16%</span>
                                    </div>
                                    <div class="assets-table__percent payoutOne text-center">
                                        <span>93%</span>
                                    </div>
                                    <div class="assets-table__percent payoutTwo">
                                        <span>93%</span>
                                    </div>
                                </div>
                    
                                <div class="assets-table__item">
                                    <div class="assets-table__favorit">
                                        <svg class="icon-favorite">
                                            <use xlink:href="assets/spritemap.svg#icon-favorite"></use>
                                        </svg>
                                    </div>
                                    <div class="assets-table__name">
                                        <div class="flags assets-table__flags flags">
                                            <svg class="flag-usd">
                                                <use xlink:href="assets/flags.svg#flag-usd"></use>
                                            </svg>
                                            <svg class="flag-dzd">
                                                <use xlink:href="assets/flags.svg#flag-dzd"></use>
                                            </svg>
                                        </div>
                                        <span>USD/DZD (OTC)</span>
                                    </div>
                                    <div class="assets-table__change assets-table__change--up">
                                        <svg class="icon-arrow-up">
                                            <use xlink:href="assets/spritemap.svg#icon-arrow-up"></use>
                                        </svg>
                                        <span>0%</span>
                                    </div>
                                    <div class="assets-table__percent payoutOne text-center">
                                        <span>93%</span>
                                    </div>
                                    <div class="assets-table__percent payoutTwo">
                                        <span>93%</span>
                                    </div>
                                </div>
                    
                                <!-- Add more asset items following the same structure above -->
                    
                                <div class="assets-table__item">
                                    <div class="assets-table__favorit">
                                        <svg class="icon-favorite">
                                            <use xlink:href="assets/spritemap.svg#icon-favorite"></use>
                                        </svg>
                                    </div>
                                    <div class="assets-table__name">
                                        <div class="flags assets-table__flags flags">
                                            <svg class="flag-eur">
                                                <use xlink:href="assets/flags.svg#flag-eur"></use>
                                            </svg>
                                            <svg class="flag-aud">
                                                <use xlink:href="assets/flags.svg#flag-aud"></use>
                                            </svg>
                                        </div>
                                        <span>EUR/AUD (OTC)</span>
                                    </div>
                                    <div class="assets-table__change assets-table__change--up">
                                        <svg class="icon-arrow-up">
                                            <use xlink:href="assets/spritemap.svg#icon-arrow-up"></use>
                                        </svg>
                                        <span>1.89%</span>
                                    </div>
                                    <div class="assets-table__percent payoutOne text-center">
                                        <span>81%</span>
                                    </div>
                                    <div class="assets-table__percent payoutTwo">
                                        <span>80%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
         </div>
                     
                  <div class="tabs">
                     <!-- <div class="tabs__items">
                           <div class="tab desktop" id="CHF/JPY" style="left: 0px; z-index: 0;">
                              <div class="tab__container">
                                 <div class="tab__flags">
                                       <svg class="tab__flag flag-chf">
                                          <use xlink:href="#flag-chf"></use>
                                       </svg>
                                       <svg class="tab__flag flag-jpy">
                                          <use xlink:href="#flag-jpy"></use>
                                       </svg>
                                 </div>
                                 <div class="tab__block">
                                       <div class="tab__block-label">
                                          <div class="tab__label">CHF/JPY</div>
                                       </div>
                                       <div class="tab__block-payout">
                                          <div class="tab__payout">20%</div>
                                       </div>
                                 </div>
                              </div>
                              <div class="tab__close sf-hidden">
                                 <svg class="icon-close-tiny">
                                       <use xlink:href="#icon-close-tiny"></use>
                                 </svg>
                              </div>
                              <div class="tab__pin sf-hidden">
                                 <svg class="icon-pin">
                                       <use xlink:href="#icon-pin"></use>
                                 </svg>
                              </div>
                           </div>
                           
                           <div class="tab desktop active" id="tab-active" style="left: 148px; z-index: 1;">
                              <div class="tab__container">
                                 <div class="tab__flags">
                                       <svg class="tab__flag flag-chf">
                                          <use xlink:href="#flag-chf"></use>
                                       </svg>
                                       <svg class="tab__flag flag-jpy">
                                          <use xlink:href="#flag-jpy"></use>
                                       </svg>
                                 </div>
                                 <div class="tab__block">
                                       <div class="tab__block-label">
                                          <div class="tab__label">CHF/JPY (OTC)</div>
                                          <div class="tab__label-caret">
                                             <svg class="icon-caret">
                                                   <use xlink:href="#icon-caret"></use>
                                             </svg>
                                          </div>
                                       </div>
                                       <div class="tab__block-payout">
                                          <div class="tab__payout">80%</div>
                                       </div>
                                 </div>
                              </div>
                              <div class="tab__close">
                                 <svg class="icon-close-tiny">
                                       <use xlink:href="#icon-close-tiny"></use>
                                 </svg>
                              </div>
                              <div class="tab__pin sf-hidden">
                                 <svg class="icon-pin">
                                       <use xlink:href="#icon-pin"></use>
                                 </svg>
                              </div>
                           </div>
                     </div> -->
                  </div>
               </div>

               <div class="trading-chart__server-time">
                  <div class="server-time online">00:38:06 <span>UTC+6</span></div>
               </div>

               <div class="pair-information">
                  <svg class="icon-pair-information">
                     <use xlink:href="#icon-pair-information"></use>
                  </svg>
                  <div class="pair-information__text">Pair Information</div>
               </div>
            </div>

            <svg style="display: none;">
               <!-- Define SVG symbols here -->
               <symbol id="icon-plus" viewBox="0 0 12 12">
                  <path d="M4.84615 0H7.15385V4.84615H12V7.15385H7.15385V12H4.84615V7.15385H0V4.84615H4.84615V0Z" fill="white"></path>
               </symbol>
               <symbol id="flag-chf" viewBox="0 0 512 512">
                  <circle cx="256" cy="256" r="256" fill="#d80027"></circle>
                  <path d="M389.6 211.5h-89v-89h-89.1v89h-89v89h89v89h89v-89h89z" fill="#eee"></path>
               </symbol>
               <symbol id="flag-jpy" viewBox="0 0 512 512">
                  <circle cx="256" cy="256" r="256" fill="#eee"></circle>
                  <circle cx="256" cy="256" r="111.3" fill="#d80027"></circle>
               </symbol>
               <symbol id="icon-close-tiny" viewBox="0 0 6 6">
                  <path d="M0.181221 0.231785C0.422849 -0.00855682 0.814606 -0.00855664 1.05623 0.231785L5.79908 4.94939C6.04071 5.18973 6.04071 5.5794 5.79908 5.81974C5.55745 6.06009 5.1657 6.06009 4.92407 5.81974L0.181221 1.10214C-0.0604062 0.8618 -0.0604079 0.472128 0.181221 0.231785Z" fill="currentColor"></path>
                  <path d="M0.200989 5.76821C-0.0406389 5.52787 -0.0406388 5.1382 0.200989 4.89786L4.94384 0.180257C5.18546 -0.0600847 5.57722 -0.0600864 5.81885 0.180256C6.06048 0.420599 6.06048 0.81027 5.81885 1.05061L1.076 5.76821C0.834375 6.00856 0.442618 6.00856 0.200989 5.76821Z" fill="currentColor"></path>
               </symbol>
               <symbol id="icon-pin" viewBox="0 0 8 8">
                  <path d="M7.83505 2.86393L5.04669 0.07557C4.94603 -0.02519 4.78259 -0.02519 4.68193 0.07557L4.67011 0.0873846C4.49914 0.25831 4.40493 0.485678 4.40493 0.72744C4.40493 0.883198 4.4445 1.03266 4.51802 1.1652L2.60046 2.66914C2.37717 2.46958 2.09217 2.36036 1.79031 2.36036C1.46502 2.36036 1.15923 2.48702 0.929281 2.71702L0.911792 2.73451C0.811032 2.83522 0.811032 2.99856 0.911792 3.09927L2.58225 4.76973L0.955335 6.39659C0.922781 6.43007 0.955335 6.39659 0.646431 6.85511C0.1643 7.45632 0.068957 7.56647 0.0640041 7.57214C-0.0255087 7.67409 -0.0205558 7.82784 0.0752513 7.92411C0.125451 7.97451 0.191644 8 0.258043 8C0.318561 8 0.379234 7.97885 0.42804 7.93618C0.432322 7.93247 0.539944 7.83893 1.14507 7.35375C1.60607 7.04222 1.57001 7.07735 1.60607 7.04222L3.23036 5.41793L4.81135 6.99893C4.86171 7.04934 4.92775 7.07451 4.99373 7.07451C5.05972 7.07451 5.12581 7.04934 5.17611 6.99893L5.1936 6.98144C5.4236 6.75149 5.55026 6.44566 5.55026 6.12042C5.55026 5.81855 5.44099 5.53355 5.24148 5.31026L6.74542 3.3927C6.87796 3.46622 7.02742 3.5058 7.18318 3.5058C7.42499 3.5058 7.65231 3.41164 7.82324 3.24061L7.83505 3.2288C7.93581 3.12798 7.93581 2.96464 7.83505 2.86393Z"></path>
               </symbol>
               <symbol id="icon-caret" viewBox="0 0 9 6">
                  <path d="M1.08341 0.679043C0.83589 0.440319 0.443217 0.440319 0.195695 0.679043C-0.0690109 0.93434 -0.063765 1.35935 0.20285 1.60115L4.05975 5.32096C4.18042 5.43734 4.34284 5.5 4.5036 5.5C4.6698 5.5 4.82584 5.43826 4.94746 5.32096L8.80436 1.60115C9.06521 1.34957 9.06521 0.930626 8.80436 0.679043C8.55684 0.440319 8.16416 0.440319 7.91664 0.679043L4.49668 3.97745L1.08341 0.679043Z" fill="currentColor"></path>
               </symbol>
               <symbol id="icon-pair-information" viewBox="0 0 16 16">
                  <circle cx="8" cy="8" r="8" fill="#026FD3"></circle>
                  <g clip-path="url(#clip0)">
                     <path d="M7.99331 6.44446C7.42876 6.44446 7.02734 6.69285 7.02734 7.05886V12.0392C7.02734 12.3529 7.4288 12.6667 7.99331 12.6667C8.53273 12.6667 8.97179 12.3529 8.97179 12.0392V7.05886C8.97179 6.69285 8.53273 6.44446 7.99331 6.44446Z" fill="white"></path>
                     <path d="M8.00552 3.33337C7.45679 3.33337 7.02734 3.78209 7.02734 4.29879C7.02734 4.81549 7.45679 5.27782 8.00552 5.27782C8.54234 5.27782 8.97179 4.81549 8.97179 4.29879C8.97179 3.78214 8.5423 3.33337 8.00552 3.33337Z" fill="white"></path>
                  </g>
               </symbol>
            </svg>
            <div class="trading-chart__left">
               <div class="market-depth-vertical">
                  <div class="market-depth-vertical__ask-value">3%</div>
                  <div class="market-depth-vertical__ask" style="height: 3%;"></div>
                  
                  <div class="market-depth-vertical__bid-value">97%</div>
                  <div class="market-depth-vertical__bid" style="height: 97%;"></div>
               </div>
            </div>

            <div class="trading-chart__button-zoom" style="bottom: 20px;">
               <div class="trading-chart__button-zoom__icon">
                  <svg class="icon-minus-zoom">
                     <symbol fill="none" id="icon-minus-zoom" viewBox="0 0 12 12">
                           <path d="M7.15385 4.8457H12V7.1534H7.15385H4.84615H0V4.8457H4.84615H7.15385Z" fill="currentColor"></path>
                     </symbol>
                     <use xlink:href="#icon-minus-zoom"></use>
                  </svg>
               </div>
               <div class="trading-chart__button-zoom__icon">
                  <svg class="icon-plus-zoom">
                     <symbol fill="none" id="icon-plus-zoom" viewBox="0 0 12 12">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M4.84615 0H7.15385V4.84615H12V7.15385H7.15385V12H4.84615V7.15385H0V4.84615H4.84615V0Z" fill="currentColor"></path>
                     </symbol>
                     <use xlink:href="#icon-plus-zoom"></use>
                  </svg>
               </div>
            </div>
            <div class="trading-chart-settings" style="bottom: 30px;">
               <div class="trading-chart-settings__toggle sf-hidden">
                  <svg class="icon-ellipsis trading-chart-settings__item-icon">
                     <use href="assets/icons_2.svg#icon-ellipsis" xlink:href="assets/icons_2.svg#icon-ellipsis"></use>
                  </svg>
               </div>
               <div class="trading-chart-settings__item">
                  <svg class="icon-pencil trading-chart-settings__item-icon">
                     <use href="assets/icons_2.svg#icon-pencil" xlink:href="assets/icons_2.svg#icon-pencil"></use>
                  </svg>
               </div>
               <div class="trading-chart-settings__item">1m</div>
               <div class="trading-chart-settings__item">
                  <svg class="icon-chart-type-ha trading-chart-settings__item-icon">
                     <use href="assets/icons_2.svg#icon-chart-type-ha" xlink:href="assets/icons_2.svg#icon-chart-type-ha"></use>
                  </svg>
               </div>
               <div class="trading-chart-settings__item">
                  <svg class="icon-chart-ruler trading-chart-settings__item-icon">
                     <use href="assets/icons_2.svg#icon-chart-ruler" xlink:href="assets/icons_2.svg#icon-chart-ruler"></use>
                  </svg>
               </div>
            </div>
            <div class="trading-chart-settings-mobile-horizontal sf-hidden"></div>
         </div>
      </div>
      <div class="page__sidebar">
         <div class="sidebar-section sidebar-section--dark sidebar-section--large">
            <div class="section-deal">
               <div class="section-deal__header">
                  <div class="flags section-deal__flags">
                     <svg class="flag-chf">
                        <use href="assets/icons_3.svg#flag-chf"></use>
                     </svg>
                     <svg class="flag-jpy">
                        <use href="assets/icons_3.svg#flag-jpy"></use>
                     </svg>
                  </div>
                  <div class="section-deal__name">CHF/JPY (OTC)</div>
                  <div class="section-deal__percent">80%</div>
               </div>
               <div class="trading-chart__mobile-select section-deal__mobile-select sf-hidden">
                  <svg class="icon-caret trading-chart__mobile-select__caret">
                     <use href="assets/icons_3.svg#icon-caret"></use>
                  </svg>
               </div>
               <div class="trading-chart__mobile__payout sf-hidden">Your payout: </div>
               <div class="section-deal__pending">
                  <svg class="icon-time-setting section-deal__pending-time">
                     <use href="assets/icons_3.svg#icon-time-setting"></use>
                  </svg>
                  <div>pending trade</div>
                  <div class="input-control input-control--toggle">
                     <input id="pending-checkbox" class="input-control__checkbox sf-hidden" type="checkbox" value="on">
                     <span class="input-control__label section-deal__pending-label"></span>
                  </div>
               </div>
               <div class="section-deal__form">
                  <div class="section-deal__time section-deal__input-black">
                     <label class="input-control input-control--time input-control--dark section-deal__input-control" for="time-388994428491">
                        <span class="input-control__label" dir="auto">Time</span>
                        <span class="input-control__label__switch">Switch time</span>
                        <button class="input-control__button">-</button>
                        <input id="time-388994428491" type="text" placeholder="00:00:30" disabled class="input-control__input opacity" value="00:01:00">
                        <button class="input-control__button">+</button>
                        <div class="input-control__dropdown">
                           <!-- Dropdown options -->
                           <div class="input-control__dropdown-option">00:05</div>
                           <div class="input-control__dropdown-option">00:10</div>
                           <!-- Add other options as needed -->
                        </div>
                     </label>
                     <div class="mobile-time-input sf-hidden"></div>
                  </div>
                  <div class="section-deal__investment section-deal__input-black">
                     <div class="input-control-wrapper section-deal--black">
                        <div class="input-control input-control--number input-control--dark input-control--text-left">
                           <span class="input-control__label">Investment</span>
                           <button class="input-control__button" disabled>-</button>
                           <input type="text" class="input-control__input" value="1 $">
                           <button class="input-control__button">+</button>
                           <span class="input-control__label__switch">Switch</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="section-deal__put">
                  <div class="section-deal__success percent">
                     <button class="button button--success button--spaced call-btn section-deal__button">
                        <span>Up</span>
                        <svg class="icon-arrow-up-circle">
                           <use href="assets/icons_3.svg#icon-arrow-up-circle"></use>
                        </svg>
                     </button>
                  </div>
                  <div class="section-deal__payout" dir="auto">
                     <div>Your payout: </div>
                     <b>1.80 $</b>
                     <div class="section-deal__percent sf-hidden">80%</div>
                  </div>
                  <div class="section-deal__mobile-payout sf-hidden">Payout: </div>
                  <div class="section-deal__danger">
                     <button class="button button--danger button--spaced put-btn section-deal__button">
                        <span>Down</span>
                        <svg class="icon-arrow-down-circle">
                           <use href="assets/icons_3.svg#icon-arrow-down-circle"></use>
                        </svg>
                     </button>
                  </div>
               </div>
               <div class="switch-tooltip sf-hidden" style="top:816px;right:505px">Opening deals by time is currently available only for OTC trading.</div>
            </div>
         </div>
         <div class="deal-list active">
            <div class="deal-list__tabs">
               <div class="deal-list__tab active">
                  <div>Trades</div>
                  <div class="deal-list__tab-count">0</div>
               </div>
               <div class="deal-list__tab">
                  <svg class="icon-deal-list-orders">
                     <use href="assets/icons_3.svg#icon-deal-list-orders"></use>
                  </svg>
                  <div class="deal-list__tab-count">0</div>
               </div>
            </div>
            <div class="deal-list__items active">
               <div class="trades__placeholder">
                  <svg class="icon-trades-empty">
                     <use href="assets/icons_3.svg#icon-trades-empty"></use>
                  </svg>
                  <p>You don't have a trade history yet. You can open a trade using the form above.</p>
               </div>
            </div>
            <div class="deal-list__toggle active">
               <svg class="icon-arrow-triangle-small-up">
                  <use href="assets/icons_3.svg#icon-arrow-triangle-small-up"></use>
               </svg>
            </div>
         </div>
      </div>
   </main>
 </div>
 <div class=app__backdrop></div>
</div>
</div>

 </body>
 
 </html>