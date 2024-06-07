<section>
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="card-title">{{ __('Profile Information') }}</h5>
            <p class="card-subtitle text-muted mt-1">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </div>

        <div class="card-body">
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" class="mt-4">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                    @if($errors->get('name'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
                    @if($errors->get('email'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('email') }}
                        </div>
                    @endif

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-2">
                            <p class="text-muted">
                                {{ __('Your email address is unverified.') }}
                                <button form="send-verification" class="btn btn-link p-0">{{ __('Click here to re-send the verification email.') }}</button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="text-success mt-2">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-end gap-4">
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-success mt-2"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
