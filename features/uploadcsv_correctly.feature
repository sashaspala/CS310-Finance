Feature: Uploading a .csv file to the system
	This feature tests regular (valid) input
	Scenario: Uploading valid .csv file
		Given I am logged in
		When I upload test.csv to csvChooser
		And I choose the special button csvSubmit
		Then I should see page http://52.11.14.115/CS310-Finance/csvhandler.php

	Scenario: Uploading valid .csv file (Checking output)
		Given I am logged in
		When I upload sampleCSV.csv to csvChooser
		And I choose the special button csvSubmit
		Then AccountsTable should have 3 rows