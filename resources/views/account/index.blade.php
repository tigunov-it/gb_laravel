<h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
<br>
<a href="{{ route('admin.index') }}">Перейти в админку</a>
<br>
<a href="{{ route('account.logout') }}">Выход</a>
