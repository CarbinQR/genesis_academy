Для отримання курсу BTC використовується сервіс 
[CoinGecko](https://www.coingecko.com/ru/api/documentation).


Відправку email перевіряв через [MailTrap](https://mailtrap.io).

Після виконання `docker compose up` проект доступний за адресою gses2.app (за умови роутінгу на локалхост у файлі hosts). Порт 80.

### Ендпоінт `/rate`: 
Запит опційно приймає 2 параметри: 
1. `currency_gecko_id` - id необхідної валюти, який використовується у системі CoinGecko (дефолтно bitcoin);
2. `vs_currency_gecko_id` - id обмінною валюти який використовується у системі CoinGecko (дефолтно uah);

Запит проходить стандартну валідацію. Після успішної валідації, контроллер викликає екшен в якому відправляється запит до системи CoinGecko. Якщо запит успішний - повертається актуальний курс, в іншому випадку повертається ексепшен з кодом 400.

### Ендпоінт `/subscribe`: 
Приймає обов'язковий параметр email. Запит проходить стандартну валідацію (перевірку за стандартом RFC2822 не додавав). Після успішної валідації, контроллер викликає екшен в якому 
перевіряє наявність каталогу де зберігається файл з email адресами. Якщо каталогу не існує, він створюється з правами доступу 700. Далі або відкривається існуючий файл, або створюється новий
з правом на запис та читання, з нього витягуються записи в масив і відбувається перевірка на наявність нового email адресу у масиві. Коли перевірка повртеє true, додаток викидає ексепшен (код 409), інакше - 
email адреса додається в кінець файла, файл закривається а додаток повертає повідомлення про успішне додавання запису. 

### Ендпоінт `/sendEmails`: 
Після виконання запиту, контроллер викликає екшен з ендпоінту `/rate` з дефолтними валютами (BTC та UAH) який повертає актуальний курс.
Далі цей курс передається в екшен для відправки листів. Екшен відкриває файл з адресами, адреси збираються у загальний масив, далі в процессі 
ітерації елементів масива - на кожен елемент виконується колбек для відправки листа.
