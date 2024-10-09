@php
    $configData = Helper::appClasses();
@endphp
<style>
    #overlay {
        position: fixed;
        top: 0;
        z-index: 100;
        width: 100%;
        height: 100%;
        display: none;
        background: rgba(0, 0, 0, 0.6);
    }

    .cv-spinner {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .spinner {
        width: 40px;
        height: 40px;
        border: 4px #ddd solid;
        border-top: 4px #2e93e6 solid;
        border-radius: 50%;
        animation: sp-anime 0.8s infinite linear;
    }

    @keyframes sp-anime {
        100% {
            transform: rotate(360deg);
        }
    }

    .is-hide {
        display: none;
    }
</style>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    @if (!isset($navbarFull))
        <div class="app-brand demo">
            <a href="{{ url('/') }}" class="app-brand-link">
                <span class="app-brand-logo demo">
                    @include('_partials.macros', ['height' => 20])
                </span>
                <span class="app-brand-text demo menu-text fw-bold">{{ config('variables.templateName') }}</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
        </div>
    @endif


    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1 ps">

        @if (Auth::user()->role == 'Super Admin')
            <li class="menu-item ">
                <a href="" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-layout"></i>
                    <div>Dashboard</div>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'Super Admin')
            <li class="menu-item ">
                <a href="{{ url('/master') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-menu"></i>
                    <div>Master</div>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'Super Admin')
            <li class="menu-item ">
                <a href="{{ url('/supplyChain') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-menu"></i>
                    <div>Supply Chain</div>
                </a>
            </li>
        @endif
        @if (Auth::user()->role == 'Super Admin')
            <li class="menu-item ">
                <a href="{{ url('/centralWarehouseMaster') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-building-warehouse"></i>
                    <div>Central Warehouse</div>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'Super Admin')
            <li class="menu-item ">
                <a href="{{ url('/orderRequisition') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-building-warehouse"></i>
                    <div>Stock Allocation</div>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'Super Admin')
            <li class="menu-item ">
                <a href="{{ url('/storeInventory') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-building-warehouse"></i>
                    <div>Store Inventory</div>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'Super Admin')
            <li class="menu-item ">
                <a href="{{ url('/customer') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div>Customer</div>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'Super Admin')
            <li class="menu-item ">
                <a href="{{ url('/pos') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-scan"></i>
                    <div>POS</div>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'Super Admin')
            <li class="menu-item ">
                <a href="{{ route('pos-sales-list') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-report-analytics"></i>
                    <div>Sales List</div>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'Super Admin')
            <li class="menu-item ">
                <a href="{{ route('pos-hold') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-hand-stop"></i>
                    <div>Hold</div>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'Super Admin')
            <li class="menu-item ">
                <a href="{{ route('pos-return-bill') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-receipt-refund"></i>
                    <div>Return</div>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'Super Admin')
            <li class="menu-item ">
                <a href="{{ url('/expense') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-exposure"></i>
                    <div>Expenses</div>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'Super Admin')
            <li class="menu-item ">
                <a href="{{ url('/balance')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-coin-rupee"></i>
                    <div>Balance</div>
                </a>
            </li>
        @endif

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 4px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </ul>

</aside>
