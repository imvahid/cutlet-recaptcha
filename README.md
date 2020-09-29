# Laravel Cutlet Recaptcha
[![GitHub issues](https://img.shields.io/github/issues/va1hi9da9sh2ou0rz2ad1eh7/cutlet-recaptcha?style=flat-square)](https://github.com/va1hi9da9sh2ou0rz2ad1eh7/cutlet-recaptcha/issues)
[![GitHub stars](https://img.shields.io/github/stars/va1hi9da9sh2ou0rz2ad1eh7/cutlet-recaptcha?style=flat-square)](https://github.com/va1hi9da9sh2ou0rz2ad1eh7/cutlet-recaptcha/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/va1hi9da9sh2ou0rz2ad1eh7/cutlet-recaptcha?style=flat-square)](https://github.com/va1hi9da9sh2ou0rz2ad1eh7/cutlet-recaptcha/network)
[![GitHub license](https://img.shields.io/github/license/va1hi9da9sh2ou0rz2ad1eh7/cutlet-recaptcha?style=flat-square)](https://github.com/va1hi9da9sh2ou0rz2ad1eh7/cutlet-recaptcha/blob/master/LICENSE)

### Installation

```

composer require va/cutlet-recaptcha

```

#### Publish Config file

```

php artisan vendor:publish --tag=cutlet-recaptcha

```

#### Usage
Set the values for google api in .env file:
```
GOOGLE_RECAPTCHA_SITE_KEY=
GOOGLE_RECAPTCHA_SECRET_KEY=
```

You can add this tag in blade files:
```
<x-cutlet-recaptcha :has-error="$errors->has('g-recaptcha-response')"></x-cutlet-recaptcha>
```
and in the validation parts:
```
protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => ['required', 'string'],
            'password' => ['required', 'string'],
            'g-recaptcha-response' => ['required', 'cutlet_recaptcha']
            ]);
    }
```
and you can customize the language and validation message in config file;
```
return [
    'language' => 'fa',
    'site_key' => env('GOOGLE_RECAPTCAH_SITE_KEY'),
    'secret_key' => env('GOOGLE_RECAPTCAH_SECRET_KEY'),
    'message' => 'شما به عنوان ربات تشخیص داده شده‌اید'
];
```

#### Requirements:

- PHP v7.0 or above
- Laravel v7.0 or above