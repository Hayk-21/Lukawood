<html>
<head></head>
<body>
<div style="display: table; width: 100%; text-align: center; height: 40px; background: #f2f2f2; color: #000; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
    <div style="display: table-cell; vertical-align: middle;">Новое сообщение от клиента {{ $sender['client_name'] }}</div>
</div>

<div style="background: #f2f2f2; color: #000; font-size: 14px; font-weight: bold;">Имя: {{ $sender['client_name'] }}</div>
<?php if ($sender['client_email']): ?>
<div style="background: #f2f2f2; color: #000; font-size: 14px; font-weight: bold;">Почта: {{ $sender['client_email'] }}</div>
<?php endif; ?>
<div style="background: #f2f2f2; color: #000; font-size: 14px; font-weight: bold;">Телефон: {{ $sender['client_phone'] }}</div>
<div style="color: #000; font-size: 14px;">
Сообщение: {{ $sender['client_message'] }}
</div>

<?php if ($sender['filepaths']): ?>
<?php foreach ($sender['filepaths'] as $file): ?>
<div>
    Прикрепленный файл: <a href="{{ $file }}">{{ $file }}</a>
</div>
<?php endforeach; ?>
<?php endif; ?>

</body>
</html>
