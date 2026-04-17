# Symfony Technical Laboratory

[![Build](https://github.com/neeftarah/DevTime/workflows/CI/badge.svg)](https://github.com/neeftarah/DevTime/actions?query=workflow%3ACI)
[![Status](https://img.shields.io/badge/Status-In_Development-yellow)](https://img.shields.io/badge/Status-In_Development-yellow)

__Objectif :__ Ce dépôt n'est __pas un produit fini__, mais un __environnement d'expérimentation__ pour l'intégration de stacks complexes sous Symfony.

__Focus :__ J'y teste différentes briques industrielles (Messaging, Search, Cache) et l'implémentation de patterns d'architecture (DDD, Hexagonale) dans un contexte multi-services Dockerisé.



## 🧰 Stack proposée (En cours d'implémentation)
### 🔙 Back-end
* PHP 8.x + Symfony 7+
* API Platform
* Doctrine (PostgreSQL)
* PHPUnit, Behat
* RabbitMQ (via Messenger)
* Redis (cache + session)
* Elasticsearch (recherche client/projet)

### 🔜 Front-end
* React (Vite)
* TypeScript
* TailwindCSS (ou Bootstrap)
* Axios / React Query
* Auth via JWT
* Cypress (tests end-to-end)

### ☁️ Infrastructure / DevOps
* Docker + Docker Compose (multi-services)
* GitHub Actions / GitLab CI
* AWS :
   * EC2 (hébergement)
   * RDS (PostgreSQL)
   * S3 (stockage facture)
   * IAM
* Sécurité OWASP (headers, inputs, auth, rate-limit)

### 🧠 Méthodologies / Bonnes pratiques à intégrer
* DDD simplifié (Bounded Context = "Gestion Client", "TimeTracking", "Facturation")
* TDD / tests unitaires sur les domaines métier
* SOLID
* Clean architecture ou hexagonale (en option)
* Gestion de projet via Kanban (GitHub Projects / Issues)

