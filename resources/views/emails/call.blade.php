<html>
<head></head>
<body>
<div style="display: table; width: 100%; text-align: center; height: 40px; background: #f2f2f2; color: #000; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
    <div style="display: table-cell; vertical-align: middle;">Новое сообщение c формы заказа в категории</div>
</div>

<div style="background: #f2f2f2; color: #000; font-size: 14px; font-weight: bold;">Имя: {{ $sender['client_name'] }}</div>
<div style="background: #f2f2f2; color: #000; font-size: 14px; font-weight: bold;">Телефон: {{ $sender['client_phone'] }}</div>

<?php if ($sender['filepaths']): ?>
<?php foreach ($sender['filepaths'] as $file): ?>
<div>
 Прикрепленный файл: <a href="{{ $file }}">{{ $file }}</a>
</div>
<?php endforeach; ?>
<?php endif; ?>
</body>
</html>