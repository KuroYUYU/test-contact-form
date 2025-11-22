<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body class="@yield('body-class')">
    @hasSection('hide-header')
    {{-- thanksでヘッダーを非表示にするときのため --}}
    @else
    <header class="header">
		<div class="header__title">FashionablyLate</div>
		<div class="header__right">
			@yield('header-buttons')
		</div>
	</header>
    @endif

	<main>
		@yield('content')
	</main>

    @yield('js')
</body>
</html>