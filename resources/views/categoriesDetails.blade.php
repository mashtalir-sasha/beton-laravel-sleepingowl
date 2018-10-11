<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>{{ $category['name'] }}</title>
</head>
<body>
	<div class="modal-good">
		<div class="row align-items-center">
			<div class="col-sm-6">
				<h3 class="modal-good__ttl">Полный список изделий</h3>
				<div class="modal-good-block">
					<h4 class="modal-good-block__ttl">{{ $category['name'] }}</h4>
					<img src="/{{ $category['file'] }}" class="modal-good-block__img" alt="good">
				</div>
			</div>
			<div class="col-sm-6">
				<h4 class="modal__ttl txal">Вы можете скачать на телефон, либо компьютер все наименования товаров</h4>
				<form class="modal-form form_check" autocomplete="off" data-good="true" data-link="{{ $category['link'] }}">
					<input type="hidden" name="title" value="Скачать все наименования товаров {{ $category['name'] }}">
					<div class="rline">
						<p class="modal-form__name">Ваше имя</p>
						<input type="text" name="name" class="field rfield">
					</div>
					<div class="rline">
						<p class="modal-form__name">Телефон / Viber</p>
						<input type="text" name="phonenumb" class="field rfield phonefield">
					</div>
					<button type="submit" class="modal-form__btn btnsubmit">Скачать прайс</button>
				</form>
			</div>
		</div>
	</div>

	<script src="/js/scripts.min.js"></script>
</body>
</html>