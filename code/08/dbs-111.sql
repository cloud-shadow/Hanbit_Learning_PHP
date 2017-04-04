; 칠리소스 가지 볶음의 맵기 변경
UPDATE dishes SET is_spicy = 1
           WHERE dish_name = '칠리소스 가지 볶음'

; '특별'한 치킨의 가격 인하
UPDATE dishes SET price = price - 1
           WHERE dish_name = '''특별''한 치킨'
