
DROP PROCEDURE IF EXISTS DSSMon_Theloai;
DELIMITER //
--  Xem danh sách món theo thể loại
Create PROCEDURE DSMon_Theloai(fcategory varchar(100)) 
BEGIN  
    DROP TABLE IF EXISTS THELOAI;
	CREATE temporary TABLE THELOAI AS
   SELECT FNAME,FOOD.ID,PRICE,INGREDIENTS,IMAGE_URL FROM ( food join food_category on food.ID=food_category.FID)
where food_category.CATEGORY=fcategory;  
 SELECT * FROM THELOAI;
END 
//
DELIMITER ;
-- call DSMon_Theloai('MON CHINH');

DROP PROCEDURE IF EXISTS DSMon_gia;
DELIMITER //
--  Xem danh sách món theo giá
Create PROCEDURE DSMon_gia (fprice VARCHAR(50)) 
BEGIN  
   IF fprice ='THAP' THEN
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
   SELECT FNAME,FOOD.ID,PRICE,INGREDIENTS,IMAGE_URL FROM ( food  join food_keyword on food.ID=food_keyword.FID)
where food_keyword.keyword=keyword;  
END 
//
DELIMITER ;
 call DSMon_tukhoa('Dua');
