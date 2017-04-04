<?php
/* 한 학급에 속한 학생들의 성적과 학번을 나타낸 배열.
   학생의 이름이 키인 연관 배열을 만들고
   성적과 학번으로 구성된 연관 배열을 키에 할당한다.
*/
$students = [ 'Hong Gil Dong' => [ 'grade' => '100','id' => 271231 ],
              'Kim Soo Yong ' => [ 'grade' => '95', 'id' => 818211] ];

/* 상품의 재고 수량을 나타내는 배열.
   상품명이 키인 연관 배열을 만들고
   해당 상품의 재고 수량을 값으로 할당한다.
 */
$inventory = [ 'Wok' => 5, 'Steamer' => 3, 'Heavy Cleaver' => 3,
               'Light Cleaver' => 0 ];
/* 주간 급식 식단표 배열 - 급식의 종류와 가격을
   요일별로 나타낸다. 급식의 종류는 entree, side dish, drink 등이다.
   요일 명을 키로 연관 배열을 만들고
   cost와 가격, 각 급식과 메뉴를 키/값 쌍으로 구성한 배열을
   각 요일 키에 할당한다.
*/
$lunches = [ 'Monday' => [ 'cost' => 1.50,
                           'entree' => 'Beef Shu-Mai',
                           'side' => 'Salty Fried Cake',
                           'drink' => 'Black Tea' ],
             'Tuesday' => [ 'cost' => 2.50,
                           'entree' => 'Clear-steamed Fish',
                           'side' => 'Turnip Cake',
                           'drink' => 'Bubble Tea' ],
             'Wednesday' => [ 'cost' => 2.00,
                           'entree' => 'Braised Sea Cucumber',
                           'side' => 'Turnip Cake',
                           'drink' => 'Green Tea' ],
             'Thursday' => [ 'cost' => 1.35,
                           'entree' => 'Stir-fried Two Winters',
                           'side' => 'Egg Puff',
                           'drink' => 'Black Tea' ],
             'Friday' => [ 'cost' => 3.25,
                           'entree' => 'Stewed Pork with Taro',
                           'side' => 'Duck Feet',
                           'drink' => 'Jasmine Tea' ] ];

/* 가족 구성원을 나타내는 배열.
   구성원의 이름을 값으로 나열해
   숫자키 배열을 구성한다.
 */
$family = [ 'Bart', 'Lisa', 'Homer', 'Marge', 'Maggie' ];
/* 가족구성원의 이름, 나이, 관계를 나타낸 배열.
구성원의 이름이 키인 연관 배열을 구성하고
age와 나이, relation과 관계를 키,값 쌍으로 구성한 연관 배열을 할당한다.
 */
$family = [ 'Bart' => [ 'age' => 10,
                        'relation' => 'brother' ],
            'Lisa' => [ 'age' => 7,
                        'relation' => 'sister' ],
            'Homer' => [ 'age' => 36,
                        'relation' => 'father' ],
            'Marge' => [ 'age' => 34,
                        'relation' => 'mother' ],
            'Maggie' => [ 'age' => 1,
                        'relation' => 'self' ] ];
