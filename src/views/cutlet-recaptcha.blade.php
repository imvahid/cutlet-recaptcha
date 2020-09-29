
<script src="https://www.google.com/recaptcha/api.js?explicit&hl={{ config('cutlet-recaptcha.language') }}" async defer></script>
<div class="g-recaptcha {{ $hasError ? 'is-invalid' : '' }}" data-sitekey="{{ config('cutlet-recaptcha.site_key') }}"></div>
@error('g-recaptcha-response')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
