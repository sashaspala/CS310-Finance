Feature: Login with normal existing identification
	This feature should test normal login functionality
	Scenario: Logging in
		Given I am on /login.php
		Then Email should load
		And Password should load
