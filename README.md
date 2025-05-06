# DevTime
_Projet de DEMO : Gestionnaire de temps & productivité pour développeurs freelances._


##🧱 Fonctionnalités principales##
[] Gestion des clients (CRUD)
[] Gestion des projets associés à chaque client
[] Suivi du temps passé (start/stop timer + saisie manuelle)
[] Facturation automatique (génération PDF simplifiée ou CSV)
[] Notifications async (emails ou alertes via RabbitMQ)
[] Interface utilisateur simple avec React
[] API RESTful sécurisée (JWT/OAuth2)
[] Export de données (CSV/Excel)

##🧰 Stack proposée##
###🔙 Back-end###
* PHP 8.x + Symfony 6+
* API Platform
* Doctrine (PostgreSQL)
* PHPUnit, Behat
* RabbitMQ (via Messenger)
* Redis (cache + session)
* Elasticsearch (recherche client/projet)

###🔜 Front-end###
* React (Vite)
* TypeScript
* TailwindCSS (ou Bootstrap)
* Axios / React Query
* Auth via JWT
* Cypress (tests end-to-end)

###☁️ Infrastructure / DevOps###
* Docker + Docker Compose (multi-services)
* GitHub Actions / GitLab CI
* AWS :
   * EC2 (hébergement)
   * RDS (PostgreSQL)
   * S3 (stockage facture)
   * IAM
* Sécurité OWASP (headers, inputs, auth, rate-limit)

###🧠 Méthodologies / Bonnes pratiques à intégrer###
* DDD simplifié (Bounded Context = "Gestion Client", "TimeTracking", "Facturation")
* TDD / tests unitaires sur les domaines métier
* SOLID
* Clean architecture ou hexagonale (en option)
* Gestion de projet via Kanban (GitHub Projects / Issues)

