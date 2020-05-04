## ほめたれ！！

スラックを活用するコミュニティや職場において、"ほめたれ！！" は気軽にほめ合うことができます

誰かをほめることに心理的ハードルを感じることはないでしょうか？

* なんてほめていいのか分からない

* なんとなく照れ臭い

"ほめたれ！！" では、より簡単に、もっと楽しく、「ええやん!」を伝えます

## アプリ機能

### 1. スラッシュコマンドで褒め言葉をランダムに送信

簡単なコマンドを入力するだけで、データベースからランダムなほめ言葉を自分や相手に返します。


<img width="710" alt="スクリーンショット 2020-05-04 22 20 58" src="https://user-images.githubusercontent.com/54348732/80970076-92886c80-8e55-11ea-8ad6-6cdac56b68ed.png">

と入力すると、、、

<img width="710" alt="スクリーンショット 2020-05-04 22 18 04" src="https://user-images.githubusercontent.com/54348732/80969908-53f2b200-8e55-11ea-94a0-61721f9b3878.png">

などと返ってきます(3回入力しました)

### 2. コマンドのオプション機能の設定

コマンドには引数を渡すことができ、メンション（相手に通知を知らせる）や自分の好みに合わせたほめ方の種類を選択することができます

<img width="710" alt="スクリーンショット 2020-05-04 22 04 38" src="https://user-images.githubusercontent.com/54348732/80969334-628c9980-8e54-11ea-9cea-01eb1b9f375b.png">

<img width="710" alt="スクリーンショット 2020-05-04 22 08 41" src="https://user-images.githubusercontent.com/54348732/80969439-8fd94780-8e54-11ea-8c35-203eb98618d5.png">

を入力すると、、

<img width="710" alt="スクリーンショット 2020-05-04 22 05 54" src="https://user-images.githubusercontent.com/54348732/80969477-a089bd80-8e54-11ea-8e97-2d31b7f3b4d1.png">

### 3. その他

+ バリデーション機能の実装

指定の引数やメンション以外を入力すると、下記のように返ってきます。

<img width="710" alt="スクリーンショット 2020-05-04 22 42 01" src="https://user-images.githubusercontent.com/54348732/80972023-8c47bf80-8e58-11ea-8c2e-1e40eb83b2be.png">

+ webhook による送信チャンネルの変更

## 全体の流れ

<img width="710" alt="スクリーンショット 2020-05-05 0 51 58" src="https://user-images.githubusercontent.com/54348732/80986006-ecdff800-8e6a-11ea-8f85-0bbdb13f4b7f.png">

## こだわり、がんばったっこと

* コマンドを打つだけで、簡単にほめることができて、ユーザーの手間を極力省きました。

* 複数のオプションを設定することで、選択できるという"面白さ" も追加しました。

* webhookを使用することで、指定チャンネルにもメッセージを送れるようにしました。




## 開発環境

* Laravel Framework 7.7.1

* MariaDB 5.5.64

* VSCode（Visual Studio Code）

## 作者

* SHINYA

## License

* MIT
