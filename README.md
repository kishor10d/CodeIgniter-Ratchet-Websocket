# CodeIgniter-Ratchet-Websocket
This library contains the demo of commenting/posting realtime using **CodeIgniter-Ratchet-Websocket** with **AngularJS** as client-side javascript framwork.

There is no rocket science I have done to achieve this.

As you know the CodeIgniter Directory Structure

There is a folder called
    CI-
      -application
          -third_party
            -Realtime (I put here Ratchet PHP Websocket Library)
                
I put my code here and just call that code using Javascript websocket.

### How to use :

1) Download the code.

2) You got a database script with name "realtime.sql", just import that script into your database named "realtime" (You may use your name but you have to change database name in CodeIgniter's database.php also.

3) Put the downloaded code in your web root folder (www or htdocs... whatever it may be).

4) Goto 
    application/config/constants.php
    
  Change the constant BROADCAST_URL and set it as IP of your own computer.

5) Open Command Prompt
  Move towards your webroot folder.
  We are having our websocket code at following path in our project.
  ```sh
  application/third_party/Realtime/bin/server.php
  ```
  
  We have to run that server.php file from command prompt.
  
  Just move to that folder by using "cd" command.
  ```sh
  c:/>cd xampp\htdocs\ci-ratchet\application\third_party\Realtime\bin
  ```
    
  Press enter.. Now you are in that directory specifically, just run following command.
  ```sh
  c:\xampp\htdocs\ci-ratchet\application\third_party\Realtime\bin>php server.php
  ```
  
  If its error free and noting is populated, then its supposed that you got the success to start the websocket server.
  
  6) Now run your ci-ratchet project in browser by hitting url.
  ```sh
  http://localhost/ci-ratchet/
  ```

  Once AngularJS initialize, you can see the Textbox, just start typing and press enter.... VOLLAAAAAAAAA

  Its working
  
7) Check it in another browser for realtime experience.

8) It has some permission issues on shared hosting, so it will gives throw some error. Check issue @ https://github.com/ratchetphp/Ratchet/issues/409

It will work for sure if you have same user for your VPS and shared hosting space.

### What I used?

1) **CodeIgniter** 3.x PHP Framework (https://www.codeigniter.com/) 

2) **Ratchet** - Websocket for PHP (http://socketo.me/) by Chris Boden(@boden_c)

3) **AngularJS** - A superheroic Javascript MVW Framework by Google

### Same functionality using jQuery? => Yes

I have added 3 new files in the same project for better understanding in.

application/controllers/jquery.php

application/views/jquery.php

assets/app/Connection2.js

URL : <http://localhost/ci-ratchet/index.php/jquery>
