<?php
const SERVER = 'mysql220.phy.lolipop.lan';
const DBNAME = 'LAA1518127-final';
const USER = 'LAA1518127';
const PASS = 'PASS0317';

$connect = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';

try {
    // データベースに接続し、エラーモードを例外に設定する
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("データベース接続エラー：" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="css/top.css" />
    <title>県情報</title>
</head>

<body>
    <nav class="navbar has-shadow is-fixed-top is-flex is-justify-content-space-around" role="navigation" aria-label="main navigation">
        <div class="navbar-brand is-flex-grow-2 is-justify-content-center">
            <a class="navbar-item">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>
        </div>

        <div class="navbar-menu is-flex-grow-1 is-justify-content-center">
            <div class="navbar-item">
                <form>
                    <div class="field">
                        <div class="control has-icons-left">
                            <span class="icon is-small is-left">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </span>
                            <input placeholder="検索" type="search" class="input">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="navbar-item is-flex-grow-1 is-flex-touch is-justify-content-center is-align-items-center p-0">
            <a class="navbar-item">
                <span class="icon is-medium">
                    <i class="fas fa-lg fa-home" aria-hidden="true"></i>
                </span>
            </a>

            <a class="navbar-item is-hidden-desktop">
                <span class="icon is-medium">
                    <i class="fas fa-lg fa-search" aria-hidden="true"></i>
                </span>
            </a>

            <a class="navbar-item">
                <span class="icon is-medium">
                    <i class="fas fa-lg fa-plus-square" aria-hidden="true"></i>
                </span>
            </a>

            <a class="navbar-item">
                <span class="icon is-medium">
                    <i class="fas fa-lg fa-compass" aria-hidden="true"></i>
                </span>
            </a>

            <a class="navbar-item">
                <span class="icon is-medium">
                    <i class="fas fa-lg fa-heart" aria-hidden="true"></i>
                </span>
            </a>

            <div class="navbar-item">
                <div class="dropdown is-right">
                    <div class="dropdown-trigger">
                        <button class="button is-white has-text-grey-dark" aria-haspopup="true" aria-controls="dropdown-menu">
                            <span class="icon is-medium">
                                <i class="fas fa-lg fa-user" aria-hidden="true"></i>
                            </span>
                            <span class="icon is-medium">
                                <i class="fas fa-angle-down" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                    <div class="dropdown-menu" id="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            <a class="dropdown-item">
                                プロフィール
                            </a>
                            <a class="dropdown-item">
                                設定
                            </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item">
                                ログアウト
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>