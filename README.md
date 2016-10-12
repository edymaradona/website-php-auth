## Realtime HTML/REACTJS + PHP authentication
This example shows how to authenticate a Realtime security token based on a user successful login. The backend is coded in PHP and the client website uses React.

The login is mocked for demo purposes with the following credentials:

* username: demo
* password: demo
 
## Demo workflow

1. The user enters the login credentials
2. An AJAX POST request is sent to the PHP backend passing the user credentials for validation
3. The PHP backend verifies the credentials and if they are valid authenticates a Realtime token with the appropriate channel permissions
4. The authenticated token (or error) is returned in the response body of the AJAX request
5. The login page saves the token in the browser local storage and redirects the user to the chat page
6. The chat page connects to Realtime using the authenticated token saved in the local storage


## About the Realtime Framework
Part of the [The Realtime® Framework](http://framework.realtime.co/messaging), Realtime Cloud Messaging (aka ORTC) is a secure, fast and highly scalable cloud-hosted Pub/Sub real-time message broker for web and mobile apps.

If your application has data that needs to be updated in the user’s interface as it changes (e.g. real-time stock quotes or ever changing social news feed) Realtime Cloud Messaging is the reliable, easy, unbelievably fast, “works everywhere” solution.


## PHP SDK Reference
[http://messaging-public.realtime.co/documentation/php/2.1.0/Realtime.html](http://messaging-public.realtime.co/documentation/php/2.1.0/Realtime.html)


## Authors
Realtime.co
