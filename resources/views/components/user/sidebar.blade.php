<ul class="metismenu" id="menu">
    <li><a href="{{ route('front.index') }}" class="" aria-expanded="false">
            <i class="flaticon-381-home"></i>
            <span class="nav-text">Home</span>
        </a>
    </li>

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
            <li><a href="{{ route('user.trade.index') }}">Trade</a></li>
            <li><a href="{{ route('user.trade.market') }}">Market Data</a></li>
        </ul>
    </li>

    <li><a href="{{ route('user.robots.index') }}" class="" aria-expanded="false">
            <i class="flaticon-381-user-5"></i>
            <span class="nav-text">Trade Robot</span>
        </a>
    </li>

    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-072-printer"></i>
            <span class="nav-text">Deposits</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('user.deposit.index') }}">Deposit</a></li>
            <li><a href="{{ route('user.deposit.history') }}">Deposit History</a></li>
        </ul>
    </li>

    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-050-info"></i>
            <span class="nav-text">withdrawals</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('user.withdrawal.index') }}">Withdraw</a></li>
            <li><a href="{{ route('user.withdrawal.methods.index') }}">Withdrawal methods</a></li>
            <li><a href="{{ route('user.withdrawal.history') }}">Withdraw history</a></li>
        </ul>
    </li>


    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-050-info"></i>
            <span class="nav-text">Affiliate Program</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('user.referrals') }}">Referrals</a></li>
            <li><a href="{{ route('user.representative') }}">Zonal Representative</a></li>
        </ul>
    </li>


    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-settings-1"></i>
            <span class="nav-text">Settings</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('user.profile') }}">Profile</a></li>
            <li><a href="{{ route('user.security.password') }}">Change password</a></li>
            <li><a href="{{ route('user.security.two-factor') }}">2FA</a></li>
            <li><a href="{{ route('user.security.sessions') }}">Active Sessions</a></li>
            <li><a href="{{ route('user.kyc.index') }}">KYC</a></li>
            <li><a href="{{ route('user.subscriptions') }}">Subscriptions</a></li>
            {{-- <li><a href="{{route('user.security')}}">Security</a>
</li>
<li><a href="{{route('user.preference')}}">Preferences</a></li> --}}
        </ul>
    </li>
</ul>
