## Uruchomienie projektu
1. Klonujemy projekt na dysk
2. Zmieniamy nazwę pliku .env.example na .env
3. Konfigurujemy plik .env do pracy z bazą danych
4. Odpalamy
```
composer install
php artisan migrate:refresh
```
5. Do pliku .env dodajemy token, który będzie nam potrzeby do autoryzacja zapytań administratora, np.
```
AUTHORIZATION_TOKEN=VRQwv9mqSWksatTf4LdVFAjZ35Tycs
```

## Zapytania nie wymagające autoryzacji
Pokaż wszystkie wolne terminy
```
axios.get('localhost:8000/api/free-appointments')
     .then((res) => {
         //dalsza część kodu
     })
```
Zarejestruj na wybrany termin:
Jako id podajemy id naszego terminu (tworzymy go z poziomu konta administratora)
```
axios.post('localhost:8000/api/register-on-appointment', {
                id: 1,
                licence: 'LU562344',
           })
     .then((res) => {
         //dalsza część kodu
     })
```
Zarejestruj się na pierwszy, wolny termin
```
axios.post('localhost:8000/api/register-on-first-appointment', {
                licence: 'LU562344',
           })
     .then((res) => {
         //dalsza część kodu
     })
```
Rezygnacja
```
axios.post('localhost:8000/api/resign', {
                licence: 'LU562344',
           })
     .then((res) => {
         //dalsza część kodu
     })
```
## Część administracyjna, wymagająca autoryzacji
W pliku env należy dodać AUTHORIZATION_TOKEN i wpisać taki token, jaki chcemy, np.
```
AUTHORIZATION_TOKEN=VRQwv9mqSWksatTf4LdVFAjZ35Tycs
```
Pokaż wszystkie zajęte terminy:
```
const instance = axios.create({
  baseURL: 'localhost:8000/api/admin',
  headers: {'authorization_token': 'token'}
});
instance.get('/busy-appointments')
     .then((res) => {
         //dalsza część kodu
     })
```
Pokaż wszystkie terminy:
```
const instance = axios.create({
  baseURL: 'localhost:8000/api/admin',
  headers: {'authorization_token': 'token'}
});
instance.get('/all-appointments')
     .then((res) => {
         //dalsza część kodu
     })
```
Dodaj nowy termin
```
const instance = axios.create({
  baseURL: 'localhost:8000/api/admin',
  headers: {'authorization_token': 'token'}
});
instance.post('/add-new-appointment', {
                date: '2021-11-21 21:22:04'
             })
     .then((res) => {
         //dalsza część kodu
     })
```
usuń termin
```
const instance = axios.create({
  baseURL: 'localhost:8000/api/admin',
  headers: {'authorization_token': 'token'}
});
instance.post('/del-appointment', {
                id: 1
             })
     .then((res) => {
         //dalsza część kodu
     })
```