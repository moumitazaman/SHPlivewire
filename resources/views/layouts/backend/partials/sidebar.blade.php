<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <div class="image-bx">
                <img src="{{ asset(auth()->user()->image ?? 'assets/images/no_image.png') }}" alt="">
                <a href="{{ route('profile') }}"><i class="fa fa-cog" aria-hidden="true"></i></a>
            </div>
            <h5 class="name">{{ auth()->user()->name }}</h5>
            <p class="email">{{ auth()->user()->email }}</p>
        </div>
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard') }}">Admin</a></li>
                   
                </ul>
            </li>
           <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-044-file"></i>
                    <span class="nav-text">Documents</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('document') }}">List</a></li>
                </ul>
            </li>
            {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-044-file"></i>
                    <span class="nav-text">Expense</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('expense') }}">List</a></li>
                    <li><a href="{{ route('expenseCategory') }}">Category</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-044-file"></i>
                    <span class="nav-text">Sales</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('pos') }}" target="_blank">POS</a></li>
                    <li><a href="{{ route('invoice') }}">Invoice</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="{{ route('customerPhone') }}" aria-expanded="false">
                    <i class="flaticon-044-file"></i>
                    <span class="nav-text">Customer Phone</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="{{ route('report') }}" aria-expanded="false">
                    <i class="flaticon-044-file"></i>
                    <span class="nav-text">Report</span>
                </a>
            </li>--}}
            <li><a class="has-arrow ai-icon" href="{{ route('setting') }}" aria-expanded="false">
                    <i class="flaticon-044-file"></i>
                    <span class="nav-text">Setting</span>
                </a>
            </li>
        </ul>
        <div class="copyright">
            <p><strong>Software</strong> Developed by</p>
            <p class="fs-12"> iciclecorporation.com </p>
        </div>
    </div>
</div>
