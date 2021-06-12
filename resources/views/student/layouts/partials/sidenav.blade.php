<div class="education_block_list_layout">
  <ul class="sidenav">
    <li class="sidenav-item">
      <a href="{{ messenger_route() }}" class="{{ Request::is('student/chatroom*') ? 'active' : '' }}"">
          <i class="ti-comment mr-2"></i>
          {{ __('Chat Room') }}
          <sup><div class="badge badge-primary p-1"><b>{{ __('20') }}</b></div></sup>
      </a>
    </li>
  </ul>
</div>

<div class="education_block_list_layout">
    <ul class="sidenav">
      <li class="sidenav-item">
        <a href="{{ route('student.dashboard.index') }}" class="{{ Request::is('student/dashboard*') ? 'active' : '' }}"">
            <i class="ti-blackboard mr-2"></i>
            {{ __('Dashboard') }}
        </a>
      </li>

      <li class="sidenav-item">
        <a href="{{ route('student.application.index') }}" class="{{ Request::is('student/application*') ? 'active' : '' }}">
            <i class="ti-pencil-alt mr-2"></i>
            {{ __('My Applications') }}
        </a>
      </li>

      <li class="sidenav-item">
        <a href="{{ route('student.documents.index') }}" class="{{ Request::is('student/documents*') ? 'active' : '' }}">
            <i class="ti-files mr-2"></i>
            {{ __('My Documents') }}
        </a>
      </li>

      <li class="sidenav-item">
        <a href="{{ route('student.profile.index') }}" class="{{ Request::is('student/profile*') ? 'active' : '' }}">
            <i class="ti-user mr-2"></i>
            {{ __('Profile') }}
        </a>
      </li>

      <hr>

      <li class="sidenav-item">
        <a href="{{ route('student.settings.profile') }}" class="{{ Request::is('student/settings/profile*') ? 'active' : '' }}">
          <i class="ti-pencil mr-2 pl-20"></i>
          {{ __('Edit Profile') }}
        </a>
      </li>

      <li class="sidenav-item">
        <a href="{{ route('student.settings.education') }}" class="{{ Request::is('student/settings/education*') ? 'active' : '' }}">
          <i class="ti-pencil-alt mr-2 pl-20"></i>
          {{ __('Education') }}
        </a>
      </li>

      <li class="sidenav-item">
        <a href="{{ route('student.settings.reference') }}" class="{{ Request::is('student/settings/reference*') ? 'active' : '' }}">
          <i class="ti-unlink mr-2 pl-20"></i>
          {{ __('Reference\'s') }}
        </a>
      </li>

      <li class="sidenav-item">
        <a href="{{ route('student.settings.language') }}" class="{{ Request::is('student/settings/language*') ? 'active' : '' }}">
          <i class="ti-tag mr-2 pl-20"></i>
          {{ __('Language') }}
        </a>
      </li>

      <li class="sidenav-item">
        <a href="{{ route('student.settings.security') }}" class="{{ Request::is('student/settings/security*') ? 'active' : '' }}">
          <i class="ti-lock mr-2 pl-20"></i>
          {{ __('Security') }}
        </a>
      </li>

      {{-- <li class="sidenav-item">
        <a class="{{ Request::is('student/settings*') ? 'active' : '' }}" data-toggle="collapse" href="javascript:void(0);" data-target="#settingsItem" role="button" aria-expanded="{{ Request::is('student/settings*') ? 'true' : 'false' }}" aria-controls="settingsItem">
            <i class="ti-settings mr-2"></i>
            {{ __('Settings') }}
            <i class="ti-angle-down float-right mt-1"></i>
        </a>
        <div class="mb-3"></div>
        <ul class="collapse {{ Request::is('student/settings*') ? 'show' : '' }} pl-5" id="settingsItem">
          <li>
            <a href="{{ route('student.settings.profile') }}" class="{{ Request::is('student/settings/profile*') ? 'active' : '' }}">
              <i class="ti-pencil mr-2 pl-20"></i>
              {{ __('Edit Profile') }}
            </a>
          </li>
          <li class="pt-3">
            <a href="{{ route('student.settings.education') }}" class="{{ Request::is('student/settings/education*') ? 'active' : '' }}">
              <i class="ti-pencil-alt mr-2 pl-20"></i>
              {{ __('Education') }}
            </a>
          </li>
          <li class="pt-3">
            <a href="{{ route('student.settings.language') }}" class="{{ Request::is('student/settings/language*') ? 'active' : '' }}">
              <i class="ti-tag mr-2 pl-20"></i>
              {{ __('Language') }}
            </a>
          </li>
          <li class="pt-3">
            <a href="{{ route('student.settings.security') }}" class="{{ Request::is('student/settings/security*') ? 'active' : '' }}">
              <i class="ti-lock mr-2 pl-20"></i>
              {{ __('Security') }}
            </a>
          </li>
        </ul>
      </li> --}}
    </ul>
</div>

<div class="education_block_list_layout">
  <ul class="sidenav">
    <li class="sidenav-item">
        @php
            $cart = Cart::get();
            $carted = count((array)$cart['programs']);
        @endphp
      <a href="{{ route('student.cart.index') }}" class="{{ Request::is('student/cart*') ? 'active' : '' }}"">
          <i class="ti-shopping-cart-full mr-2"></i>
          {{ __('My Cart') }}
          <sup><div class="badge badge-primary p-1"><b>{{ $carted }}</b></div></sup>
      </a>
    </li>
  </ul>
</div>
