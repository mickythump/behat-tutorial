<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends MinkContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array $parameters context parameters (set them up through behat.yml)
     */

    private $fooConfig;

    public function __construct(array $parameters)
    {
        $this->fooConfig = $parameters['foo'];
    }

    /**
     * @BeforeScenario
     */
    public function beforeScenario()
    {
        var_dump($this->getMinkParameter('base_url'));
    }

    /**
     * @return \Behat\Mink\Element\DocumentElement
     */
    protected function getPage()
    {
        return $this->getSession()->getPage();
    }

    /**
     * @When /^I fill in the search box with "([^"]*)"$/
     */
    public function iFillInTheSearchBoxWith($searchTerm)
    {
        $ele = $this->getPage()->findField('search');
        $ele->setValue($searchTerm);
    }

    /**
     * @Given /^I press search button$/
     */
    public function iPressSearchButton()
    {
        $this->getPage()->findButton('searchButton')->press();
    }
}
