#以下に開発に関する詳細を記述しています､確認して実装してください
"/home/nanashi/coachtech/laravel/freshpick/docs"

#コーディング時の遵守事項

- 保守､､拡張性､可読性の高いコードを書くこと
- {!importanto}は使用しないこと
- BEMに則ること

#記述ルール

- モデル名: アッパーキャメル（例: Contact.php）
- コントローラー名: アッパーキャメル（例: ContactController.php）
- フォームリクエスト名: アッパーキャメル（例: ContactRequest.php）
- マイグレーションファイル名: スネークケース（例: create_contacts_table.php）
- シーディングファイル名: アッパーキャメル（例: ContactsTableSeeder.php）

#下記の情報に対して、ダミーデータを作成

1. 商品情報のダミーデータを10件作成
2. 季節情報(春・夏・秋・冬)のダミーデータを4件作成
ダミーデータ参照場所 "/home/nanashi/coachtech/laravel/freshpick/docs/dummy-data"