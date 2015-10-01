Feature: Search
  In order to find a word definition
  As a website user
  I need to be able to search for a word

  Background:
    Given I am on "http://en.wikipedia.org/wiki/Main_Page"

  Scenario Outline: Searching for a page that does exist
    When I fill in the search box with "<search>"
    And I press search button
    Then I should see "<expectation>"

  Examples:
    |search              | expectation                    |
    | Velociraptor       | an enlarged sickle-shaped claw |
    | Tyrannosaurus Bill | Search results                 |

  @javascript
  Scenario: Searching for a page with autocompletion
    When I fill in the search box with "Tyran"
    And I wait for the suggestions box to appear
    Then I should see "Tyrannosaurus"
