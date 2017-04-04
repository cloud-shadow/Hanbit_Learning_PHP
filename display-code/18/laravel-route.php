Route::get('/show', function() {
    $now = new DateTime();
    $items = [ "°¨ÀÚ Æ¢±è", "Âğ °¨ÀÚ", "±¸¿î °¨ÀÚ" ];
    return view('show-menu', [ 'when' => $now,
                               'what' => $items ]);
});