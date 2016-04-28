Feature: Checking the budget info functionality
	This feature tests to see if budget details become visible on button clicks

	Scenario: Specify budget details
		Given I am logged in
		When I select Food from budgets
		And I select January from months
		And I hit the input button budgetName
		Then I should see page Then I should see page http://52.11.14.115/CS310-Finance/selectBudget.php