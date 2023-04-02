# Project Table

<h1>Hello</h1>
<span>Before starting the project, make sure that you have free ports: 8080 && 3308</span>

<h5>1. Download the project</h5>

<h5>2. Start Docker. Open the project directory in the terminal and execute the commands</h5>

<pre>
$ docker compose up -d

<span>\\entering the docker container with the project<span>
$ docker exec projectTable_app-it _app /bin/bash

</pre>

<h5>3. Execute the commands from the docker container</h5>

<pre>
$ php artisan key:generate

$ chmod -R 775 storage

$ chmod -R ugo+rw storage
</pre>

<h5>4. Rename the .env.example file to .env and connect the database</h5>

<pre>
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=projectTable_db
DB_USERNAME=root
DB_PASSWORD=root
</pre>

<h5>5. Execute the commands from the docker container</h5>

<pre>
$ php artisan migrate

$ php artisan db:seed
</pre>

<h5>If everything is correct, everything should work :)</h5>




