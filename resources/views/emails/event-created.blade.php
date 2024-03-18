<div class="container">
    <p>Привіт, адмін</p>
    <p>Було створено новий івент в системі. Ось деталі івента:</p>
    <div class="event-details">
        <p><strong>Дата:</strong> {{ $eventData['date'] }}</p>
        <p><strong>Час:</strong> {{ $eventData['time'] }}</p>
        <p><strong>Опис:</strong> {{ $eventData['description'] }}</p>
        <p><strong>Телеграм аккаунт:</strong> {{ $eventData['social_name'] }}</p>
        <p><strong>Точка на мапі:</strong> {{ $eventData['map_point'] }}</p>
    </div>
    <p>Будь ласка, перевірте деталі в адміністративній панелі.</p>
</div>
