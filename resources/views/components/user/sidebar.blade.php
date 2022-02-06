<ul class="metismenu" id="menu">
    <li><a href="{{ route('user.index') }}" class="" aria-expanded="false">
            <i class="flaticon-025-dashboard"></i>
            <span class="nav-text">Dashboard</span>
        </a>
    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-041-graph"></i>
            <span class="nav-text">Trades</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{route('user.trade.index')}}">Trade</a></li>
            <li><a href="{{route('user.trade.market')}}">Market Data</a></li>
            <li><a href="{{route('user.trade.history')}}">Trade Hisory</a></li>
        </ul>
    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-072-printer"></i>
            <span class="nav-text">Deposits</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{route('user.deposit.index')}}">Deposit</a></li>
            <li><a href="{{route('user.deposit.history')}}">Deposit History</a></li>
        </ul>
    </li>

    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-050-info"></i>
            <span class="nav-text">withdrawals</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{route('user.withdrawal.index')}}">Withdraw</a></li>
            <li><a href="{{route('user.withdrawal.history')}}">Withdrawal History</a></li>
        </ul>
    </li>
    {{-- <li><a href="{{ route('user.index') }}" class="" aria-expanded="false">
    <i class="flaticon-043-menu"></i>
    <span class="nav-text">Referrals</span>
    </a>
    </li> --}}
    {{-- <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-022-copy"></i>
            <span class="nav-text">Support Tickets</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="">Create Ticket</a></li>
            <li><a href="">Ticket History</a></li>
        </ul>
    </li> --}}
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-settings-1"></i>
            <span class="nav-text">Settings</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{route('user.profile')}}">Profile</a></li>
            <li><a href="{{route('user.security')}}">Change Password</a></li>
            {{-- <li><a href="{{route('user.preference')}}">Preferences</a>
    </li> --}}
    <li><a href="{{route('user.subscriptions')}}">Subscriptions</a></li>
</ul>
</li>
</ul>
