<?php

use AppLogger\Logger\Models\Log;

/* REVIEW - Tip - Pre zjednodušenie routes.php vieš použiť ->group(), kde vieš zadefinovať "prefix" aj "middleware"
O Middleware sa dozvieš viac neskôr, ale "prefix" by si tu mohol využiť aby sa ti neopakovalo "logs", pozri to v laravel docs a keď tak to vyskúšaj, dosť to vie pomôcť */

/* REVIEW - Vidím že momentálne hladáš records podľa ľubovoľného /{column}/{value}, zvyčajne na takéto hľadanie slúži ID recordu, takže tak to do budúcna odporúčam robiť
S tvojím spôsobom nie je nič zle, len je to nezvyčajné a robiť veci takto "flexibilne" nemusí vždy byť dobré, na druhú stranu je fajn, že si si to vyskúšal aj takto :D */

Route::get('/logs', function () {
    return Log::all();
});
Route::get('/logs/{name}', function ($name) {
    return Log::where('name', $name)->get();
});

/* REVIEW - Tu máš sorting funkciu mimo zadania, tak ako to máš teraz je to fajn, kľudne by to tak mohlo byť
ale zo skúsenosti by som povedal, že pre takéto prípady by sa hodilo použiť skôr query param, prípadne by si z toho mohol urobiť POST funkciu a posielať "column" a "sortType" v body
Kľudne si vyskúšaj obidve, každopádne sa s tým stretneš. Ak tak urobíš tak na získanie query param / body môžeš použiť input(), keď tak post() ktorý si už aj použil v /log endpointe */
Route::get('/logs/sortBy/{column}/{sortType}', function ($column, $sortType) {

    switch ($sortType) {
        case "ascending":
            return Log::orderBy($column, 'asc')->get();
        case "descending":
            return Log::orderBy($column, 'desc')->get();
        default:
            return Log::orderBy($column, 'asc')->get();
    }
});

Route::delete('/log/delete/{column}/{value}', function ($column, $value) {
    return Log::where($column, $value)->delete();
});

Route::post('/log', function () {
    $data = post();
    $blog = new Log();
    $blog->fill($data);
    $blog->save();
});
