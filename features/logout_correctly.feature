Feature: Check to make sure correct login works
	Scenario: Check logout
		Given I am on /dashboard.php
		When I choose the special button logout
		Then I should see page http://52.11.14.115/CS310-Finance/login.php
