<section>
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="card-title">{{ __('Perbarui Kata Sandi') }}</h5>
            <p class="card-subtitle text-muted mt-1">
                {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.') }}
            </p>
        </div><div class="card-body">
            <form method="post" action="{{ route('password.update') }}" class="mt-4">
                @csrf
                @method('put')
    
                <div class="mb-3">
                    <label for="update_password_current_password" class="form-label">{{ __('Kata Sandi Saat Ini') }}</label>
                    <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                    @if($errors->updatePassword->get('current_password'))
                        <div class="text-danger mt-2">
                            {{ $errors->updatePassword->first('current_password') }}
                        </div>
                    @endif
                </div>
    
                <div class="mb-3">
                    <label for="update_password_password" class="form-label">{{ __('Kata Sandi Baru') }}</label>
                    <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                    @if($errors->updatePassword->get('password'))
                        <div class="text-danger mt-2">
                            {{ $errors->updatePassword->first('password') }}
                        </div>
                    @endif
                </div>
    
                <div class="mb-3">
                    <label for="update_password_password_confirmation" class="form-label">{{ __('Konfirmasi Kata Sandi') }}</label>
                    <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                    @if($errors->updatePassword->get('password_confirmation'))
                        <div class="text-danger mt-2">
                            {{ $errors->updatePassword->first('password_confirmation') }}
                        </div>
                    @endif
                </div>
    
                <div class="d-flex justify-content-end gap-4">
                    <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
    
                    @if (session('status') === 'password-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-success mt-2"
                        >{{ __('Tersimpan.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>