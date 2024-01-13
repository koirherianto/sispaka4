{{-- <!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li> --}}

{{-- <li>
    <a href={{ route('homex') }}>
        <i class="bx bx-calendar-event icon nav-icon"></i>
        <span class="menu-item" data-key="t-calendar">Home</span>
    </a>
</li>


<li class="menu-title" data-key="t-menu">Dashboard</li>

<li>
    <a href="javascript: void(0);">
        <i class="bx bx-home-alt icon nav-icon"></i>
        <span class="menu-item" data-key="t-dashboard">Dashboard</span>
        <span class="badge rounded-pill bg-primary">2</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="/" data-key="t-ecommerce">Ecommerce</a></li>
        <li><a href="dashboard-sales" data-key="t-sales">Sales</a></li>
    </ul>
</li>

<li class="menu-title" data-key="t-applications">Applications</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i class="bx bx-envelope icon nav-icon"></i>
        <span class="menu-item" data-key="t-email">Email</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="email-inbox" data-key="t-inbox">Inbox</a></li>
        <li><a href="email-read" data-key="t-read-email">Read Email</a></li>
    </ul>
</li>

<li>
    <a href="apps-calendar">
        <i class="bx bx-calendar-event icon nav-icon"></i>
        <span class="menu-item" data-key="t-calendar">Calendar</span>
    </a>
</li>

<li>
    <a href="apps-todo">
        <i class="bx bx-check-square icon nav-icon"></i>
        <span class="menu-item" data-key="t-todo">Todo</span>
        <span class="badge rounded-pill bg-success" data-key="t-new">New</span>
    </a>
</li>

<li>
    <a href="apps-file-manager">
        <i class="bx bx-file-find icon nav-icon"></i>
        <span class="menu-item" data-key="t-filemanager">File Manager</span>
    </a>
</li>

<li>
    <a href="apps-chat">
        <i class="bx bx-chat icon nav-icon"></i>
        <span class="menu-item" data-key="t-chat">Chat</span>
        <span class="badge rounded-pill bg-danger" data-key="t-hot">Hot</span>
    </a>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i class="bx bx-store icon nav-icon"></i>
        <span class="menu-item" data-key="t-ecommerce">Ecommerce</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="ecommerce-products" data-key="t-products">Products</a></li>
        <li><a href="ecommerce-product-detail" data-key="t-product-detail">Product Detail</a></li>
        <li><a href="ecommerce-orders" data-key="t-orders">Orders</a></li>
        <li><a href="ecommerce-customers" data-key="t-customers">Customers</a></li>
        <li><a href="ecommerce-cart" data-key="t-cart">Cart</a></li>
        <li><a href="ecommerce-checkout" data-key="t-checkout">Checkout</a></li>
        <li><a href="ecommerce-shops" data-key="t-shops">Shops</a></li>
        <li><a href="ecommerce-add-product" data-key="t-add-product">Add Product</a></li>
    </ul>
</li>



<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i class="bx bx-receipt icon nav-icon"></i>
        <span class="menu-item" data-key="t-invoices">Invoices</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="invoices-list" data-key="t-invoice-list">Invoice List</a></li>
        <li><a href="invoices-detail" data-key="t-invoice-detail">Invoice Detail</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i class="bx bx-user-circle icon nav-icon"></i>
        <span class="menu-item" data-key="t-contacts">Contacts</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="contacts-grid" data-key="t-user-grid">User Grid</a></li>
        <li><a href="contacts-list" data-key="t-user-list">User List</a></li>
        <li><a href="contacts-profile" data-key="t-user-profile">Profile</a></li>
    </ul>
</li>

<li class="menu-title" data-key="t-layouts">Layouts</li>

<li>
    <a href="layouts-horizontal">
        <i class="bx bx-layout icon nav-icon"></i>
        <span class="menu-item" data-key="t-horizontal">Horizontal</span>
    </a>
</li>

<li class="menu-title" data-key="t-components">Components</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i class="bx bx-cube icon nav-icon"></i>
        <span class="menu-item" data-key="t-ui-elements">UI Elements</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="ui-alerts" data-key="t-alerts">Alerts</a></li>
        <li><a href="ui-buttons" data-key="t-buttons">Buttons</a></li>
        <li><a href="ui-cards" data-key="t-cards">Cards</a></li>
        <li><a href="ui-carousel" data-key="t-carousel">Carousel</a></li>
        <li><a href="ui-dropdowns" data-key="t-dropdowns">Dropdowns</a></li>
        <li><a href="ui-grid" data-key="t-grid">Grid</a></li>
        <li><a href="ui-images" data-key="t-images">Images</a></li>
        <li><a href="ui-lightbox" data-key="t-lightbox">Lightbox</a></li>
        <li><a href="ui-modals" data-key="t-modals">Modals</a></li>
        <li><a href="ui-offcanvas" data-key="t-offcanvas">Offcanvas</a></li>
        <li><a href="ui-rangeslider" data-key="t-range-slider">Range Slider</a></li>
        <li><a href="ui-progressbars" data-key="t-progress-bars">Progress Bars</a></li>
        <li><a href="ui-sweet-alert" data-key="t-sweet-alert">Sweet-Alert</a></li>
        <li><a href="ui-tabs-accordions" data-key="t-tabs-accordions">Tabs & Accordions</a></li>
        <li><a href="ui-typography" data-key="t-typography">Typography</a></li>
        <li><a href="ui-video" data-key="t-video">Video</a></li>
        <li><a href="ui-general" data-key="t-general">General</a></li>
        <li><a href="ui-colors" data-key="t-colors">Colors</a></li>
        <li><a href="ui-rating" data-key="t-rating">Rating</a></li>
        <li><a href="ui-notifications" data-key="t-notifications">Notifications</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i class="bx bx-layout icon nav-icon"></i>
        <span class="menu-item" data-key="t-forms">Forms</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="form-elements" data-key="t-form-elements">Form Elements</a></li>
        <li><a href="form-layouts" data-key="t-form-layouts">Form Layouts</a></li>
        <li><a href="form-validation" data-key="t-form-validation">Form Validation</a></li>
        <li><a href="form-advanced" data-key="t-form-advanced">Form Advanced</a></li>
        <li><a href="form-editors" data-key="t-form-editors">Form Editors</a></li>
        <li><a href="form-uploads" data-key="t-form-upload">Form File Upload</a></li>
        <li><a href="form-wizard" data-key="t-form-wizard">Form Wizard</a></li>
        <li><a href="form-mask" data-key="t-form-mask">Form Mask</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i class="bx bx-table icon nav-icon"></i>
        <span class="menu-item" data-key="t-tables">Tables</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="tables-basic" data-key="t-basic-tables">Basic Tables</a></li>
        <li><a href="tables-advanced" data-key="t-advanced-tables">Advance Tables</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i class="bx bx-pie-chart-alt-2 icon nav-icon"></i>
        <span class="menu-item" data-key="t-charts">Charts</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="charts-apex" data-key="t-apex-charts">Apex Charts</a></li>
        <li><a href="charts-chartjs" data-key="t-chartjs-charts">Chartjs Charts</a></li>
        <li><a href="charts-tui" data-key="t-ui-charts">Toast UI Charts</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i class="bx bx-cuboid icon nav-icon"></i>
        <span class="menu-item" data-key="t-icons">Icons</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="icons-evaicons" data-key="t-evaicons">Eva Icons</a></li>
        <li><a href="icons-boxicons" data-key="t-boxicons">Boxicons</a></li>
        <li><a href="icons-materialdesign" data-key="t-material-design">Material Design</a></li>
        <li><a href="icons-fontawesome" data-key="t-font-awesome">Font Awesome 5</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i class="bx bx-map-alt icon nav-icon"></i>
        <span class="menu-item" data-key="t-maps">Maps</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="maps-google" data-key="t-google">Google</a></li>
        <li><a href="maps-vector" data-key="t-vector">Vector</a></li>
        <li><a href="maps-leaflet" data-key="t-leaflet">Leaflet</a></li>
    </ul>
</li>

<li class="menu-title" data-key="t-pages">Pages</li>

<li>
    <a href="javascript: void(0);">
        <i class="bx bx-user-pin icon nav-icon"></i>
        <span class="menu-item" data-key="t-authentication">Authentication</span>
        <span class="badge rounded-pill bg-info">8</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="auth-login" data-key="t-login">Login</a></li>
        <li><a href="auth-register" data-key="t-register">Register</a></li>
        <li><a href="auth-recoverpw" data-key="t-recover-password">Recover Password</a></li>
        <li><a href="auth-lock-screen" data-key="t-lock-screen">Lock Screen</a></li>
        <li><a href="auth-logout" data-key="t-logout">Logout</a></li>
        <li><a href="auth-confirm-mail" data-key="t-confirm-mail">Confirm Mail</a></li>
        <li><a href="auth-email-verification" data-key="t-email-verification">Email Verification</a>
        </li>
        <li><a href="auth-two-step-verification" data-key="t-two-step-verification">Two Step
                Verification</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i class="bx bx-file icon nav-icon"></i>
        <span class="menu-item" data-key="t-utility">Utility</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="pages-starter" data-key="t-starter-page">Starter Page</a></li>
        <li><a href="pages-maintenance" data-key="t-maintenance">Maintenance</a></li>
        <li><a href="pages-comingsoon" data-key="t-coming-soon">Coming Soon</a></li>
        <li><a href="pages-timeline" data-key="t-timeline">Timeline</a></li>
        <li><a href="pages-faqs" data-key="t-faqs">FAQs</a></li>
        <li><a href="pages-pricing" data-key="t-pricing">Pricing</a></li>
        <li><a href="pages-404" data-key="t-error-404">Error 404</a></li>
        <li><a href="pages-500" data-key="t-error-500">Error 500</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i class="bx bx-share-alt icon nav-icon"></i>
        <span class="menu-item" data-key="t-multi-level">Multi Level</span>
    </a>
    <ul class="sub-menu" aria-expanded="true">
        <li class="disabled"><a href="#" data-key="t-disabled-item">Disabled Item</a></li>
        <li><a href="javascript: void(0);" data-key="t-level-1.1">Level 1.1</a></li>
        <li><a href="javascript: void(0);" class="has-arrow" data-key="t-level-1.2">Level 1.2</a>
            <ul class="sub-menu" aria-expanded="true">
                <li><a href="javascript: void(0);" data-key="t-level-2.1">Level 2.1</a></li>
                <li><a href="javascript: void(0);" data-key="t-level-2.2">Level 2.2</a></li>
            </ul>
        </li>
    </ul>
</li> --}}

{{-- can any --}}
@canany(['user.index', 'role.index', 'permission.index','method.index'])
    

<li class="menu-title">Admin</li>

@can('user.index')
<li>
    <a href="{{ route('users.index') }}">
        <i class="bx bx-user icon nav-icon"></i>
        <span class="menu-item">Users</span>
    </a>
</li>
@endcan

@can('role.index')
<li>
    <a href="{{ route('roles.index') }}">
        <i class="bx bx-lock-open-alt icon nav-icon"></i>
        <span class="menu-item">Roles</span>
    </a>
</li>
@endcan

@can('permission.index')
<li>
    <a href="{{ route('permissions.index') }}">
        <i class="bx bx-shield icon nav-icon"></i>
        <span class="menu-item">Permissions</span>
    </a>
</li>
@endcan

@can('method.index')
    <li>
        <a href="{{ route('methods.index') }}">
            <i class="icon nav-icon">
                <svg class="w-[12px] h-[12px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M1 1v18M1 3.652v9c5.6-5.223 8.4 2.49 14-.08v-9c-5.6 2.57-8.4-5.143-14 .08Z"/>
                </svg>
            </i>
            <span class="menu-item">Methods</span>
        </a>
    </li>
@endcan

@endcanany

<li class="menu-title">User</li>

{{-- menu pengaturan --}}
{{-- menu colaborator --}}
{{-- menu contributor --}}

@can('project.index')
    <li>
        <a href="{{ route('projects.index') }}">
            <i class="icon nav-icon">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 14h6m-3 3v-6M1.857 1h4.286c.473 0 .857.384.857.857v4.286A.857.857 0 0 1 6.143 7H1.857A.857.857 0 0 1 1 6.143V1.857C1 1.384 1.384 1 1.857 1Zm10 0h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857h-4.286A.857.857 0 0 1 11 6.143V1.857c0-.473.384-.857.857-.857Zm-10 10h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H1.857A.857.857 0 0 1 1 16.143v-4.286c0-.473.384-.857.857-.857Z"/>
                </svg>
            </i>
            <span class="menu-item">Projects</span>
        </a>
    </li>
@endcan

@if(Auth::user()->session_project != null)
    @can('project.index')
    <li>
        <a href="{{ route('projects.edit', Auth::user()->session_project) }}">
            <i class="icon nav-icon">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M19 11V9a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L12 2.757V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L2.929 4.343a1 1 0 0 0 0 1.414l.536.536L2.757 8H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535L8 17.243V18a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H18a1 1 0 0 0 1-1Z"/>
                    <path d="M10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                </g>
                </svg>
            </i>
            <span class="menu-item">Project Setting</span>
        </a>
    </li>
    @endcan

    @can('contributor.index')
    <li>
        <a href="{{ route('contributors.index') }}">
            <i class="icon nav-icon">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                </svg>
            </i>
            <span class="menu-item">Contributors</span>
            </a>
    </li>
    @endcan
@endif

@if (Auth::user()->sessionProjecthasBackwardChainingMethod())
    <li class="menu-title">Backward Chaining</li>
    @can('backwardChaining.index')
    <li>
        <a href="{{ route('backwardChainings.index') }}">
            <i class="bx bx-home-alt icon nav-icon"></i>
            <span class="menu-item">Backward Chainings</span>
        </a>
    </li>
    @endcan

    @can('bcRuleCode.index')
    <li>
        <a href="{{ route('bcRuleCodes.index') }}">
            <i class="icon nav-icon">
                <svg class="w-[12px] h-[12px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m1.56 6.245 8 3.924a1 1 0 0 0 .88 0l8-3.924a1 1 0 0 0 0-1.8l-8-3.925a1 1 0 0 0-.88 0l-8 3.925a1 1 0 0 0 0 1.8Z"/>
                <path d="M18 8.376a1 1 0 0 0-1 1v.163l-7 3.434-7-3.434v-.163a1 1 0 0 0-2 0v.786a1 1 0 0 0 .56.9l8 3.925a1 1 0 0 0 .88 0l8-3.925a1 1 0 0 0 .56-.9v-.786a1 1 0 0 0-1-1Z"/>
                <path d="M17.993 13.191a1 1 0 0 0-1 1v.163l-7 3.435-7-3.435v-.163a1 1 0 1 0-2 0v.787a1 1 0 0 0 .56.9l8 3.925a1 1 0 0 0 .88 0l8-3.925a1 1 0 0 0 .56-.9v-.787a1 1 0 0 0-1-1Z"/>
                </svg>
            </i>
            <span class="menu-item">Rule Codes</span>
            </a>
    </li>
    @endcan

    @can('bcEvidence.index')
        <li>
            <a href="{{ route('bcEvidences.index') }}">
                <i class="icon nav-icon">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.994 19a8.999 8.999 0 1 1 3.53-17.281M5.995 9l4 4 7-8m-1 8v5m-2.5-2.5h5"/>
                    </svg>  
                </i>
                <span class="menu-item">Evidences / Facts</span>
            </a>
        </li>
    @endcan

    @can('bcGoal.index')
        <li>
            <a href="{{ route('bcGoals.index') }}">
                <i class="icon nav-icon">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.147 15.085a7.159 7.159 0 0 1-6.189 3.307A6.713 6.713 0 0 1 3.1 15.444c-2.679-4.513.287-8.737.888-9.548A4.373 4.373 0 0 0 5 1.608c1.287.953 6.445 3.218 5.537 10.5 1.5-1.122 2.706-3.01 2.853-6.14 1.433 1.049 3.993 5.395 1.757 9.117Z"/>
                    </svg>
                </i>
                <span class="menu-item">Goals / Results</span>
            </a>
        </li>
    @endcan

    @can('bcRule.index')
        <li>
            <a href="{{ route('bcRules.index') }}">
                <i class="icon nav-icon">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 9.376v.786l8 3.925 8-3.925v-.786M1.994 14.191v.786l8 3.925 8-3.925v-.786M10 1.422 2 5.347l8 3.925 8-3.925-8-3.925Z"/>
                    </svg>
                </i>
                <span class="menu-item">Rules</span>
            </a>
        </li>
    @endcan

    @can('bcRule.index')
        <li>
            <a href="{{ route('bcTry.selectGoals') }}">
                <i class="icon nav-icon">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.806 5.614-4.251.362-2.244 2.243a1.058 1.058 0 0 0 .6 1.8l3.036.356m9.439 1.819-.362 4.25-2.243 2.245a1.059 1.059 0 0 1-1.795-.6l-.449-2.983m9.187-12.57a1.536 1.536 0 0 0-1.26-1.26c-1.818-.313-5.52-.7-7.179.96-1.88 1.88-5.863 9.016-7.1 11.275a1.05 1.05 0 0 0 .183 1.25l.932.939.937.936a1.049 1.049 0 0 0 1.25.183c2.259-1.24 9.394-5.222 11.275-7.1 1.66-1.663 1.275-5.365.962-7.183Zm-3.332 4.187a2.115 2.115 0 1 1-4.23 0 2.115 2.115 0 0 1 4.23 0Z"/>
                    </svg>
                </i>
                <span class="menu-item">Try / Experiment</span>
            </a>
        </li>
    @endcan
@endif

<li class="menu-title">Forward Chaining</li>
@can('forwardChaining.index')
<li>
    <a href="{{ route('forwardChainings.index') }}">
        <i class="bx bx-home-alt icon nav-icon"></i>
        <span class="menu-item">Forward Chainings</span>
        </a>
</li>
@endcan


@can('fcGoal.index')
<li>
    <a href="{{ route('fcGoals.index') }}">
        <i class="bx bx-home-alt icon nav-icon"></i>
        <span class="menu-item">Fc Goals</span>
        </a>
</li>
@endcan

@can('fcEvidence.index')
<li>
    <a href="{{ route('fcEvidences.index') }}">
        <i class="bx bx-home-alt icon nav-icon"></i>
        <span class="menu-item">Fc Evidences</span>
        </a>
</li>
@endcan

@can('fcRuleGroup.index')
<li>
    <a href="{{ route('fcRuleGroups.index') }}">
        <i class="bx bx-home-alt icon nav-icon"></i>
        <span class="menu-item">Fc Rule Groups</span>
        </a>
</li>
@endcan
