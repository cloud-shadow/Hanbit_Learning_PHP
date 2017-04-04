// 웹 클라이언트의 수신 형식을 CSV file로 지정하기
header('Content-Type: text/csv');
// 별도의 프로그램으로 CSV 파일을 열도록 브라우저에 지시하기
header('Content-Disposition: attachment; filename="dishes.csv"');