@extends('theme.default')


@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Avatar') }}</h5>
        </div>

        <div class="card-body">
            {{ __("Update your account's profile avatar.") }}
        </div>

        <div class="card-body border-top">
            <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label"><img src="/avatars/{{ Auth::user()->avatar }}"
                                                                style="width: 100%; height: 100%;"></label>
                    <div class="col-lg-9">
                        <input id="avatar" type="file" class="form-control" name="avatar" value="{{ old('avatar') }}"
                               required autocomplete="avatar">
                        <div class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</div>
                        <x-input-error :messages="$errors->get('avatar')" class="badge d-block bg-danger mt-1"/>
                    </div>
                </div>
                @if (session('status') === 'avatar-updated')
                    <div class="alert alert-success alert-icon-start alert-dismissible fade show">
											<span class="alert-icon bg-success text-white">
												<i class="ph-check-circle"></i>
											</span>
                        <span class="fw-semibold">{{ __('Avatar updated') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">{{ __('Upload') }} <i
                            class="ph-upload ms-2"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Profile Information') }}</h5>
        </div>

        <div class="card-body">
            {{ __("Update your account's profile information and email address.") }}
        </div>
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <div class="card-body border-top">
            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label" for="name">{{ __('Name:') }}</label>
                    <div class="col-lg-9">
                        <div class="form-floating">
                            <input id="name" name="name" type="text" class="form-control"
                                   value="{{ old('name', $user->name) }}" placeholder="{{ __('Name:') }}" required
                                   autofocus autocomplete="name">
                            <label>{{ old('name', $user->name) }}</label>
                            <x-input-error :messages="$errors->get('name')" class="badge d-block bg-danger mt-1"/>
                        </div>
                    </div>
                </div>
                <!-- Email -->
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label" for="email">{{ __('Email:') }}</label>
                    <div class="col-lg-9">
                        <div class="form-floating">
                            <input id="email" name="email" type="email" class="form-control"
                                   value="{{ old('email', $user->email) }}" placeholder="{{ __('Email:') }}" required
                                   autocomplete="username">
                            <label>{{ old('email', $user->email) }}</label>
                            <x-input-error :messages="$errors->get('email')" class="badge d-block bg-danger mt-1"/>
                        </div>
                    </div>
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
                @if (session('status') === 'profile-updated')
                    <div class="alert alert-success alert-icon-start alert-dismissible fade show">
											<span class="alert-icon bg-success text-white">
												<i class="ph-check-circle"></i>
											</span>
                        <span class="fw-semibold">{{ __('Profile Updated') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">{{ __('Save Profile') }} <i
                            class="ph-paper-plane-tilt ms-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Update Password') }}</h5>
        </div>

        <div class="card-body">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </div>

        <div class="card-body border-top">
            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label" for="password">{{ __('Current Password') }}</label>
                    <div class="col-lg-9">
                        <div class="form-floating">
                            <input id="password" name="password" type="password" class="form-control"
                                   autocomplete="new-password">
                            <label>{{ __('New Password') }}</label>
                            <x-input-error :messages="$errors->updatePassword->get('current_password')"
                                           class="badge d-block bg-danger mt-1"/>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label" for="current_password">{{ __('New Password') }}</label>
                    <div class="col-lg-9">
                        <div class="form-floating">
                            <input id="current_password" name="current_password" type="password" class="form-control"
                                   autocomplete="current-password">
                            <label>{{ __('Current Password') }}</label>
                            <x-input-error :messages="$errors->updatePassword->get('password')"
                                           class="badge d-block bg-danger mt-1"/>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label"
                           for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <div class="col-lg-9">
                        <div class="form-floating">
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                   class="form-control" autocomplete="new-password">
                            <label>{{ __('Confirm Password') }}</label>
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"
                                           class="badge d-block bg-danger mt-1"/>
                        </div>
                    </div>
                </div>
                @if (session('status') === 'password-updated')
                    <div class="alert alert-success alert-icon-start alert-dismissible fade show">
											<span class="alert-icon bg-success text-white">
												<i class="ph-check-circle"></i>
											</span>
                        <span class="fw-semibold">{{ __('Password changed') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">{{ __('Save Password') }} <i
                            class="ph-paper-plane-tilt ms-2"></i>
                    </button>

                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"> {{ __('Delete Account') }}</h5>
        </div>

        <div class="card-body">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            <br/>
            <br/>
            <p>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#confirm-user-deletion">{{ __('Delete Account') }} <i class="ph-trash ms-2"></i>
                </button>
            </p>
        </div>

        <div id="confirm-user-deletion" class="modal fade" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('Delete Account') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="fw-semibold">{{ __('Are you sure you want to delete your account?') }}</h6>
                            <p> {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</p>
                            <hr>
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label" for="password">{{ __('Password') }}</label>
                                <div class="col-lg-9">
                                    <div class="form-floating">
                                        <input id="password" name="password" type="password" class="form-control">
                                        <label>{{ __('Password') }}</label>
                                        <x-input-error :messages="$errors->userDeletion->get('password')"
                                                       class="badge d-block bg-danger mt-1"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link"
                                    data-bs-dismiss="modal"> {{ __('Close') }}</button>
                            <button type="submit" class="btn btn-danger"> {{ __('Delete Account') }} <i
                                    class="ph-trash ms-2"></i></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    </div>

@endsection
