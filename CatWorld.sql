drop database if exists CatWorld;
create database CatWorld;
 
USE CatWorld; 
 
 
CREATE table Suppliers( 
 
Supplier_id int not null auto_increment, 
 
Supplier_name varchar(60), 
 
type_of_supply enum("Information","Meat","Souvenir","Milk"), 
 
telephone varchar(13), 
 
address varchar(60), 
 
supply_date date,

email varchar (35),

password varchar (10),
 
primary key(supplier_id) 
 
); 
 
  
 
  
 
CREATE table Cat_info( 
 
cat_id int not null auto_increment, 
 
cat_name varchar(60), 
 
breed  varchar(20), 
 
cat_color varchar(60), 
 
gender varchar(10), 

origin varchar (20), 
 
age_in_years int not null, 
 
Capture_date varchar(20), 
 
Supplier_id int not null, 
 
food_supplied varchar(60), 
 
primary key(cat_id), 
 
foreign key (Supplier_id) references Suppliers(Supplier_id) 
 
); 
 
  
 
  
 
  
 
CREATE table Employee( 
 
employee_id int not null auto_increment, 
 
employee_name varchar(60), 
 
telephone varchar(13), 
 
DOB date, 
 
cage_assgn varchar(20), 
 
salary decimal(6,2), 
 
email varchar(60), 

password varchar (10),
 
primary key(employee_id) 
 
); 
 
  
 
  
 
CREATE table Customer( 
 
customer_id int not null auto_increment, 
 
customer_name varchar(60), 
 
telephone varchar(13), 
 
address varchar(60), 
 
cat_name varchar(60), 

email varchar (35),

password varchar (10),
 
primary key(customer_id)
 
); 
 
  
 
  
 
  
 
Create table Inventory( 
 
inventory_id int not null auto_increment, 
 
cat_id int not null,
 
breed char(20),
 
section enum("North","South","East","West"),
 
avg_weight char(10),
 
avg_weight_of_foodIntake char(10),
 
primary key(inventory_id),
 
foreign key (cat_id) references Cat_info(cat_id)
); 
 
 
 
Create table Souvenirs(  
 
souvenir_id int not null auto_increment,  
 
souvenir_name varchar(50),  
 
supplier_id int not null,  
 
Souvenir_avl int,  
 
Souvenir_sld int,  
 
primary key(souvenir_id),  
 
foreign key (supplier_id) references Suppliers(supplier_id)   
 
);  
 
  
 
  
 
  
 
Create table Category(  
 
category_id int not null auto_increment,  
 
category_name enum("Toy","Artefact","Stationery","Printed"),  
 
souvenir_id int,  
 
primary key(category_id),  
 
foreign key (souvenir_id) references Souvenirs(souvenir_id)  
 
);  
 
 
 
 
Create table Orders(  
 
order_id int not null auto_increment,  
 
inventory_id int not null,  
 
customer_id int not null, 
 
order_type enum("Online","In-person"),
 
primary key(order_id),  
 
foreign key (inventory_id) references Inventory(inventory_id), 
 
foreign key (customer_id) references Customer(customer_id) 
 
);  
 
 
 
 
Create table Details(  
 
detail_id int not null auto_increment,  
 
order_id int not null,  
 
order_date date,  
 
order_time time,  
 
total_price varchar(10),  
 
delivery_mode enum ("Customer Pickup","Company Delivery"),  
 
primary key(detail_id),  
 
foreign key (order_id) references Orders(order_id) 
 
);  
 
 
 
Create table Payment(  
 
payment_id int not null auto_increment, 
 
order_id int not null, 
 
payment_mode enum("Mobile Money","Debit card", "Credit card", "Cash"), 
 
payment_date date, 
 
primary key(payment_id), 
 
foreign key (order_id) references Orders(order_id) 
 
); 
 
 
 
 
CREATE table Cat_upkeep( 
 
cat_id int not null, 
 
cage_no int not null, 
 
recnt_vaccne_date date, 
 
vaccne_name varchar(60), 
 
foreign key (cat_id) references Cat_info(cat_id)
 
); 
 
 
 
Create table SalesRep(  
 
employee_id int not null,  
 
SalesRep_salary decimal(9,2),  
 
foreign key (employee_id) references Employee(employee_id)  
 
);  
 
 
  
 
Create table Findings( 
 
cat_id int not null, 
 
cat_name varchar(60), 
 
Supplier_id int not null, 
 
Information char(200), 
 
foreign key (cat_id) references Cat_info(cat_id), 
 
foreign key (supplier_id) references Suppliers(supplier_id)   
 
); 
 
 
  
 
CREATE table HeadOfDepartment( 
 
employee_id int not null, 
 
HOD_bonus decimal(9,2), 
 
foreign key (employee_id) references Employee(employee_id) 
 
); 
 
 
 
CREATE table InventoryManager( 
 
employee_id int not null, 
 
InvMan_allowances decimal(6,2), 
 
foreign key (employee_id) references Employee(employee_id) 
 
); 
 
 
 
 
  
 /* 
INSERT INTO Suppliers(Supplier_name,type_of_supply, telephone,address,supply_date) VALUES ("Wild Cat Scavengers","Information","+233278752366","Manovia(Liberty St.) Dansoman - Accra","2021-02-18"); 
 
INSERT INTO Suppliers(Supplier_name,type_of_supply, telephone,address,supply_date) VALUES ("Alhaji Butchery","Meat","+233245678931", "Nima juntion - Accra","2020-12-14"); 
 
INSERT INTO Suppliers(Supplier_name,type_of_supply, telephone,address,supply_date) VALUES ("Markventor","Information","+233278271845","Tse-Addo - Accra","2021-02-18"); 
 
INSERT INTO Suppliers(Supplier_name,type_of_supply, telephone,address,supply_date) VALUES ("Cat-er","Souvenir","+233245678294","Cantoments - Accra","2021-01-05"); 
 
INSERT INTO Suppliers(Supplier_name,type_of_supply, telephone,address,supply_date) VALUES ("Abochi","Meat","+233244448574","Spintex - Accra","2021-01-30"); 
 
INSERT INTO Suppliers(Supplier_name,type_of_supply, telephone,address,supply_date) VALUES ("Meat Rearer","Meat","+233278752366","West Legon - Accra","2021-02-18"); 
 
INSERT INTO Suppliers(Supplier_name,type_of_supply, telephone,address,supply_date) VALUES ("Gyakie infohub","Information","+233278752366","Teshie Nungua - Accra","2021-02-18"); 
 
INSERT INTO Suppliers(Supplier_name,type_of_supply, telephone,address,supply_date) VALUES ("Everything Toys","Souvenir","+233278752366","Labone - Accra","2021-02-18"); 
 
INSERT INTO Suppliers(Supplier_name,type_of_supply, telephone,address,supply_date) VALUES ("Milky Way","Milk","+233278752366","Achimota - Accra","2021-02-18"); 
 
INSERT INTO Suppliers(Supplier_name,type_of_supply, telephone,address,supply_date) VALUES ("Printsters","Souvenir","+233278752366","East-Airport - Accra","2021-02-18"); 
 
 
  
 
 
INSERT INTO Cat_info(cat_name,breed,cat_color,gender,age_in_years,origin,Capture_date,Supplier_id,food_supplied) VALUES("Kiera","lioness","light brown","female",1,"Kenya","2019-05-23",9,"Milk"); 
 
INSERT INTO Cat_info(cat_name,breed,cat_color,gender,age_in_years,origin,Capture_date,Supplier_id,food_supplied) VALUES("Calcius","tiger","white & black","male",5,"Japan","2017-09-15",2,"Meat"); 
 
INSERT INTO Cat_info(cat_name,breed,cat_color,gender,age_in_years,origin,Capture_date,Supplier_id,food_supplied) VALUES("Killer","lion","brown & tan","male",7,"South Africa","2015-12-01",5,"Meat"); 
 
INSERT INTO Cat_info(cat_name,breed,cat_color,gender,age_in_years,origin,Capture_date,Supplier_id,food_supplied) VALUES("Speedy","cheetah","golden yellow & black","female",4,"Zimbabwe","2020-10-13",6,"Meat"); 
 
INSERT INTO Cat_info(cat_name,breed,cat_color,gender,age_in_years,origin,Capture_date,Supplier_id,food_supplied) VALUES("Infinity","leopard","cream yellow & black","female",4,"Uganda","2019-05-23",5,"Meat"); 
 
INSERT INTO Cat_info(cat_name,breed,cat_color,gender,age_in_years,origin,Capture_date,Supplier_id,food_supplied) VALUES("Amba","jaguar","black","female",6,"Indonesia","2018-06-10",6,"Meat"); 
 
INSERT INTO Cat_info(cat_name,breed,cat_color,gender,age_in_years,origin,Capture_date,Supplier_id,food_supplied) VALUES("Aliki","puma","tan","male",1,"Indonesia","2018-06-10",9,"Milk");  
 
INSERT INTO Cat_info(cat_name,breed,cat_color,gender,age_in_years,origin,Capture_date,Supplier_id,food_supplied) VALUES("Bridge","tiger","orange & black","male",1,"Indonesia","2018-06-10",9,"Milk");  
 
INSERT INTO Cat_info(cat_name,breed,cat_color,gender,age_in_years,origin,Capture_date,Supplier_id,food_supplied) VALUES("Corvette","panther","black","female",8,"Indonesia","2018-06-10",2,"Meat");  
 
INSERT INTO Cat_info(cat_name,breed,cat_color,gender,age_in_years,origin,Capture_date,Supplier_id,food_supplied) VALUES("Ariel","lion","white","male",5,"Japan","2019-09-19",2,"Meat");  
  
 
  
 
INSERT INTO Employee(employee_name,telephone,DOB,cage_assgn,salary,email) VALUES ("Kofi Aboagye", "+233278374698","1991-07-19",23,1700.00,"kofia@gmail.com"); 
 
INSERT INTO Employee(employee_name,telephone,DOB,cage_assgn,salary,email) VALUES ("Eleanor Mogeri", "+233234564660","1998-04-23",36,1400.50,"eleanora@gmail.com"); 
 
INSERT INTO Employee(employee_name,telephone,DOB,cage_assgn,salary,email) VALUES ("Keli Nutakor", "+233245789667","2000-07-18",20,2300.50,"kelinut@gmail.com"); 
 
INSERT INTO Employee(employee_name,telephone,DOB,cage_assgn,salary,email) VALUES ("Abena Afriyie", "+233270272600","1995-02-01",15,1400.50,"abenaaf@gmail.com"); 
 
INSERT INTO Employee(employee_name,telephone,DOB,cage_assgn,salary,email) VALUES ("George Bush", "+233244558823","1997-09-25",12,1400.50,"georgeb@gmail.com"); 
 
INSERT INTO Employee(employee_name,telephone,DOB,cage_assgn,salary,email) VALUES ("Kimora Wesom", "+233554499846","2001-01-22",53,1400.50,"kimoraw@gmail.com"); 
 
INSERT INTO Employee(employee_name,telephone,DOB,cage_assgn,salary,email) VALUES ("Ebo Aqua", "+233554327846","1993-05-22",21,1300.50,"eboaqua@gmail.com"); 
  
INSERT INTO Employee(employee_name,telephone,DOB,cage_assgn,salary,email) VALUES ("Daniel Steel", "+233554499846","2000-08-24",31,1400.50,"dansteel@gmail.com"); 
 
INSERT INTO Employee(employee_name,telephone,DOB,cage_assgn,salary,email) VALUES ("Steve Kroft", "+233558888846","2000-04-26",17,1400.50,"stevkro@gmail.com"); 
 
INSERT INTO Employee(employee_name,telephone,DOB,cage_assgn,salary,email) VALUES ("Elvis Deux", "+233554457849","1998-02-22",29,1400.50,"elvdeux@gmail.com"); 
  
 
 
INSERT INTO Customer(customer_name,telephone,address,cat_name) VALUES ("Kwame Ato","+233554327586","Burma Camp - Accra","Speedy");  
 
INSERT INTO Customer(customer_name,telephone,address,cat_name) VALUES ("Lizbeth Cole","+233574827586","Awosie - Accra","Calcius");  
 
INSERT INTO Customer(customer_name,telephone,address,cat_name) VALUES ("Mary Otchere","+233248576586","Airport Residential Area - Accra","Kiera");  
 
INSERT INTO Customer(customer_name,telephone,address,cat_name) VALUES ("Yaw Kross","+233244327586","Spintex - Accra","Infinity");  
 
INSERT INTO Customer(customer_name,telephone,address,cat_name) VALUES ("Delilah Jones","+233234757586","Teshie Nungua - Accra","Amba");  
 
INSERT INTO Customer(customer_name,telephone,address,cat_name) VALUES ("Vera Akwei","+233559748328","Dansoman(SSNIT) - Accra","Bridge"); 
 
INSERT INTO Customer(customer_name,telephone,address,cat_name) VALUES ("John Kennedy","+23323982785","Tse-Addo - Accra", "Killer");  
 
INSERT INTO Customer(customer_name,telephone,address,cat_name) VALUES ("Eyram Adjovi","+233279823579","Trassaco-Valley(Plot 1) - Accra","Ariel");  
 
INSERT INTO Customer(customer_name,telephone,address,cat_name) VALUES ("Nii Amon Atukweifio","+233268794125","Ashongmang Estate - Accra","Aliki");  
 
INSERT INTO Customer(customer_name,telephone,address,cat_name) VALUES ("Erica Sackey","+233279842578","East-Airport - Accra","Corvette");   
 
  
INSERT INTO Inventory(id,breed,section,avg_weight,avg_weight_of_foodIntake) VALUES (1,"lioness","North","130 kg","40 kg"); 
 
INSERT INTO Inventory(id,breed,section,avg_weight,avg_weight_of_foodIntake) VALUES (2,"tiger","South","246 kg","58 kg"); 
 
INSERT INTO Inventory(id,breed,section,avg_weight,avg_weight_of_foodIntake) VALUES (3,"lion","North","190 kg","40 kg"); 
 
INSERT INTO Inventory(id,breed,section,avg_weight,avg_weight_of_foodIntake) VALUES (4,"cheetah","East","65 kg","25 kg"); 
 
INSERT INTO Inventory(id,breed,section,avg_weight,avg_weight_of_foodIntake) VALUES (5,"leopard","East","31 kg","20 kg"); 
 
INSERT INTO Inventory(id,breed,section,avg_weight,avg_weight_of_foodIntake) VALUES (6,"jaguar","East","90 kg","30 kg"); 
 
INSERT INTO Inventory(id,breed,section,avg_weight,avg_weight_of_foodIntake) VALUES (7,"puma","West","93 kg","31 kg"); 
 
INSERT INTO Inventory(id,breed,section,avg_weight,avg_weight_of_foodIntake) VALUES (8,"tiger","South","246 kg","58 kg"); 
 
INSERT INTO Inventory(id,breed,section,avg_weight,avg_weight_of_foodIntake) VALUES (9,"panther","West","88 kg","29 kg"); 
 
INSERT INTO Inventory(id,breed,section,avg_weight,avg_weight_of_foodIntake) VALUES (10,"lion","North","190 kg","40 kg"); 
 
 
INSERT INTO Souvenirs(souvenir_name,supplier_id,Souvenir_avl,Souvenir_sld) VALUES ("Cat toys",8,120,80); 
 
INSERT INTO Souvenirs(souvenir_name,supplier_id,Souvenir_avl,Souvenir_sld) VALUES ("Wild Cat Stickers",10,400,280); 
 
INSERT INTO Souvenirs(souvenir_name,supplier_id,Souvenir_avl,Souvenir_sld) VALUES ("Cat-shaped mugs",4,10,37); 
 
INSERT INTO Souvenirs(souvenir_name,supplier_id,Souvenir_avl,Souvenir_sld) VALUES ("Notepads",10,1000,780); 
 
INSERT INTO Souvenirs(souvenir_name,supplier_id,Souvenir_avl,Souvenir_sld) VALUES ("Cat dummies",8,120,56); 
 
INSERT INTO Souvenirs(souvenir_name,supplier_id,Souvenir_avl,Souvenir_sld) VALUES ("Wild Cat-printed phone covers",10,100,70); 
 
INSERT INTO Souvenirs(souvenir_name,supplier_id,Souvenir_avl,Souvenir_sld) VALUES ("Cat-shaped bowls",4,20,80); 
 
INSERT INTO Souvenirs(souvenir_name,supplier_id,Souvenir_avl,Souvenir_sld) VALUES ("Cat-shaped cutlery",4,12,28); 
 
INSERT INTO Souvenirs(souvenir_name,supplier_id,Souvenir_avl,Souvenir_sld) VALUES ("Footballs",8,140,200); 
 
INSERT INTO Souvenirs(souvenir_name,supplier_id,Souvenir_avl,Souvenir_sld) VALUES ("Toy Phones",8,2,9); 
 
 
INSERT INTO Category(category_name,souvenir_id) VALUES ("Toy",1);
 
INSERT INTO Category(category_name,souvenir_id) VALUES ("Printed",2);
 
INSERT INTO Category(category_name,souvenir_id) VALUES ("Artefact",3);
 
INSERT INTO Category(category_name,souvenir_id) VALUES ("Stationery",4);
 
INSERT INTO Category(category_name,souvenir_id) VALUES ("Toy",5);
 
INSERT INTO Category(category_name,souvenir_id) VALUES ("Printed",6);
 
INSERT INTO Category(category_name,souvenir_id) VALUES ("Artefact",7);
 
INSERT INTO Category(category_name,souvenir_id) VALUES ("Artefact",8);
 
INSERT INTO Category(category_name,souvenir_id) VALUES ("Toy",9);
 
INSERT INTO Category(category_name,souvenir_id) VALUES ("Toy",10);
 
 
INSERT INTO Orders(inventory_id,customer_id,order_type) VALUES (1,1,"Online");  
 
INSERT INTO Orders(inventory_id,customer_id,order_type) VALUES (2,2,"Online");  
 
INSERT INTO Orders(inventory_id,customer_id,order_type) VALUES (3,3,"In-person");  
 
INSERT INTO Orders(inventory_id,customer_id,order_type) VALUES (4,4,"Online");  
 
INSERT INTO Orders(inventory_id,customer_id,order_type) VALUES (5,5,"In-person");  
 
INSERT INTO Orders(inventory_id,customer_id,order_type) VALUES (6,6,"In-person");  
 
INSERT INTO Orders(inventory_id,customer_id,order_type) VALUES (7,7,"In-person");  
 
INSERT INTO Orders(inventory_id,customer_id,order_type) VALUES (8,8,"Online");  
 
INSERT INTO Orders(inventory_id,customer_id,order_type) VALUES (9,9,"In-person");  
 
INSERT INTO Orders(inventory_id,customer_id,order_type) VALUES (10,10,"Online");  
 
 
INSERT INTO Details(order_id,order_date,order_time,total_price,delivery_mode) VALUES (1,"2021-01-15","14:59:53","14000.00","Customer Pickup");  
 
INSERT INTO Details(order_id,order_date,order_time,total_price,delivery_mode) VALUES (2,"2020-08-21","15:20:24","14000.00","Customer Pickup");   
 
INSERT INTO Details(order_id,order_date,order_time,total_price,delivery_mode) VALUES (3,"2021-09-15","12:29:53","14000.00","Company Delivery");   
 
INSERT INTO Details(order_id,order_date,order_time,total_price,delivery_mode) VALUES (4,"2019-11-19","07:41:00","14000.00","Customer Pickup");   
 
INSERT INTO Details(order_id,order_date,order_time,total_price,delivery_mode) VALUES (5,"2021-03-25","12:44:44","14000.00","Company Delivery");   
 
INSERT INTO Details(order_id,order_date,order_time,total_price,delivery_mode) VALUES (6,"2020-07-17","16:10:02","14000.00","Company Delivery");   
 
INSERT INTO Details(order_id,order_date,order_time,total_price,delivery_mode) VALUES (7,"2021-04-24","17:02:40","14000.00","Company Delivery");   
 
INSERT INTO Details(order_id,order_date,order_time,total_price,delivery_mode) VALUES (8,"2020-12-10","13:13:20","14000.00","Customer Pickup");   
 
INSERT INTO Details(order_id,order_date,order_time,total_price,delivery_mode) VALUES (9,"2021-02-07","11:23:05","14000.00","Company Delivery");   
 
INSERT INTO Details(order_id,order_date,order_time,total_price,delivery_mode) VALUES (10,"2020-08-13","09:51:52","14000.00","Customer Pickup");   
 
 
INSERT INTO Payment(order_id,payment_mode,payment_date) VALUES (1,"Cash","2021-01-15");  
 
INSERT INTO Payment(order_id,payment_mode,payment_date) VALUES (2,"Mobile Money","2020-08-21");  
 
INSERT INTO Payment(order_id,payment_mode,payment_date) VALUES (3,"Cash","2021-09-15");  
 
INSERT INTO Payment(order_id,payment_mode,payment_date) VALUES (4,"Cash","2019-11-19");  
 
INSERT INTO Payment(order_id,payment_mode,payment_date) VALUES (5,"Credit card","2021-03-25");  
 
INSERT INTO Payment(order_id,payment_mode,payment_date) VALUES (6,"Debit card","2020-07-17");  
 
INSERT INTO Payment(order_id,payment_mode,payment_date) VALUES (7,"Cash","2021-04-24");  
 
INSERT INTO Payment(order_id,payment_mode,payment_date) VALUES (8,"Mobile Money","2020-12-10");  
 
INSERT INTO Payment(order_id,payment_mode,payment_date) VALUES (9,"Debit card","2021-02-07");  
 
INSERT INTO Payment(order_id,payment_mode,payment_date) VALUES (10,"Credit card","2020-08-13");  
 
 
INSERT INTO Cat_upkeep(id,cage_no,recnt_vaccne_date,vaccne_name) VALUES (1,23,"2021-01-15","Canine distemper virus vaccine");  
 
INSERT INTO Cat_upkeep(id,cage_no,recnt_vaccne_date,vaccne_name) VALUES (2,36,"2021-01-16","Canarypox vectored vaccine");  
 
INSERT INTO Cat_upkeep(id,cage_no,recnt_vaccne_date,vaccne_name) VALUES (3,20,"2021-02-01","Canine distemper virus vaccine");  
 
INSERT INTO Cat_upkeep(id,cage_no,recnt_vaccne_date,vaccne_name) VALUES (4,15,"2021-02-12","Canine distemper virus vaccine");  
 
INSERT INTO Cat_upkeep(id,cage_no,recnt_vaccne_date,vaccne_name) VALUES (5,12,"2021-02-20","Multivalent clostridial vaccine");  
 
INSERT INTO Cat_upkeep(id,cage_no,recnt_vaccne_date,vaccne_name) VALUES (6,53,"2021-03-02","Canine distemper virus vaccine");  
 
INSERT INTO Cat_upkeep(id,cage_no,recnt_vaccne_date,vaccne_name) VALUES (7,21,"2021-03-13","Canine distemper virus vaccine");  
 
INSERT INTO Cat_upkeep(id,cage_no,recnt_vaccne_date,vaccne_name) VALUES (8,31,"2021-03-25","Canarypox vectored vaccine");  
 
INSERT INTO Cat_upkeep(id,cage_no,recnt_vaccne_date,vaccne_name) VALUES (9,17,"2021-03-29","Canine distemper virus vaccine");  
 
INSERT INTO Cat_upkeep(id,cage_no,recnt_vaccne_date,vaccne_name) VALUES (10,29,"2021-04-15","Multivalent clostridial vaccine");  
 
 
 
INSERT INTO SalesRep(employee_id,SalesRep_salary) VALUES (2,1400.50);  
 
INSERT INTO SalesRep(employee_id,SalesRep_salary) VALUES (6,1400.50);  
 
INSERT INTO SalesRep(employee_id,SalesRep_salary) VALUES (8,1400.50);  
 
 
INSERT INTO Findings(id,cat_name,Supplier_id,Information) VALUES (2,"Calcius",7,"The same breed of this cat was found lurking in the forests of Southern Japan; it is a female.");   
 
INSERT INTO Findings(id,cat_name,Supplier_id,Information) VALUES (3,"Killer",3,"This breed are known to be very good swimmers and do very well in aquatic habitats."); 
 
INSERT INTO Findings(id,cat_name,Supplier_id,Information) VALUES (4,"Speedy",7,"This breed are known to be the fastest animals on the planet");   
 
INSERT INTO Findings(id,cat_name,Supplier_id,Information) VALUES (6,"Amba",1,"This very jaguar is the last of her kind in the entire world");   
 
INSERT INTO Findings(id,cat_name,Supplier_id,Information) VALUES (8,"Bridge",3,"A group of hunters invaded the origin of this cat. Most of his family did not make it - making him one of the last of his species.");   
 
 
INSERT INTO HeadOfDepartment(employee_id,HOD_bonus) VALUES (1,1000.00);  
 
INSERT INTO HeadOfDepartment(employee_id,HOD_bonus) VALUES (3,1250.50);  
 
 
INSERT INTO InventoryManager(employee_id,InvMan_allowances) VALUES (4,500.00);
 
INSERT INTO InventoryManager(employee_id,InvMan_allowances) VALUES (5,100.00); 
 
INSERT INTO InventoryManager(employee_id,InvMan_allowances) VALUES (7,230.00);  
 
INSERT INTO InventoryManager(employee_id,InvMan_allowances) VALUES (9,70.80);  
 
INSERT INTO InventoryManager(employee_id,InvMan_allowances) VALUES (10,150.00);  
  



USE CATWORLD_74812023;


-- INDEXES
# 1.

-- create an index on order dates in ascending order.
CREATE INDEX date_index ON Details (order_date asc);
 

# 2.
-- create an index on average food weight of cats to check their food intake.
CREATE INDEX avg_foodWeight_Idx ON Inventory(avg_weight_of_foodIntake);

# 3.
-- create an index on genders of cats to determine the most gender population.
CREATE INDEX Gender_index ON Cat_info (gender);


# 4.
-- create an index on Employees and their contact to ensure easier communication.
CREATE INDEX Employee_Contact_idx ON Employee(employee_name,telephone,email);




-- QUERIES
## 1. TO FIND THE CUSTOMER NAMES AND THEIR ORDER TYPES ALONG WITH THE ORDER ID.
SELECT Orders.order_id, Customer.customer_name, Orders.order_type
FROM Orders
INNER JOIN Customer ON Orders.customer_id=Customer.customer_id;


## 2. TO DETERMINE THE SOUVENIRS IN SOLD AND IN STOCK BY THEIR CATEGORY NAMES
SELECT Souvenirs.souvenir_name, Category.category_name, Souvenirs.Souvenir_avl, Souvenirs.Souvenir_sld
FROM Souvenirs
INNER JOIN Category ON Souvenirs.souvenir_id = Category.souvenir_id
GROUP BY souvenir_name;

## 3.TO FIND THE SUM OF SOUVENIRS AVAILABLE AND THE AVERAGE AMOUNT OF SOUVENIRS SOLD FROM SUPPLIER WITH ID-10.
SELECT SUM(Souvenir_avl), AVG(Souvenir_sld)
FROM Souvenirs
WHERE supplier_id LIKE '10';


## 4. TO ALLOW EMPLOYEES TRACE/CONTACT CUSTOMERS WHO PLACED ORDERS TO ADOPT PARTICULAR WILD CATS.
SELECT Customer.customer_name, Orders.order_id, Customer.cat_name, Customer.telephone
FROM Customer
LEFT JOIN Orders ON Customer.customer_id = Orders.customer_id
ORDER BY Customer.customer_name;


## 5. TO ALLOW A USER KNOW ALL THE NECESSARY INFORMATION ABOUT A SELECTED NUMBER OF WILD CATS.
SELECT Cat_info.cat_name, Cat_info.gender, Cat_info.breed, Cat_info.age_in_years, Inventory.avg_weight,Inventory.avg_weight_of_foodIntake, Inventory.section, Cat_info.food_supplied
FROM Cat_info
RIGHT JOIN Inventory ON Cat_info.id = Inventory.inventory_id
ORDER BY Cat_info.cat_name;


## 6. TO FIND THE ORDER DATES IN THE YEAR 2020 FROM THE INVENTORY
SELECT Orders.inventory_id,Orders.order_type,Details.order_date,Details.delivery_mode,Details.total_price
FROM Details,Orders
WHERE Details.order_date IN
	(SELECT Details.order_date
		FROM Details
		WHERE order_date like '%2020%');
 */



















    