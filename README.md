### To run the API:

```
# Run vagrant
vagrant up && vagrant ssh

# Go into code directory on your vagrant vm
cd code

# Seed the database
php artisan migrate:fresh --seed


# Generate access token
php artisan tinker
$user = 'App\Models\User'::first();
$user->createToken('dev-access');

```

### To run Vue front end:

```
npm i
npm run dev
```
