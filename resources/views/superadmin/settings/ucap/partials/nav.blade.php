<div class="email-leftbar">
    <div class="card m-b-30">
        <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('superadmin.settings.ucap.general.index') }}" class="{{ Route::is('superadmin.settings.ucap.general.index') ? 'active' : '' }}">
                    <i class="feather icon-settings mr-2"></i>
                    {{ __('General Settings') }}
                </a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('superadmin.settings.ucap.contact.index') }}" class="{{ Route::is('superadmin.settings.ucap.contact.index') ? 'active' : '' }}">
                    <i class="feather icon-phone mr-2"></i>
                    {{ __('Contact Settings') }}
                </a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('superadmin.settings.ucap.email.index') }}" class="{{ Route::is('superadmin.settings.ucap.email.index') ? 'active' : '' }}">
                    <i class="feather icon-mail mr-2"></i>
                    {{ __('Email Settings') }}
                </a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('superadmin.settings.ucap.website.index') }}" class="{{ Route::is('superadmin.settings.ucap.website.index') ? 'active' : '' }}">
                    <i class="feather icon-wifi mr-2"></i>
                    {{ __('Website') }}
                </a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('superadmin.settings.ucap.application.index') }}" class="{{ Route::is('superadmin.settings.ucap.application.index') ? 'active' : '' }}">
                    <i class="feather icon-clipboard mr-2"></i>
                    {{ __('Application') }}
                </a>
              </li>
            </ul>
        </div>
    </div>
</div>