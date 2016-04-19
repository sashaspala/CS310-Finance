Feature: Remove an account
	Scenario: Pressing remove button
		Given I am logged in
		When I press removeAccount
		Then I should see page http://52.11.14.115/CS310-Finance/remove.php