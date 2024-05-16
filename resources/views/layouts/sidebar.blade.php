<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show {{ request()->routeIs('app.pos.*') ? 'c-sidebar-minimized' : '' }}" id="sidebar">
    <div class="c-sidebar-brand" style="background-color: #EEEBEB">
        <a href="{{ route('home') }}">
            <img class="c-sidebar-brand-full" src="{{ asset('images/ujayyy.png') }}" alt="Site Logo" width="110" style="margin-top: 16px; margin-bottom: 16px;">
        </a>
    </div>
    <ul class="c-sidebar-nav" style="background-color: #070652;">
        @include('layouts.menu')
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 692px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 369px;"></div>
        </div>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized" style="background-color: #070652;"></button>
</div>