TestProject
===
Проект выполнен на чистом PHP 7.4 и с исрользованием PDO, классов и MVC,
с сохранением информации в базе данных MySQL.
Верстка PerfectPixel
ссылка на сайт готового проекта:
<http://f0470340.xsph.ru>
***
###Функционал проекта:
Вывод списка новостей из базы данных с показом даты, заголовка и анонса.

Реализована постраничная разбивка.

Список отсортирован по дате(новые наверху).

Можно открыть полный текст каждой новости с возможностью возврата на страницу, с какой эта новость открыта.
***

Адреса страниц:

<li> news.php - показ первой страницы новостей
<li> news.php?page='N' - показ N-ой страницы новостей
<li> view.php?id='ID' - показ одной новости
  
 ***
 
  Тэги:
  
<li> v1 - реализовано с помощью class mysqli
<li> v2 - реализовано с помощью class PDO
<li> v3 - реализовано с помощью class PDO и ООП