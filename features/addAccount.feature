Feature: Add an account
	Scenario: Pressing add button
		Given I am logged in
		When I press addAccount
		Then I should see page http://52.11.14.115/CS310-Finance/add.php