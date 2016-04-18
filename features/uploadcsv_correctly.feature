Feature: Uploading a .csv file to the system
	This feature tests regular (valid) input
	Scenario: Uploading valid .csv file
		Given I am logged in
		When I choose the special button csvUpload
		And I choose the special button csvSubmit
		Then I should see page http://52.11.14.115/CS310-Finance/loginHandler.php

	Scenario: Uploading valid .csv file (Checking output)
		Given I am logged in
		When I choose the special button csvUpload
		And I choose the special button csvSubmit
		Then AccountsTable should have 3 rows