<div class="w-60 shadow-xl rounded-lg px-2 pt-5">
    <div class="text-center pb-5">
        <img src="{{ auth()->user()->fullImage }}" class="2xl:w-28 2xl:h-28 xlg:h-24 xlg:w-24 xl:h-24 xl:w-24 lg:h-20 lg:w-20 md:h-20 md:w-20 sm:h-20 sm:w-20 xsm:h-20
        xsm:w-20 msm:h-20 msm:w-20 xxsm:h-20 xxsm:w-20 border border-primary rounded-full p-0.5 m-auto" alt="">
        <div class="mt-3 text-2xl font-fira-sans">
            {{ auth()->user()->name }}
        </div>
    </div>

    <ul class="sidebar relative text-left">
      <li class="relative text-left p-2.5 {{ $active == 'dashboard' ? 'active' : '' }}" data-te-ripple-init data-te-ripple-color="light">
        <a href="{{ url('user_profile') }}" class="text-black-600 text-base items-center  font-fira-sans overflow-hidden rounded flex">
            <svg width="14" height="15" viewBox="0 0 14 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.6666 2.16732V4.16732C13.6666 4.52094 13.5261 4.86008 13.2761 5.11013C13.026 5.36017 12.6869 5.50065 12.3333 5.50065H8.99992C8.6463 5.50065 8.30716 5.36017 8.05711 5.11013C7.80706 4.86008 7.66658 4.52094 7.66658 4.16732V2.16732C7.66658 1.8137 7.80706 1.47456 8.05711 1.22451C8.30716 0.97446 8.6463 0.833984 8.99992 0.833984H12.3333C12.6869 0.833984 13.026 0.97446 13.2761 1.22451C13.5261 1.47456 13.6666 1.8137 13.6666 2.16732ZM4.99992 9.50065H1.66659C1.31296 9.50065 0.973825 9.64113 0.723776 9.89118C0.473728 10.1412 0.333252 10.4804 0.333252 10.834V12.834C0.333252 13.1876 0.473728 13.5267 0.723776 13.7768C0.973825 14.0268 1.31296 14.1673 1.66659 14.1673H4.99992C5.35354 14.1673 5.69268 14.0268 5.94273 13.7768C6.19278 13.5267 6.33325 13.1876 6.33325 12.834V10.834C6.33325 10.4804 6.19278 10.1412 5.94273 9.89118C5.69268 9.64113 5.35354 9.50065 4.99992 9.50065Z"/>
                <path d="M6.33325 2.16732V6.83398C6.33325 7.18761 6.19278 7.52674 5.94273 7.77679C5.69268 8.02684 5.35354 8.16732 4.99992 8.16732H1.66659C1.31296 8.16732 0.973825 8.02684 0.723776 7.77679C0.473728 7.52674 0.333252 7.18761 0.333252 6.83398V2.16732C0.333252 1.8137 0.473728 1.47456 0.723776 1.22451C0.973825 0.97446 1.31296 0.833984 1.66659 0.833984H4.99992C5.35354 0.833984 5.69268 0.97446 5.94273 1.22451C6.19278 1.47456 6.33325 1.8137 6.33325 2.16732ZM12.3333 6.83398H8.99992C8.6463 6.83398 8.30716 6.97446 8.05711 7.22451C7.80706 7.47456 7.66658 7.8137 7.66658 8.16732V12.834C7.66658 13.1876 7.80706 13.5267 8.05711 13.7768C8.30716 14.0268 8.6463 14.1673 8.99992 14.1673H12.3333C12.6869 14.1673 13.026 14.0268 13.2761 13.7768C13.5261 13.5267 13.6666 13.1876 13.6666 12.834V8.16732C13.6666 7.8137 13.5261 7.47456 13.2761 7.22451C13.026 6.97446 12.6869 6.83398 12.3333 6.83398Z" fill="#020613"/>
            </svg>
            <span class="ml-2">{{ __('Dashboard') }}</span>
        </a>
      </li>
      <li class="relative text-left p-2.5 {{ $active == 'testReport' ? 'active' : '' }}" data-te-ripple-init data-te-ripple-color="light">
        <a href="{{ url('test-report') }}" class="text-black-600 text-base items-center  font-fira-sans overflow-hidden rounded flex">
            <svg width="15px" height="15px" viewBox="0 0 12 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.99999 2.83398H1.99999C1.26361 2.83398 0.666656 3.43094 0.666656 4.16732V12.834C0.666656 13.5704 1.26361 14.1673 1.99999 14.1673H9.99999C10.7364 14.1673 11.3333 13.5704 11.3333 12.834V4.16732C11.3333 3.43094 10.7364 2.83398 9.99999 2.83398Z"/>
                <path d="M8.66668 3.50086C8.66668 3.67768 8.59644 3.84724 8.47142 3.97227C8.34639 4.09729 8.17682 4.16753 8.00001 4.16753H4.00001C3.8232 4.16753 3.65363 4.09729 3.52861 3.97227C3.40358 3.84724 3.33335 3.67768 3.33335 3.50086C3.33286 3.25351 3.40119 3.01089 3.5307 2.80015C3.6602 2.5894 3.84578 2.41884 4.06668 2.30753C4.18182 1.88385 4.43318 1.50982 4.78198 1.24316C5.13078 0.976505 5.55763 0.832031 5.99668 0.832031C6.43573 0.832031 6.86258 0.976505 7.21138 1.24316C7.56018 1.50982 7.81154 1.88385 7.92668 2.30753C8.14882 2.41792 8.33577 2.58808 8.46649 2.79889C8.59722 3.00971 8.66655 3.25281 8.66668 3.50086ZM7.33335 8.16753H6.66668V7.50086C6.66668 7.32405 6.59644 7.15448 6.47142 7.02946C6.34639 6.90444 6.17682 6.8342 6.00001 6.8342C5.8232 6.8342 5.65363 6.90444 5.52861 7.02946C5.40358 7.15448 5.33335 7.32405 5.33335 7.50086V8.16753H4.66668C4.48987 8.16753 4.3203 8.23777 4.19528 8.36279C4.07025 8.48782 4.00001 8.65739 4.00001 8.8342C4.00001 9.01101 4.07025 9.18058 4.19528 9.3056C4.3203 9.43063 4.48987 9.50086 4.66668 9.50086H5.33335V10.1675C5.33335 10.3443 5.40358 10.5139 5.52861 10.6389C5.65363 10.764 5.8232 10.8342 6.00001 10.8342C6.17682 10.8342 6.34639 10.764 6.47142 10.6389C6.59644 10.5139 6.66668 10.3443 6.66668 10.1675V9.50086H7.33335C7.51016 9.50086 7.67973 9.43063 7.80475 9.3056C7.92977 9.18058 8.00001 9.01101 8.00001 8.8342C8.00001 8.65739 7.92977 8.48782 7.80475 8.36279C7.67973 8.23777 7.51016 8.16753 7.33335 8.16753Z" fill="#020613"/>
            </svg>
            <span class="ml-2">{{ __('Test Report') }}</span>
        </a>
      </li>
      <li class="relative text-left p-2.5 {{ $active == 'patientAddress' ? 'active' : '' }}" data-te-ripple-init data-te-ripple-color="light">
        <a href="{{ url('patient-address') }}" class="text-black-600 text-base items-center  font-fira-sans overflow-hidden rounded flex">
            <svg width="15" height="15" viewBox="0 0 10 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.00001 0.833984C3.76233 0.833984 2.57535 1.32565 1.70018 2.20082C0.825009 3.07599 0.333344 4.26297 0.333344 5.50065C0.333344 9.04732 4.33334 13.734 4.49334 13.934C4.55593 14.0072 4.63363 14.0659 4.72109 14.1062C4.80856 14.1465 4.90371 14.1674 5.00001 14.1674C5.09631 14.1674 5.19146 14.1465 5.27893 14.1062C5.36639 14.0659 5.44409 14.0072 5.50668 13.934C5.66668 13.734 9.66668 9.04732 9.66668 5.50065C9.66668 4.26297 9.17501 3.07599 8.29984 2.20082C7.42467 1.32565 6.23769 0.833984 5.00001 0.833984V0.833984Z"/>
                <path d="M5 7.5C6.10457 7.5 7 6.60457 7 5.5C7 4.39543 6.10457 3.5 5 3.5C3.89543 3.5 3 4.39543 3 5.5C3 6.60457 3.89543 7.5 5 7.5Z" fill="#020613"/>
            </svg>
            <span class="ml-2">{{ __('Patient Address') }}</span>
        </a>
      </li>
      <li class="relative text-left p-2.5 {{ $active == 'favirote' ? 'active' : '' }}" data-te-ripple-init data-te-ripple-color="light">
        <a href="{{ url('favorite') }}" class="text-black-600 text-base items-center  font-fira-sans overflow-hidden rounded flex">
            <svg width="12" height="15" viewBox="0 0 12 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.6667 0.833984H2.66666C2.13622 0.833984 1.62752 1.0447 1.25244 1.41977C0.87737 1.79484 0.666656 2.30355 0.666656 2.83398V12.1673C0.666656 12.6977 0.87737 13.2065 1.25244 13.5815C1.62752 13.9566 2.13622 14.1673 2.66666 14.1673H9.99999C10.3536 14.1673 10.6927 14.0268 10.9428 13.7768C11.1928 13.5267 11.3333 13.1876 11.3333 12.834V1.50065C11.3333 1.32384 11.2631 1.15427 11.1381 1.02925C11.013 0.904222 10.8435 0.833984 10.6667 0.833984V0.833984Z"/>
                <path d="M4 4.83398V9.50065L6 8.16732L8 9.50065V4.83398H4Z" fill="#020613"/>
            </svg>
            <span class="ml-2">{{ __('Favorite') }}</span>
        </a>
      </li>
      <li class="relative text-left p-2.5 {{ $active == 'profileSetting' ? 'active' : '' }}" data-te-ripple-init data-te-ripple-color="light">
        <a href="{{ url('profile-setting') }}" class="text-black-600 text-base items-center  font-fira-sans overflow-hidden rounded flex">
            <svg width="16" height="17" viewBox="0 0 16 17" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.09461 14.8903C4.97758 14.5577 3.98328 13.9403 3.19597 13.1222C3.48968 12.7741 3.66668 12.3243 3.66668 11.8332C3.66668 10.7286 2.77125 9.83321 1.66668 9.83321C1.59986 9.83321 1.53381 9.83648 1.46867 9.84288C1.37994 9.40908 1.33334 8.95991 1.33334 8.49988C1.33334 7.80301 1.44027 7.13111 1.63861 6.49968C1.64795 6.49981 1.6573 6.49988 1.66668 6.49988C2.77125 6.49988 3.66668 5.60445 3.66668 4.49988C3.66668 4.18278 3.59288 3.88291 3.46154 3.61654C4.23251 2.89967 5.17351 2.36318 6.21738 2.07422C6.54814 2.72257 7.22224 3.16655 8.00001 3.16655C8.77778 3.16655 9.45188 2.72257 9.78264 2.07422C10.8265 2.36318 11.7675 2.89967 12.5385 3.61654C12.4071 3.88291 12.3333 4.18278 12.3333 4.49988C12.3333 5.60445 13.2288 6.49988 14.3333 6.49988C14.3427 6.49988 14.3521 6.49981 14.3614 6.49968C14.5597 7.13111 14.6667 7.80301 14.6667 8.49988C14.6667 8.95991 14.6201 9.40908 14.5313 9.84288C14.4662 9.83648 14.4002 9.83321 14.3333 9.83321C13.2288 9.83321 12.3333 10.7286 12.3333 11.8332C12.3333 12.3243 12.5103 12.7741 12.804 13.1222C12.0167 13.9403 11.0224 14.5577 9.90541 14.8903C9.64761 14.0838 8.89201 13.4999 8.00001 13.4999C7.10801 13.4999 6.35241 14.0838 6.09461 14.8903Z"/>
                <path d="M7.99999 10.8327C9.28866 10.8327 10.3333 9.78802 10.3333 8.49935C10.3333 7.21068 9.28866 6.16602 7.99999 6.16602C6.71132 6.16602 5.66666 7.21068 5.66666 8.49935C5.66666 9.78802 6.71132 10.8327 7.99999 10.8327Z" fill="#020613" stroke="white" stroke-width="66.6667" stroke-linejoin="round"/>
            </svg>
            <span class="ml-2">{{ __('Profile Settings') }}</span>
        </a>
      </li>
      <li class="relative text-left p-2.5 {{ $active == 'changePassword' ? 'active' : '' }}" data-te-ripple-init data-te-ripple-color="light">
        <a href="{{ url('change-password') }}" class="text-black-600 text-base items-center  font-fira-sans overflow-hidden rounded flex">
            <svg width="12" height="15" viewBox="0 0 12 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.99999 4.83398H9.33332V4.16732C9.33332 3.28326 8.98213 2.43542 8.35701 1.8103C7.73189 1.18517 6.88404 0.833984 5.99999 0.833984C5.11593 0.833984 4.26809 1.18517 3.64297 1.8103C3.01785 2.43542 2.66666 3.28326 2.66666 4.16732V4.83398H1.99999C1.64637 4.83398 1.30723 4.97446 1.05718 5.22451C0.807132 5.47456 0.666656 5.8137 0.666656 6.16732V12.834C0.666656 13.1876 0.807132 13.5267 1.05718 13.7768C1.30723 14.0268 1.64637 14.1673 1.99999 14.1673H9.99999C10.3536 14.1673 10.6927 14.0268 10.9428 13.7768C11.1928 13.5267 11.3333 13.1876 11.3333 12.834V6.16732C11.3333 5.8137 11.1928 5.47456 10.9428 5.22451C10.6927 4.97446 10.3536 4.83398 9.99999 4.83398V4.83398ZM3.99999 4.16732C3.99999 3.63688 4.2107 3.12818 4.58578 2.7531C4.96085 2.37803 5.46956 2.16732 5.99999 2.16732C6.53042 2.16732 7.03913 2.37803 7.4142 2.7531C7.78928 3.12818 7.99999 3.63688 7.99999 4.16732V4.83398H3.99999V4.16732Z"/>
                <path d="M6 7.5C5.61746 7.50045 5.24671 7.63249 4.94999 7.87395C4.65327 8.1154 4.44865 8.45159 4.37047 8.82606C4.29229 9.20054 4.34532 9.59051 4.52064 9.93051C4.69597 10.2705 4.98292 10.5399 5.33334 10.6933V11.5C5.33334 11.6768 5.40358 11.8464 5.5286 11.9714C5.65362 12.0964 5.82319 12.1667 6 12.1667C6.17682 12.1667 6.34638 12.0964 6.47141 11.9714C6.59643 11.8464 6.66667 11.6768 6.66667 11.5V10.6933C7.01709 10.5399 7.30404 10.2705 7.47936 9.93051C7.65469 9.59051 7.70771 9.20054 7.62954 8.82606C7.55136 8.45159 7.34674 8.1154 7.05002 7.87395C6.7533 7.63249 6.38255 7.50045 6 7.5V7.5Z" fill="#020613"/>
            </svg>
            <span class="ml-2">{{ __('Change Password') }}</span>
        </a>
      </li>
    </ul>
</div>
