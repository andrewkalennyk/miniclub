@component('mail::message')
# Привіт {{$santa->name}},

Раді повідомити, що твій учасник вирішив додати трохи данних про себе \
Ось деяка інформація, яка може тобі допомогти підібрати чудовий подарунок для нього/неї:

Нік телеграму: {{$santaInfo->social_name}}

Додаткові Вказівки: {{strip_tags($santaInfo->about_description_details)}}



Будь ласка, пам'ятай про бюджет від 500 до 1000 гривень та стеж за тим, щоб твій подарунок створив святковий настрій для твого "Щасливчика"! \
Нагадаю Дата Розіграшу 14 січня 2024 року.

Не забудь дотримуватися таємності та насолоджуйся процесом подарункового пошуку!

З Найкращими Побажаннями,
Організатори Таємного Санти
@endcomponent