<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item {{ request()->is('dashboard/*') ? 'active' : '' }}" >
                <a class="nav-item-hold" href="/home">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ request()->is('prodManagement/*') ? 'active' : '' }}" data-item="prodManagement">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Library"></i>
                    <span class="nav-text">Product Management</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ request()->is('supplier/*') ? 'active' : '' }}" data-item="supplier">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Suitcase"></i>
                    <span class="nav-text">Supplier Product Lists</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ request()->is('apps/*') ? 'active' : '' }}">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Computer-Secure"></i>
                    <span class="nav-text">Price Management</span>
                </a>
                <div class="triangle"></div>
            </li>
            
        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Dashboards -->
        
        <ul class="childNav" data-parent="prodManagement">

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='uploaddata' ? 'open' : '' }}" href="{{url('uploaddata')}}">
                    <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                    <span class="item-name">Add New Product(s)</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='map_supplier_with_csv' ? 'open' : '' }}"
                    href="{{ url('map_supplier_with_csv') }}">
                    <i class="nav-icon i-Split-Vertical"></i>
                    <span class="item-name">Map Supplier with Csv file</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='basic-action-bar' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                    <span class="item-name">Import Product Updates</span>
                </a>
            </li>
            

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='multi-column-forms' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Split-Vertical"></i>
                    <span class="item-name">Manage New Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='form-input-group' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Cost/Price Update</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='form-validation' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Close-Window"></i>
                    <span class="item-name">Edit Product</span>
                </a>
            </li>
            
        </ul>
        <ul class="childNav" data-parent="supplier">
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='dotproductlist' ? 'open' : '' }}" href="{{route('dotproductlist')}}">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">DOT</span>
                </a>
            </li>
            <li class="nav-item">


                <a class="{{ Route::currentRouteName()=='dryerproductlist' ? 'open' : '' }}"
                    href="{{route('dryerproductlist')}}">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Dryers</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='harsheyproductlist' ? 'open' : '' }}" href="{{route('harsheyproductlist')}}">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Hershey</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='keheproductlist' ? 'open' : '' }}" href="{{route('keheproductlist')}}">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">KEHE</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='marsproductlist' ? 'open' : '' }}"
                    href="{{route('marsproductlist')}}">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">MARS</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='nestleproductlist' ? 'open' : '' }}"
                    href="{{route('nestleproductlist')}}">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Nestley</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='miscproductlist' ? 'open' : '' }}"
                    href="{{route('miscproductlist')}}">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Miscellaneous</span>
                </a>
            </li>

        </ul>

        
    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->