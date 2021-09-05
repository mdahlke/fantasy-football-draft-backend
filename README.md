## Getting Started

Clone the repository.

Install dependencies using `composer install`

Run migrations with `php artisan migrate`

Run the seeder `php artisan db:seed --class=UserSeeder`

You're good to go!

## .env File Configuration

In order for Sanctum to work properly, make sure the following constants in your `.env` file are set properly:

```
SESSION_DRIVER=cookie
SANCTUM_STATEFUL_DOMAINS="some_domain.com, another_domain_with_port.com:1234"
SESSION_DOMAIN=.domain.com # This has to be the same domain as the one in APP_URL
```

## Additional Considerations

Make sure to adjust the `RedirectIfAuthenticated` middleware accordingly.

## Fortify Configuration

In `fortify.php` make sure `views` is `false`, we don't need them since this will
be an API.

`'views' => false`

## Forgot Password

Fortify handles the password reset link delivery and new password creation.

To request a password reset link, the front-end implementation should make a `POST` request to `/forgot-password` while sending the 
following parameter: `email`. The back-end will send an email containing the reset link.

Make sure you have `FRONT_END_URL` set to your front end's URL in your `.env` file, include a port number as well if necessary.

To reset a password, the front-end implementation should make a `POST` request to `/reset-password` while sending the 
following parameters: `token`, `email`, `password` and `password_confirmation`.

The password reset logic can be modified accordingly on `ResetUserPassword.php`, located on `app/Actions/Fortify`.

## Updating A Password

To reset a password, the front-end should make a PUT request to api/user/password and send the following
required parameters: `current_password`, `password` and `password_confirmation`.

The password update logic can be modified accordingly on `UpdateUserPassword.php`, located on `app/Actions/Fortify`.

## Updating A User's Information

Similarly, Fortify will handle updating a user's information, for this the front-end should
make a `PUT` request to `api/user` and send the following parameters: `name` and `email`.

The user update logic can be modified accordingly on `UpdateUserProfileInformation.php`, located in `app/Actions/Fortify`.