Feature: Remove an account
	Scenario: Pressing remove button
		Given I am logged in
		Given that account HSBC is checked 
		When I press removeAccount
		Then HSBC should be removed
		