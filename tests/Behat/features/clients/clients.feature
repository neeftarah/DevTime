Feature: API Clients

  Scenario: Get all the Clients
    Given I send a "GET" request to "/api/clients"
    Then the response status code should be 200
    And the JSON should have a "member" array with 10 elements

  Scenario: Get an existing Client
    Given I send a "GET" request to "/api/clients/1"
    Then the response status code should be 200
    And the JSON should have a "name" property
    And the JSON should have a "email" property
    And the JSON should have a "companyName" property
    And the JSON should have a "projets" property

  Scenario: Trying to get unexisting Client
    Given I send a "GET" request to "/api/clients/11"
    Then the response status code should be 404

  Scenario: Create a new Client and verify it exists
    Given I send a "POST" request to "/api/clients" with body:
    """
    {
      "name": "Behat Test",
      "email": "behat.test@devtime.test",
      "companyName": "Behat Test Company",
      "createdAt": "2025-08-12T10:36:43.336Z",
      "projets": [
        "/api/projets/5",
        "/api/projets/7"
      ]
    }
    """
    Then the response status code should be 201

    Given I send a "GET" request to "/api/clients"
    Then the response status code should be 200
    And the JSON should have a "member" array with 11 elements

    Given I send a "GET" request to "/api/clients/11"
    Then the response status code should be 200
    And the JSON should have a "name" property equals to "Behat Test"
    And the JSON should have a "email" property equals to "behat.test@devtime.test"
    And the JSON should have a "companyName" property equals to "Behat Test Company"
    And the JSON should have a "projets" array with 2 elements

  Scenario: Update an existing Client and verify changes
    Given I send a "PATCH" request to "/api/clients/10" with body:
    """
    {
      "name": "Behat Patch",
      "email": "behat.patch@devtime.test",
      "updatedAt": "2025-08-12T11:36:43.336Z",
      "projets": [
        "/api/projets/7",
        "/api/projets/13",
        "/api/projets/16"
      ]
    }
    """
    Then the response status code should be 200

    Given I send a "GET" request to "/api/clients/10"
    Then the response status code should be 200
    And the JSON should have a "name" property equals to "Behat Patch"
    And the JSON should have a "email" property equals to "behat.patch@devtime.test"
    And the JSON should have a "projets" array with 3 elements

  Scenario: Delete a Client and verify it is effectively deleted
    Given I send a "DELETE" request to "/api/clients/10"
    Then the response status code should be 204

    Given I send a "GET" request to "/api/clients/10"
    Then the response status code should be 404