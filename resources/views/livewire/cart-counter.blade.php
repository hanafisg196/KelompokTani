<div>
    {{-- The Master doesn't talk, he acts. --}}
    <li class="nav-item {{ request()->segment(1)=='cartproduk'? 'active' : '' }}">
        <a class="nav-link" href="/cartproduk"><img src="/assets2/images/cart.svg">
            <button type="button" class="btn btn-danger">{{ $total }}</button>
        </a>
    </li>
</div>
