# Symfony Technical Laboratory

[![Build](https://github.com/neeftarah/DevTime/workflows/CI/badge.svg)](https://github.com/neeftarah/DevTime/actions?query=workflow%3ACI)
[![Status](https://img.shields.io/badge/Status-In_Development-yellow)](https://img.shields.io/badge/Status-In_Development-yellow)

__Objectif :__ Ce dépôt n'est __pas un produit fini__, mais un __environnement d'expérimentation__ pour l'intégration de stacks complexes sous Symfony.

__Focus :__ J'y teste différentes briques industrielles (Messaging, Search, Cache) et l'implémentation de patterns d'architecture (DDD, Hexagonale) dans un contexte multi-services Dockerisé.

---

## 🧰 Stack proposée (En cours d'implémentation)
* PHP 8.x + Symfony 7+
* API Platform
* Doctrine (PostgreSQL)
* PHPUnit, Behat
* RabbitMQ (via Messenger)
* Redis (cache + session)
* Elasticsearch (recherche client/projet)
* Docker + Docker Compose (multi-services)
* GitHub Actions / GitLab CI
