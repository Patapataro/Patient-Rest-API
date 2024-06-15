# VirtualHealth - Sr. Software Engineer Assessment

## Running the app
#### Required:
* Composer
* Docker (MySQL)
* PHP 8

#### Steps:

1. **Install Composer Packages:**

```
composer install
```

2. **Build the Docker Mysql container.**
```
docker-compose -f mysql.yml up
```
3. **Using a database client import the db.sql file.**


4. **Run the PHP app.**
```
php -S localhost:port
```

5. **Start making requests to the Rest API.**
```
http://localhost:port/prescribed/$N
```


## App Structure
The app's structure is based on the DAO & DTO design pattern and uses a DI Container. A simple routing library is used to simplify requests and Doctrine is used as a **D**ata**B**ase **A**bstraction **L**ayer.


---  
Class Structure
---
```mermaid
flowchart  TD
id2((Client)) --> |Client sends Request| index
UserController --> id2

subgraph Rest API
	subgraph  id4[Container]
		Routes --> |Routes to a controller |UserController 
		UserController <--> UserService 
		
		subgraph  id3[User_Model]
			UserDTO --> UserService
			UserService <--> UserDaoImpl
			UserDao --> UserDaoImpl
			UserDaoImpl <--> DoctrinDBAL
		end
	end

	subgraph Vendor
		Router
		container_vendor 
		doctrin_vendor
	end
	
	index --> |Calls routes| Routes
	Routes <--> Router
	DoctrinDBAL <--> doctrin_vendor
	
end
	doctrin_vendor<--> id1[(Database)]

	style Vendor fill:#821d1d
	style id4 fill:#1d2982
	style id3 fill:#16702a

```