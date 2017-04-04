; 가격이 5.00보다 큰 메뉴
SELECT dish_name, price FROM dishes WHERE price > 5.00

; 메뉴명이 정확히 "호두 번"인 메뉴
SELECT price FROM dishes WHERE dish_name = '호두 번'

; 가격이 5.00보다 크고 10.00 이하인 메뉴
SELECT dish_name FROM dishes WHERE price > 5.00 AND price <= 10.00

; 가격이 5.00보다 크고 10.00 이하거나,
; 메뉴명이 정확히 "호두 번"인 메뉴 (가격에 관계 없이)
SELECT dish_name, price FROM dishes WHERE (price > 5.00 AND price <= 10.00)
     OR dish_name = '호두 번'
