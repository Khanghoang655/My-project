{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <x-button class="mt-4" onclick="submitFormAndSendVerificationEmail()">Gửi mã xác nhận</x-button>

            <div class="mt-4">
                <x-label for="verification_code" value="{{ __('Verification Code') }}" />
                <x-input id="verification_code" class="block mt-1 w-full" type="text" name="verification_code" :value="old('verification_code')" required />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' . __('Terms of Service') . '</a>',
                                    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' . __('Privacy Policy') . '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>
        <x-validation-errors class="mb-4" />
        <div id="emailVerificationForm">
            <form id="verificationForm" action="{{ route('send-verification-email') }}" method="POST"
                onsubmit="return sendVerificationEmail()">
                @csrf
                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus />
                    <x-button id="sendVerificationButton" class="ml-4">
                        Gửi mã xác nhận
                    </x-button>
                    <div id="cooldownMessage" style="display: none;">
                        <p> vui lòng đợi <span id="countdownDisplay">60</span> giây </p>
                    </div>
            </form>

        </div>
        <form method="POST" action="{{ route('register') }}" id="registerForm" >
            @csrf

            <div class="mt-4">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
            </div>
            {{-- <div class="mt-4" style="display: none">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="session('email', '')"
                    required autofocus />
            </div> --}}
            <div class="mt-4">
                <x-label for="verification_code" value="{{ __('Verification Code') }}" />
                <x-input id="verification_code" class="block mt-1 w-full" type="text" name="verification_code"
                    :value="old('verification_code')" required />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4" @click.prevent="submitFormAndSendVerificationEmail()">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>


<script>
   function sendVerificationEmail() {
  var form = document.getElementById('emailVerificationForm');
  var userEmail = form.querySelector('input[name="email"]').value;

  if (!userEmail) {
    alert('Vui lòng nhập email.');
    return false; // Ngăn chặn form từ việc submit nếu email không hợp lệ
  }

  // Kiểm tra xem người dùng đã yêu cầu mã xác nhận trong vòng 60 giây qua hay chưa
  var cooldown = localStorage.getItem('verificationCodeCooldown');
  if (cooldown) {
    // Hiển thị thông báo cho người dùng
    document.getElementById('cooldownMessage').style.display = 'block';

    // Vô hiệu hóa nút gửi mã
    var sendVerificationButton = document.getElementById('sendVerificationButton');
    sendVerificationButton.disabled = true;

    // Đặt một bộ đếm thời gian để kích hoạt lại nút gửi mã sau 60 giây
    var countdown = document.getElementById('countdownDisplay');
    var countdownInterval = setInterval(function() {
      countdown.textContent--;
      if (countdown.textContent <= 0) {
        clearInterval(countdownInterval);
        localStorage.removeItem('verificationCodeCooldown');
        sendVerificationButton.disabled = false;
        document.getElementById('cooldownMessage').style.display = 'none';

        // Đảm bảo rằng câu lệnh này được thực thi sau khi bộ đếm thời gian kết thúc
        setTimeout(function() {
          document.getElementById('registerForm').style.display = 'block';
        }, 1000);
      }
    }, 1000);

    return false;
  }

  // Sử dụng AJAX để gửi yêu cầu đến máy chủ
  axios.post('/send-verification-email', {
    email: userEmail
  })
  .then(response => {
    console.log(response.data.status);

    localStorage.setItem('verificationCodeCooldown', 60);

    // Ẩn biểu mẫu xác nhận email
    // form.style.display = 'none';

    // // Hiển thị biểu mẫu đăng ký
    // document.getElementById('registerForm').style.display = 'block';
  })
  .catch(error => {
    console.error('Error sending verification email:', error);
  });

  return false; // Ngăn chặn form từ việc submit mặc định
}
</script>
