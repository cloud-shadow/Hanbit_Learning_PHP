// 날씨를 알아볼 지역의 우편번호
$zip = "98052";

// 날씨 조회 YQL(야후 쿼리 언어).
// 자세한 내용은 https://developer.yahoo.com/weather을 참고하세요.
$yql = 'select item.condition from weather.forecast where woeid in '.
       '(select woeid from geo.places(1) where text="'.$zip.'")';

// YQL에 들어갈 매개변수
$params = array("q" => $yql,
                "format" => "json",
                "env" => "store://datatables.org/alltableswithkeys");

// 쿼리 매개변수를 이용해 YQL URL을 생성한다.
$url = "https://query.yahooapis.com/v1/public/yql?" . http_build_query($params);
// 요청을 전송한다.
$response = file_get_contents($url);
// 응답 JSON을 가공한다.
$json = json_decode($response);
// 객체로 전환된 JSON 응답에서 필요한 값을 추출한다.
$conditions = $json->query->results->channel->item->condition;
// 날씨를 출력한다.
print "현재 시각 : {$conditions->date}, 기온 : {$conditions->temp}" .
      "날씨 : {$conditions->text}, 지역 : $zip\n";
