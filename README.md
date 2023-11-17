# Simple-E-commerce-with-mpesa-prompt
This is a basic ecommerce website that uses procederal php, css, and html with mpesa stk push(prompt) for checkout. It inlcudes ngrock that is a free software to expose localhost to the internet to allow for redirects after after mpesa prompt over the public internet.

# Installation
#  Database setup
To setup mysql database:
1. Download and import [ecommerce.sql](/database/ecommerce.sql) to your localhost.
2. Edit [DBConnection.php](/DBConnection.php) with your database credentials which includes: hostname, username, password, and database name.

#  Mpesa setup
To setup mpesa prompt go to your [daraja api account](https://developer.safaricom.co.ke/):
1. Navigate to myapps tab.
2. Create a sandbox app of mpesa-sandbox type.
3. Copy the created consumer key and secret to [Mpesa processing.php](/Mpesa%20processing.php).
4. Go to API'S tab and click on 'Business To Customer (B2C)'.
5. In the terminal at the left side of your screen select the sandbox app you created.
6. Alter 'amount' accordingly and 'party B' with your phone number then choose a random command id from dropdown options.
7. Then scroll down and simulate the request, if succesfull close the popup and click on 'test credentials' (left of simulate request).
8. Copy the remaining blank credentials in [Mpesa processing.php](/Mpesa%20processing.php) from the generated credentials.

#  Exposing localhost to public internet
1. Extract the ngrok zip file in the same directory.
2. Open the extracted executable file and type ```bash
ngrok http 80
```.
3. Copy the fowarding url and add the project directoy name and the php file you want to open with the url( https://....ngrok-free.app/E-Commerce/Login%20page.php) to access the website(login page) from the public internet.
