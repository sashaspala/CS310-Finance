Feature: Login with normal existing identification
	This feature should test normal login functionality
	Scenario: Logging in
		Given I am on /login.php
		And I fill in inputEmail with swag@swag.com
		And I fill in inputPassword with swag
		When I press loginButton
		Then I should see page http://52.11.14.115/CS310-Finance/dashboard.php