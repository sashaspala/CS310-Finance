Given /^I am on (.*)$/ do |link|
	visit link
end

Given /^(.*)$ costs (\d+) dollars$/ do |stock, price|
	pending
end

Given /^I am logged in$/ do 
	visit '/login.php'
	fill_in('email', :with => "swag@swag.com")
	fill_in('password', :with => "swag")
	click_button('loginButton')
end

Given /^that account (.*?) is checked$/ do |accountName|
	within('AccountsTable', :text => accountName) do
		find('input.check').set(true)
	end
end

Given /^I searched the (.*?) stock$/ do |stock|
	fill_in('stock', :with => stock)
	click_button('searchbutton')
end

When /^I fill in (.*?) with (.*?)$/ do |box_name, value|
	fill_in(box_name, :with => value)
end

When /^I press (.*?)$/ do |button|
	click_button(button)
end

When /^I choose the special button (.*?)$/ do |button|
	click_on(button)
end

When /^I click (.*?)$/ do |link|
	click_link(link)
end

When /^I upload the file (.*?) to (.*?)$/ do |filePath, element|
	attach_file(element, filePath)
end



Then /^I should see page (.*?)$/ do |path|
	current_url.should == path
end

Then /^the page should have (.*?) in a title$/ do |title|
	page.should  have_text(title)
end

Then /^I should see the (.*?) stock in the (.*?) widget$/ do |stock, widget|
	#within("//div[@id={widget}]") do
	#	page.should have_text(stock)
	#end
	page.find(widget).should have_text(stock)
end

Then /^my account decreases$/ do
	find('div#accountBalanceDiv').txt[1..9].to_i.should_not equal(1000)
end

Then /^(.*?) should load$/ do |elementName|
	page.should have_text(elementName)
end

Then /^(.*?) should have (.*?) rows$/ do |elementName, size|
	page.should have_selector(elementName, :count => size)
end