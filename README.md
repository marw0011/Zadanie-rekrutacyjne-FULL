Zadanie rekrutacyjne:

- rejestracja z walidacją danych
- logowanie z walidacją danych
- dodawanie wniosku urlopowego z walidacją danych

Instalacja:

1/ import bazy danych. Struktura bazy danych dostępna w pliku DATABASE-schema.sql

2/ Upload kodu źródłowego w głownym katalogu na serwerze

3/ Ustawienie praw do plików:
/application/logs - 777
/application/cache - 777
/upload - 777

4/ Konfiguracja bazy danych i zaufanego hosta
/application/config/database.php - konfiguracja dostępów do bazy danych
/application/config/url.php - konfiguracja zaufanych hostów

