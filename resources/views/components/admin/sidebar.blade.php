<ul class="metismenu" id="menu">
    <li><a href="{{ route('admin.index') }}" class="" aria-expanded="false">
            <i class="flaticon-025-dashboard"></i>
            <span class="nav-text">Dashboard</span>
        </a>
    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-user-1"></i>
            <span class="nav-text">Users</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{route('admin.users.index','active')}}">Active</a></li>
            <li><a href="{{route('admin.users.index','pending')}}">Pending</a></li>
            <li><a href="{{route('admin.users.index','inactive')}}">Inactive</a></li>
            <li><a href="{{route('admin.users.index','rejected')}}">Rejected</a></li>
        </ul>
    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-041-graph"></i>
            <span class="nav-text">Trades</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{route('admin.trades.index','active')}}">Active</a></li>
            <li><a href="{{route('admin.trades.index','inactive')}}">Inactive</a></li>
        </ul>
    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-072-printer"></i>
            <span class="nav-text">Deposits</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{route('admin.deposits.index','approved')}}">Approved</a></li>
            <li><a href="{{route('admin.deposits.index','pending')}}">Pending</a></li>
            <li><a href="{{route('admin.deposits.index','declined')}}">Declined</a></li>
        </ul>
    </li>

    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-050-info"></i>
            <span class="nav-text">withdrawals</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{route('admin.withdrawals.index','approved')}}">Approved</a></li>
            <li><a href="{{route('admin.withdrawals.index','pending')}}">Pending</a></li>
            <li><a href="{{route('admin.withdrawals.index','declined')}}">Declined</a></li>
        </ul>
    </li>
    <li><a href="{{route('admin.emails.index')}}" class="" aria-expanded="false">
            <i class="flaticon-381-folder"></i>
            <span class="nav-text">Emails</span>
        </a>
    </li>

    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-settings-1"></i>
            <span class="nav-text">Settings</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{route('admin.settings.security.index')}}">Security</a></li>
            <li><a href="{{route('admin.settings.contact.index')}}">Contact Details</a></li>
            <li><a href="{{route('admin.settings.methods.index')}}">Payment Methods</a></li>
            <li><a href="{{route('admin.plan.index')}}">Subscription Plans</a></li>
            <li><a href="{{route('admin.currency.index')}}">Account Currency</a></li>
            <li><a href="{{route('admin.trade-currency.index')}}">Trade Currency</a></li>
        </ul>
    </li>
</ul>
