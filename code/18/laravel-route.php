<?php

Route::get('/show', function() {
    $now = new DateTime();
    $items = [ "감자 튀김", "찐 감자", "구운 감자" ];
    return view('show-menu', [ 'when' => $now,
                               'what' => $items ]);
});
