<section class="space-y-6">
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="card-title">{{ __('Hapus Akun') }}</h5>
            <p class="card-subtitle text-muted mt-1">
                {{ __('Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Sebelum menghapus akun, harap unduh data atau informasi yang ingin Anda simpan.') }}
            </p>
        </div><div class="card-body">
            <button class="btn btn-danger"
                data-bs-toggle="modal"
                data-bs-target="#confirmUserDeletionModal"
            >{{ __('Hapus Akun') }}</button>
        </div>
    </div>
    
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmUserDeletionModalLabel">{{ __('Apakah Anda yakin ingin menghapus akun Anda?') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <p class="text-muted">
                            {{ __('Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.') }}
                        </p>
    
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Kata Sandi') }}</label>
                            <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Kata Sandi') }}">
                            @if($errors->userDeletion->get('password'))
                                <div class="text-danger mt-2">
                                    {{ $errors->userDeletion->first('password') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Batal') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Hapus Akun') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>