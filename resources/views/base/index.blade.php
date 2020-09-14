<!-- 親テンプレート -->
@extends('layouts.login')

@section('title', 'ログイン')

@section('content')
    <div>
        <form method="post" action="authExec.php">
            <div>
                ログインID
                <input name="id">
            </div>
            <div>
                パスワード
                <input name="password">
            </div>
            <button type="submit" id="confirm">ログイン</button>
        </form>
    </div>
@endsection
