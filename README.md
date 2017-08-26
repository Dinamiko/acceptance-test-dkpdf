# DK PDF Acceptance Test Suite 

A testing environment including Codeception, Selenium Chrome and WordPress.

### Start
`$ docker-compose up -d`

### Run Tests
`$ docker-compose run --rm codecept run`

`$ docker-compose run --rm codecept run acceptance some-folder/Some_Class_Cest:some_function --steps`

### Stop
`$ docker-compose down`

### Mac: use Docker Toolbox instead of Docker for Mac.
[Docker for Mac](https://docs.docker.com/docker-for-mac/networking/#i-cannot-ping-my-containers) is unable to route traffic to containers, and from containers back to the host. 

Use [Docker Toolbox](https://www.docker.com/products/docker-toolbox) virtual machine IP `192.168.99.100`, for example: `http://192.168.99.100:8000`.

