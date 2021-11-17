/*
    ______ ____  ____  _____    ____  ___  _________    ____  ___   _____ ______
   / ____// __ \/ __ \/ __  \  / __ \/   |/_  __/   |  / __ )/   | / ___// ____/
  / ____// / / / / / / / / /  / / / / /| | / / / /| | / __  / /| | \__ \/ __/   
 / /    / /_/ / /_/ / /_/ /  / /_/ / ___ |/ / / ___ |/ /_/ / ___ |___/ / /___   
/_/     \____/\____/____ /  /_____/_/  |_/_/ /_/  |_/_____/_/  |_/____/_____/   
                                                                                          
*/
USE RESTAURANT;
-- DROP TABLE failed_jobs,MIGRATIONS,password_resets,users;
-- FOOD 
INSERT INTO FOOD
VALUES  (0001, 'Bánh Burger', 25000,'Bánh mì, Thịt xay, Cà chua, Phô mai, Xà lách, Hành tím, Trứng',99,'images/hamburger.png'),
        (0002, 'Gỏi Củ Hũ Dừa', 35000,'Củ hũ dừa, Củ cải, Rau râm, Các loại nấm',23,'images/goidua.png'),
        (0003,'Cá PhiLe Sốt Cam',150000,'Cá Ngừ, Sốt Nước Cam',52,'images/caphile.png'),
        (0004,'Sườn Nướng rượu vang Pháp',200000,'Sườn cừu, Rượu vang Pháp, Khoai nghiền, Salát',40,'images/suonnuong.png'),
        (0005,'Lẩu Thái',150000,'Tôm, Thịt, Nước dùng gà, Mì, Hải sản ăn kèm',15,'images/lauthai.png'),
        (0006,'Súp Cua',40000,'Thịt xay, Thanh cua, Trứng, Các loại đậu, Hột vịt bắc thảo',49,'images/supcua.png'),
        (0007,'Panna cotta',50000,'Kem, sữa, đường, bột thạch , mức mận',86,'images/panna.png'),
        (0008,'Rượu volka',50000,'Rượu cồn 40% từ Ba Lan',45,'images/vodka.png');
SELECT * FROM FOOD;
-- FOOD_CATEGORY
INSERT INTO FOOD_CATEGORY
VALUES (0001,'DO AN NHANH'),
       (0002,'AN CHAY'),
       (0003,'MON CHINH'),
       (0004,'MON CHINH'),
       (0005,'MON CHINH'),
       (0006,'MON SUP'),
       (0007,'TRANG MIENG'),
       (0008,'NUOC UONG');
SELECT * FROM FOOD_CATEGORY;
-- FOOD_KEYWORD       
INSERT INTO FOOD_KEYWORD
VALUES (0001,'Hamburger'),       
       (0001,'Banh mi'),
       (0002,'Goi'),
       (0003,'Dua'),
       (0003,'Ca'),
       (0004,'Suon'),
       (0005,'Lau'),
       (0006,'Sup'),
       (0007,'Banh'),
       (0008,'Ruou');
 SELECT * FROM FOOD_KEYWORD;  
 -- CHEFfood
 INSERT INTO CHEF (USERNAME, CName, PHONE, PWD, IMG_URL)
 VALUES ('1','Peter','0123456789','$10$PxFlRLTB7Iow7wjO4R/qEOobBiZrDeB0y5yeRnj6MC3vFrsvUdjg6', 'images/pic_chef_1.jpg'),
        ('2','Henry','045236759','$2y$10$CPQ2PLgxyWfvhcyLmlg5J.sGzdIyaM0H7sd/Cm9EXn8taJnUcCPH6', 'images/pic_chef_1.jpg');
SELECT * FROM CHEF;        
-- CLERK
INSERT INTO CLERK (USERNAME, CNAME, PHONE, PWD, IMG_URL)
VALUES ('10001','Oregaad','094561789','$2y$10$CG9g1HalP2JxuYkbDf2sROTWaLkp3MRYwS2E748RShZxEWty.UT9e', 'images/pic_chef_1.jpg'),
	   ('10002','Saka','0896321745','$2y$10$LuJieuZrVOAtDBIq1P6yMOv7GpIO25rHXuE73.56vH3/L8EQeAEoS', 'images/pic_chef_1.jpg');
-- FOOD_ORDER
-- Quy đinh order_number chạy từ 1 còn id thì 1000+order_number
INSERT INTO FOOD_ORDER
VALUES (1001,1,'DA_NAU','DA_THANH_TOAN',500000,'2020-12-30',10000,1),
       (1002,2,'CHUA_NAU','DA_THANH_TOAN',300000,'2021-1-30',8000,1),
       (1003,3,'CHUA_NAU','CHUA_THANH_TOAN',250000,'2021-1-30',20000,1),
       (1004,4,'DANG_NAU','DA_THANH_TOAN',400000,'2021-1-31',10000,2),
	   (1005,5,'DA_NAU','DA_THANH_TOAN',425000,'2021-1-31',11000,2);
 -- FOODIN_ORDER
 INSERT INTO FOODIN_ORDER
 VALUES (1,1001,1,20,'Ít phô mai'),
        (2,1002,2,2,''),
        (3,1002,2,3,''),
        (6,1002,2,2,''),
        (4,1003,3,1,'Sườn non'),
        (7,1003,3,1,''),
        (4,1004,4,2,''),
        (5,1005,5,2,'Ít cay'),
        (8,1005,5,2,'Thêm ly đá'),
        (1,1005,5,1,'Không ăn cà chua');
       