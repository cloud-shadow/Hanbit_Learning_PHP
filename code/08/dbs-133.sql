; 메뉴명이 D로 시작하는 모든 로우 가져오기
SELECT * FROM dishes WHERE dish_name LIKE 'D%'

; 이름이 Fried Cod, Fried Bod, Fried Nod 등인 메뉴 가져오기.
SELECT * FROM dishes WHERE dish_name LIKE 'Fried _od'
