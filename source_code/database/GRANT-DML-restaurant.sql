
DROP PROCEDURE IF EXISTS DSSMon_Theloai;
DELIMITER //
--  Xem danh sách món theo thể loại
Create PROCEDURE DSMon_Theloai(fcategory varchar(100)) 
BEGIN  
	IF fcategory ='TAT CA' THEN
    SELECT * FROM FOOD;
    ELSE 
    DROP TABLE IF EXISTS THELOAI;
	CREATE temporary TABLE THELOAI AS
   SELECT FNAME,FOOD.ID,PRICE,INGREDIENTS,IMAGE_URL FROM ( food join food_category on food.ID=food_category.FID)
where food_category.CATEGORY=fcategory;  
    SELECT * FROM THELOAI;
    END IF;
END 
//
DELIMITER ;
 call DSMon_Theloai('TAT CA');

DROP PROCEDURE IF EXISTS DSMon_gia;
DELIMITER //
--  Xem danh sách món theo giá
Create PROCEDURE DSMon_gia (fprice VARCHAR(50)) 
BEGIN  
	IF fprice ='TAT CA' THEN
    SELECT FNAME,FOOD.ID,PRICE,INGREDIENTS,IMAGE_URL FROM food;
   ELSEIF fprice ='THAP' THEN
    SELECT FNAME,FOOD.ID,PRICE,INGREDIENTS,IMAGE_URL FROM food where FOOD.PRICE>0 AND FOOD.PRICE<=50000;
   ELSEIF fprice='TRUNG BINH' THEN
    SELECT FNAME,FOOD.ID,PRICE,INGREDIENTS,IMAGE_URL FROM food where FOOD.PRICE>50000 AND FOOD.PRICE<=150000;
   ELSEIF fprice='CAO' THEN
    SELECT FNAME,FOOD.ID,PRICE,INGREDIENTS,IMAGE_URL FROM food where FOOD.PRICE>150000 AND FOOD.PRICE<=300000;
   ELSE 
    SELECT FNAME,FOOD.ID,PRICE,INGREDIENTS,IMAGE_URL FROM food where FOOD.PRICE>300000; 
   END IF;
END 
//
DELIMITER ;
-- call DSMon_gia('THAP');

-- Xem danh sách món theo từ khóa
DROP PROCEDURE IF EXISTS DSMon_tukhoa;
DELIMITER //
Create PROCEDURE DSMon_tukhoa (keyword varchar(50)) 
BEGIN  
   SELECT FNAME,FOOD.ID,PRICE,INGREDIENTS,IMAGE_URL FROM `food`
where FNAME like '%keyword%' or INGREDIENTS like '%keyword%';  
END 
//
DELIMITER ;
-- call DSMon_tukhoa('Ca');

DROP PROCEDURE IF EXISTS getReveneu_InRange;
DELIMITER //
Create PROCEDURE getReveneu_InRange(time1 DATE, time2 DATE) 
BEGIN  
   SELECT DATE(`food_orders`.`created_at`) AS `time`,
         COUNT(`food_orders`.`created_at`) AS `count`,
         SUM(`food_orders`.`TOTAL`) AS `total`,
         SUM(`food_orders`.`TIPS`) AS `tips`
         FROM `food_orders` 
         WHERE `food_orders`.`created_at` >=  time1
		   AND `food_orders`.`created_at` <= time2
         GROUP BY `food_orders`.`created_at`
         ORDER BY `food_orders`.`created_at` ASC;  
END 
//
DELIMITER ;

DROP PROCEDURE IF EXISTS getFood;
DELIMITER //
Create PROCEDURE getFood() 
BEGIN  
	SELECT   `food`.`IMAGE_URL` AS `url` , 
            `food`.`FNAME` AS `name`, 
            `food`.`PRICE` AS `price`, 
            `food_category`.`CATEGORY` AS `category`,
            `food`.`INGREDIENTS` AS `decs`,
            `food`.`ID` AS `id`
   FROM `food`, `food_category` 
   WHERE `food`.`ID` = `food_category`.`FID`;
END 
//
DELIMITER ;

DROP PROCEDURE IF EXISTS getClerk;
DELIMITER //
Create PROCEDURE getClerk() 
BEGIN  
   SELECT `clerk`.`IMG_URL` AS `img`,
          `clerk`.`CNAME` AS `name`,
          `clerk`.`PHONE` AS `phone`,
          `clerk`.`ID` AS `id`
   	FROM `clerk`;
END 
//
DELIMITER ;

DROP PROCEDURE IF EXISTS getChef;
DELIMITER //
Create PROCEDURE getChef()
BEGIN  
   SELECT `chef`.`IMG_URL` AS `img`,
          `chef`.`CNAME` AS `name`,
          `chef`.`PHONE` AS `phone`,
          `chef`.`ID` AS `id`
   FROM `chef`;
END 
//
DELIMITER ;


DROP PROCEDURE IF EXISTS getCategory;
DELIMITER //
Create PROCEDURE getCategory() 
BEGIN  
   SELECT `food_category`.`CATEGORY` as `type` FROM `food_category` GROUP BY `food_category`.`CATEGORY`;
END 
//
DELIMITER ;


DROP PROCEDURE IF EXISTS removeFood;
DELIMITER //
Create PROCEDURE removeFood(id int) 
BEGIN  
   DELETE FROM `food` WHERE `food`.`ID` = id;
END 
//
DELIMITER ;


DROP PROCEDURE IF EXISTS removeChef;
DELIMITER //
Create PROCEDURE removeChef(id int) 
BEGIN  
   DELETE FROM `chef` WHERE `chef`.`ID` = id;
END 
//
DELIMITER ;



DROP PROCEDURE IF EXISTS removeClerk;
DELIMITER //
Create PROCEDURE removeClerk(id int) 
BEGIN  
   DELETE FROM `clerk` WHERE `clerk`.`ID` = id;
END 
//
DELIMITER ;



DROP PROCEDURE IF EXISTS addClerk;
DELIMITER //
Create PROCEDURE addClerk(username VARCHAR(50), pwd TEXT , fname VARCHAR(50), cmnd VARCHAR(10), birthday DATE, phone VARCHAR(9), url VARCHAR(255)) 
BEGIN  
	INSERT INTO `clerk` (`clerk`.`USERNAME`, `clerk`.`PWD`, `clerk`.`CNAME`, `clerk`.`CMND`, `clerk`.`BIRTHDATE`, `clerk`.`PHONE`, `clerk`.`IMG_URL`)
    VALUES (Username, pwd, fname, cmnd, birthday, phone, url);
END 
//
DELIMITER ;


DROP PROCEDURE IF EXISTS addChef;
DELIMITER //
Create PROCEDURE addChef(username VARCHAR(50), pwd TEXT , fname VARCHAR(50), cmnd VARCHAR(10), birthday DATE, phone VARCHAR(9), url VARCHAR(255)) 
BEGIN  
	INSERT INTO `chef` (`chef`.`USERNAME`, `chef`.`PWD`, `chef`.`CNAME`, `chef`.`CMND`, `chef`.`BIRTHDATE`, `chef`.`PHONE`, `chef`.`IMG_URL`)
    VALUES (Username, pwd, fname, cmnd, birthday, phone, url);
END 
//
DELIMITER ;


DROP PROCEDURE IF EXISTS addFood;
DELIMITER //
Create PROCEDURE addFood(id int, fname varchar(50), price int, ingredients text, quantity int, img_url varchar(255), category varchar(100)) 
BEGIN  
	INSERT INTO `food` (`food`.`ID`, `food`.`FNAME`, `food`.`PRICE`, `food`.`INGREDIENTS`, `food`.`STOCK_QUANTITY`, `food`.`IMAGE_URL`)
    VALUES (id, fname, price, ingredients, quantity, img_url);
    INSERT INTO `food_category` (`food_category`.`FID`, `food_category`.`CATEGORY`)
    VALUES (id, category);
END 
//
DELIMITER ;

DROP PROCEDURE IF EXISTS updateFood;
DELIMITER //
Create PROCEDURE updateFood(fname varchar(50), price int, ingredients text, category varchar(100), id int) 
BEGIN  
	UPDATE `food`
    SET `food`.`FNAME` = fname, `food`.`PRICE` = price, `food`.`INGREDIENTS` = ingredients
    WHERE `food`.`ID` = id;
    UPDATE `food_category`
    SET `food_category`.`CATEGORY` = category
    WHERE `food_category`.`ID` = id;
END 
//
DELIMITER ;

DROP PROCEDURE IF EXISTS updateClerk;
DELIMITER //
Create PROCEDURE updateClerk(phone VARCHAR(9), id INT) 
BEGIN  
	UPDATE `clerk`
    SET `clerk`.`PHONE` = phone
    WHERE `clerk`.`ID` = id;
END 
//
DELIMITER ;

DROP PROCEDURE IF EXISTS updateChef;
DELIMITER //
Create PROCEDURE updateChef(phone VARCHAR(9), id INT) 
BEGIN  
	UPDATE `chef`
    SET `chef`.`PHONE` = phone
    WHERE `chef`.`ID` = id;
END 
//
DELIMITER ;