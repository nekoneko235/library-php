<?php

/*
三角形の成立条件
1. 3辺の長さが異なる
2. |a - b| < c < a + b が成立する
*/

/*
一般に、正整数 x, y に対し、x/y を切り上げた値は (x + y − 1)/y (ここで / は整数除算を表す) として実装す
ることができます。
*/

/*
2のx乗 >= P となるような最小の x を求めたい場合
*/
// $p = 15;
// $x = 0;

// while ($p > 1) {
//     $p = intdiv($p + 2 - 1, 2);
//     ++$x;
//     echo $p . PHP_EOL;
// }

// or

// $x = 0;
// while ($p > 2 ** $x) ++$x;

/*
縦H、横Wマスの盤面がある。ビショップが(r1, c1)にあり(r2, c2)に動ける条件は
1. r1 + c1 = r2 + c2
2. r1 - c1 = r2 - c2
のうちちょうど一方が成立することと同値
*/

/*
マンハッタン距離:
座標平面上の２点、A(a1, a2), B(b1, b2)の間の距離を
d(A,B) = |a1 - b1| + |a2 - b2|
で測ったものをマンハッタン距離と言う。
1. d(A,B) >= 0 or d(A,B) = 0 <=> A = B
2. d(A,B) = d(B,A)
3. d(A,B) + d(B,C) >= d(A,C)
*/

/*
カッコ列が正しいかどうかの判定は、以下の２条件を両方満たすことが必要十分条件になっている
1. '('と')'の数が同じである
2. 全てのi(1<=i<=N)について、左からi文字目までの時点で'('の数が')'の数以上である
*/

/*
等差数列の一般項
a(n) = a + (n-1) * d
初項 a, 公差 d
*/

/*
等差数列の和の公式
初項 a, 末項 l, 項数 n の等差数列の和 Snは
Sn = n * (a + l) / 2
初項 a, 公差 d の等差数列の初項から 第n項 までの和 Snは
Sn = {2a + (n - 1) * d} * n / 2
*/

/*
1 + 2 + 3 + ... + n = 1 / 2 * n * (n + 1)
1 + 3 + 5 + ... + (2n - 1) = n * n  // 連続したn個の奇数
1^2 + 2^2 + 3^2 + ... + n^2 = 1 / 6 * n * (n + 1) * (2n + 1)
1^3 + 2^3 + 3^3 + ... + n^3 = 1 / 4 * n^2 * (n + 1)^2
2^0 + 2^1 + 2^2 + ... + 2^N-1 = 2^N - 1
1 + p + p^2 + p^3 + ... = 1 / (1 - p) [0 < p < 1]
3^2 + 4^2 = 5^2
10^2 + 11^2 + 12^2 = 13^2 + 14^2
21^2 + 22^2 + 23^2 + 24^2 = 25^2 + 26^2 + 27^2
*/

/*
等比数列の一般項
a(n) = a * r^(n - 1)
初項 a, 公比 r
*/

/*
等比数列の和の公式
初項 a, 公比 r の等比数列の初項から第n項までの和を Sn とすると
r != 1 => Sn = a(1 - r^n) / (1 - r) = a(r^n - 1) / (r - 1)
r = 1  => Sn = na
*/

/*
Ai - Aj が X の倍数である <=> AiをXで割った余りとAjをXで割った余りが一致する
*/

/*
覚えておくべき素数一覧
2, 3, 5, 7, 11, 13, 101, 127, 10007, 100003, 1000003, 10000019, 100000007,
167772161, 469762049, 924844033, 998244353, 998244853, 1000000007, 1000000009,
1012924417, 1224736769, 2147483647, 2305843009213693951
*/

/*
PHP_INT_MAX = 9223372036854775807 (約 9*10^18)
*/

/*
３点 A(0,0), B(x1,y1), C(x2,y2)が同一直線上にあるかは、ABとACの傾きが等しいかで判定できる
y1/x1 = y2/x2 で判定すると0除算が発生するため、両辺にx1x2を掛けて、x2y1 = x1y2で判定すると良い
*/

/*
A xor C = B <=> A xor B = C
*/

/*
期待値の計算: 期待値とはある試行を行った時、その結果として得られる数値の平均値のことである。すなわち、
    試行によって得られる数値 Xが x1, x2, x3, ... , xnであり、それぞれの値をとる確率が
    p1, p2, p3, ... ,pnとすると、Xの期待値は、
    期待値 = x1 * p1 + x2 * p2 + x3 * p3 + ... + xn * pn となる
1からPまでのP種類の目が等確率ででるサイコロの出目の期待値は (1 + P) / 2 です。
*/

/*
2の倍数: 1の位が 2,4,6,8,0
3の倍数: 各桁の数字の和が 3の倍数
4の倍数: 下2桁が 4の倍数
5の倍数: 1の位が 0,5
8の倍数: 下3桁が 8の倍数
9の倍数: 各桁の数字の和が 9の倍数
11の倍数: (奇数桁目の数字の和) - (偶数桁目の数字の和) が 11の倍数
*/

/*
偶数と奇数が合計 N個ある。この中から x個 (0 <= x <= N)選び合計した数が奇数になるのは、奇数個の奇数を含む場合である
総和が奇数 ⇔ 和の中に奇数は奇数個 (偶数は何個でもよい)
総和が偶数 ⇔ 和の中に奇数は偶数個 (偶数は何個でもよい)
*/

/*
グリッド上で８方向に移動可能
$dx = {0, 1, 1, 1, 0, -1, -1, -1};
$dy = {1, 1, 0, -1, -1, -1, 0, 1};
グリッド上で４方向に移動可能
$dx = {0, 1, 0, -1};
$dy = {1, 0, -1, 0};
*/

/*
PHPで隣接リストを表現する場合
$graph = [];
$graph[1][] = 2;
$graph[2][] = 1;
$graph[4][] = 2;
$graph[2][] = 4;
$graph[3][] = 2;
$graph[2][] = 3;
var_dump($graph);

// $graph2 = [];
$graph2 = array_fill(1, 4, []);
array_push($graph2[1], 2);
array_push($graph2[2], 1);
array_push($graph2[4], 2);
array_push($graph2[2], 4);
array_push($graph2[3], 2);
array_push($graph2[2], 3);
var_dump($graph2);
*/
