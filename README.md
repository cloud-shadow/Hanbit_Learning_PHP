Learning PHP
==========

## 이 저장소는?

이곳은 한국어판 Learning PHP의 예제 코드 저장소입니다. [원서](http://shop.oreilly.com/product/0636920043034.do)의 예제 코드는 [여기](https://github.com/oreillymedia/Learning_PHP)에 있습니다.

<!-- 오류 신고나 정정 요청는 한빛미디어 고객게시판을 이용하거나 이메일 cloudshadow@gmail.com을 이용해주세요. 이 저장소를 직접 포크하셔서 수정한 뒤 풀 리퀘스트를 보내주셔도 됩니다.  -->

예제 코드 전체를 내려받으려면 우측 상단의 download Zip 메뉴를 이용하세요.


## 어떻게 사용하나요?

`display-code` 디렉터리의 하위디렉터리들은 Learning PHP의 각 장에 해당합니다. 예제 코드는 파일로 구분해 저장했으며 책에 등장하는 순서대로 목록을 만들어 `toc.txt` 파일에 수록해 두었습니다. `toc.txt` 파일의 첫 번째 열은 예제 번호를 나타내고, 예제 이외의 코드는 번호가 없습니다. 두 번째 열은 파일명입니다. 예를 들어 11장 net/toc.txt 파일의 내용은 다음과 같이 시작합니다.

    1	fgc-get.php
    -	fgc-get.out
    2	fgc-query-params.php
    -	fgc-query-params.out

[예제 11-1]의 코드는 net/fgc-get.php에 있습니다. 책에서 [예제 11-1] 다음에 등장하는 코드는 PHP 코드가 아니라 프로그램의 출력 결과입니다. 이 결과는 fgc-get.out에 있고, 예제가 아니므로 첫 번째 열에 번호가 없습니다. 다음 net/fgc-query-params.php 파일의 내용은 [예제 11-2]의 코드며, 출력 결과는 fgc-query-params.out에 있습니다. 

`display-code`의 파일은 책의 코드를 그대로 옮겨놓은 파일이지만 곧바로 실행할 수 없는 경우가 많습니다. 대부분 <?php 시작 태그가 생략됐고 다른 파일의 코드를 include해야 정상적으로 작동하는 코드도 있기 때문입니다. 

실제로 실행할 수 있는 형태의 코드는 `code` 디렉터리에 있습니다. `code` 디렉터리의 파일도 `display-code`와 마찬가지로 `toc.txt`파일에 목록을 수록했으며 `runner.php` 프로그램을 통해 실행할 수 있습니다. 다음 내용은 runner.php --help 명령을 실행했을 때 출력되는 내용입니다.  


```
runner.php [--chapter=CHAPTER] [--code=CODE] [--bare] [--fail-first] [--ignore-net-fail] [--cli=CLI]

Runs one or more code examples and reports on success/failure.

  --chapter=CHAPTER     Run code examples from chapter CHAPTER
  --code=CODE           Run code example CODE
  --cli=CLI             Use PHP binary installed at CLI
  --bare                Just run the code, don't report on success/failure
  --fail-first          Exit after first code failure
  --ignore-net-fail     Ignore failures that seem to be from a lack of network

PHP binary configured to run code examples:
   /usr/local/bin/php

--chapter and --code and each be specified more than once.

CHAPTER and CODE are interpreted as shell globs.

CHAPTER should just be the name of a chapter file without
extension, e.g. "datetime".

CODE should be the name of a chapter code directory, then /,
then the basename of the code example, e.g. "datetime/interval"
```

예를 들면 `runner.php --code=datetime/interval` 또는 `runner.php --chapter=datetime`처럼 실행합니다. `runner.php` 파일은 컴포저 패키지에 의존하므로, `runner.php` 파일이 있는 디렉터리에서 `composer install` 명령을 실행해 컴포저 패키지를 설치합니다. 컴포저 패키지에 의존하는 다른 예제 코드도 마찬가지입니다. `code`의 각 하위디렉터리에서 `composer install` 명령을 실행해 의존 패키지를 설치해야 합니다. 

`runner.php`는 코드를 실행하고 그 결과가 올바른지 확인합니다. 또한 특정한 문제 상황을 재현하는 예제는, 결과 오류가 예상과 일치하는지 확인합니다. 이 과정에서 많은 파일들이 보조적으로 이용됩니다.

실행할 코드가 `code/some-chapter/some-code.php`라고 할 때, `runner.php`로 해당 코드를 실행하면 다음과 같은 파일들이 실행 결과에 영향을 미칩니다. 

#### 예상 출력 및 오류를 제어하는 파일 
| 파일 | 용도
| --- | ---
| `code/some-chapter/some-code.out` | 코드 실행 출력 결과
| `code/some-chapter/some-code.err` | 코드 실행 오류
| `code/some-chapter/some-code.out.regex` | 코드 실행 출력 결과와 일치하는 정규 표현식
| `code/some-chapter/some-code.err.regex` | 코드 실행 오류와 일치하는 정규 표현식
| `code/some-chapter/some-code.out.strip` | `some-code.out`에서 모든 줄바꿈을 제거한 결과

#### 실제로 코드가 작동될 때 영향을 미치는 파일
| 파일 | 용도
| --- | ---
| `code/some-chapter/some-code.prepend.php` | 코드를 실행할 때 `auto_prepend_file` 설정으로 사용되는 파일
| `code/some-chapter/some-code.append.php` | 코드를 실행할 때 `auto_append_file` 설정으로 사용되는 파일
| `code/some-chapter/some-code.stdin` | 코드를 실행할 때 표준 입력 장치를 통해 전달되는 데이터
| `code/some-chapter/some-code.args` | 코드를 실행할 때 php에 전달할 명령행 인수. (한 줄에 하나 씩)
| `code/some-chapter/some-code.faketime` | libfaketime을 이용해 프로그램 실행 시점을 고정할 시각

#### 기타 파일
| 파일 | 용도
| --- | ---
| `code/some-chapter/some-code.server` | 코드 결과를 확인할 수 있는 PHP 서버 실행 파일. 서버는 7000번 포트로 접근합니다. 
| `code/some-chapter/some-code.server.ini` | 키=값 형태로 한 줄에 하나 씩 설정을 저장한 파일. 서버를 실행할 때 사용됩니다.
| `code/some-chapter/some-code.skip` | 실제로 실행되지 않고 문법 검사용으로만 사용되는 파일.

`*.out`와 `*.err` 파일은 특수한 문자열을 넣어 출력 결과를 편리하게 검사할 수 있습니다. `{{*}}` 문자열은 코드 파일의 전체 경로와 일치하며 `{{d}}`는 코드 파일이 있는 디렉터리(/로 끝나는)와 일치합니다. `{{!}}`는 `/.`로 시작하는 모든 경로와 일치합니다.

`runner.php`로 코드를 실행할 때 결과를 .out파일이나 .err파일과 비교하지 않으려면 `--bare` 조건을 명령줄 인수에 추가합니다. 코드 실행 결과를 비교하지만 않을 뿐, 모든 실행 과정과 결과는 동일합니다.


##### 코드를 실행할 때 준비해야할 사항

`datetime` 디렉터리의 몇몇 코드는 코드를 실행할 때 시스템의 시간을 특정한 시각으로 고정하는데, 이 때 [libfaketime](https://github.com/wolfcw/libfaketime)과 `.faketime` 파일을 사용합니다. libfaketime을 설치하면 코드 출력 결과를 예측하고 검사할 수 있으며, libfaketime이 없으면 `runner.php`는 이를 무시하고 코드를 현재 시각으로 실행합니다.


`net` 디렉터리의 몇몇 코드는 호스트명이 `php7.example.com`인 서버에 접속하는데, 이는 실제로 존재하는 서버가 아닙니다. `runner.php`는 `*.server`파일을 이용해 서버를 실행하며, 이 서버에 접속해야 예제 코드를 올바르게 실행할 수 있습니다. `php7.example.com`가 자신의 컴퓨터를 가리키도록 하려면 컴퓨터의 hosts파일에 다음과 같은 내용을 추가헤야 합니다. hosts파일은 리눅스에서 /etc/hosts, Mac OS에서 /private/etc/hosts, 윈도우에서 %windir%\System32\drivers\etc\hosts에 있습니다.


```
127.0.0.1	localhost  php7.example.com
```
