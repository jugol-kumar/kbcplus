
<div class="col-lg-4">
    <div class="osahan-account bg-white rounded shadow-sm overflow-hidden">
        <div class="p-4 profile text-center border-bottom">
            <img src="{{ config('app.placeholder') }}" class="img-fluid rounded-pill">
            <h6 class="font-weight-bold m-0 mt-2">{{ Auth::user()->name }}</h6>
            <p class="small text-muted m-0">
                <a href="{{ Auth::user()->email }}"
                   class="__cf_email__"
                   data-cfemail="c8a1a9a5a7bba9a0a9a688afa5a9a1a4e6aba7a5">[email&#160;protected]</a>
            </p>
        </div>
        <div class="account-sections">
            <ul class="list-group">
                <a href="{{ route('user.dashboard') }}" class="text-decoration-none text-dark">
                    <li class="border-bottom bg-white d-flex align-items-center p-3">
                        <i class="icofont-user osahan-icofont bg-danger"></i>My Account
                        <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                class="icofont-simple-right"></i></span>
                    </li>
                </a>

                <a href="{{ route('user.promos.index') }}" class="text-decoration-none text-dark">
                    <li class="border-bottom bg-white d-flex align-items-center p-3">
                        <i class="icofont-sale-discount osahan-icofont bg-success"></i>Promos
                        <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                class="icofont-simple-right"></i></span>
                    </li>
                </a>

                <a href="javascript:void(0)" class="text-decoration-none text-dark">
                    <li class="border-bottom bg-white d-flex align-items-center p-3">
                        <i class="icofont-address-book osahan-icofont bg-dark"></i>My Address
                        <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                class="icofont-simple-right"></i></span>
                    </li>
                </a>

                <a href="{{ route('user.my.order') }}" class="text-decoration-none text-dark">
                    <li class="border-bottom bg-white d-flex align-items-center p-3">
                        <i class="icofont-cart-alt osahan-icofont bg-awat"></i>My Order
                        <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                class="icofont-simple-right"></i></span>
                    </li>
                </a>

                <a href="terms_conditions.html" class="text-decoration-none text-dark">
                    <li class="border-bottom bg-white d-flex align-items-center p-3">
                        <i class="icofont-info-circle osahan-icofont bg-primary"></i>Terms, Privacy & Policy
                        <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                class="icofont-simple-right"></i></span>
                    </li>
                </a>
                <a href="help_support.html" class="text-decoration-none text-dark">
                    <li class="border-bottom bg-white d-flex align-items-center p-3">
                        <i class="icofont-phone osahan-icofont bg-warning"></i>Help & Support
                        <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                class="icofont-simple-right"></i></span>
                    </li>
                </a>
                <a href="help_ticket.html" class="text-decoration-none text-dark">
                    <li class="border-bottom bg-white d-flex align-items-center p-3">
                        <i class="icofont-phone osahan-icofont bg-success"></i>Ticket
                        <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                class="icofont-simple-right"></i></span>
                    </li>
                </a>
                <a href="javascript:void(0)" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"  class="text-decoration-none text-dark">
                    <li class="border-bottom bg-white d-flex  align-items-center p-3">
                        <i class="icofont-lock osahan-icofont bg-danger"></i> Logout
                    </li>
                </a>

                <form id="logout-form" action="{{ route('user.logout') }}" style="display: none" method="post">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</div>

