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
VALUES  (0001, 'Bánh Burger', 25000,'Bánh mì, Thịt xay, Cà chua, Phô mai, Xà lách, Hành tím, Trứng',99,'https://cdn.daylambanh.edu.vn/wp-content/uploads/2020/10/cong-thuc-lam-hamburger.jpg'),
        (0002, 'Gỏi Củ Hũ Dừa', 35000,'Củ hũ dừa, Củ cải, Rau râm, Các loại nấm',23,'https://product.hstatic.net/1000103608/product/goi-hu-dua_master.jpg'),
        (0003,'Cá PhiLe Sốt Cam',150000,'Cá Ngừ, Sốt Nước Cam',52,'https://hstatic.net/244/1000030244/10/2015/8-5/ca-phi-le-sot-cam.jpg'),
        (0004,'Sườn Nướng rượu vang Pháp',200000,'Sườn cừu, Rượu vang Pháp, Khoai nghiền, Salát',40,'http://bizweb.dktcdn.net/100/021/951/files/suon-cuu-nuong.jpg'),
        (0005,'Lẩu Thái',150000,'Tôm, Thịt, Nước dùng gà, Mì, Hải sản ăn kèm',15,'https://i.ytimg.com/vi/jb0DiBpXQUo/maxresdefault.jpg'),
        (0006,'Súp Cua',40000,'Thịt xay, Thanh cua, Trứng, Các loại đậu, Hột vịt bắc thảo',49,'https://cdn.tgdd.vn/2021/05/CookProduct/thumbuwj-1200x676.jpg'),
        (0007,'Panna cotta',50000,'Kem, sữa, đường, bột thạch , mức mận',86,'https://img.taste.com.au/f1wiGWj4/taste/2019/10/panna-cotta-with-roasted-star-anise-plums-155079-1.jpg'),
        (0008,'Rượu volka',50000,'Rượu cồn 40% từ Ba Lan',45,'https://douongngoainhap.com/wp-content/uploads/image/05_2019/ruou%20vodka%20men.jpg');
SELECT * FROM FOOD;
-- FOOD_CATEGORY
INSERT INTO FOOD_CATEGORY
VALUES (0001,'DO AN NHANH'),
       (0001,'KHAI VI') ,
       (0002,'AN CHAY'),
       (0003,'MON CHINH'),
       (0004,'MON CHINH'),
       (0004,'MON THIT'),
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
       (0002,'Dua'),
       (0003,'Ca'),
       (0004,'Suon'),
       (0005,'Lau'),
       (0006,'Sup'),
       (0007,'Banh'),
       (0008,'Ruou');
 SELECT * FROM FOOD_KEYWORD;  
 -- CHEFfood
 INSERT INTO CHEF
 VALUES (1,'1','Peter',0123456789,'$10$PxFlRLTB7Iow7wjO4R/qEOobBiZrDeB0y5yeRnj6MC3vFrsvUdjg6'),
        (2,'2','Henry',045236759,'$2y$10$CPQ2PLgxyWfvhcyLmlg5J.sGzdIyaM0H7sd/Cm9EXn8taJnUcCPH6');
SELECT * FROM CHEF;        
-- CLERK
INSERT INTO CLERK
VALUES (1,'10001','Oregaad',094561789,5000000,'$2y$10$CG9g1HalP2JxuYkbDf2sROTWaLkp3MRYwS2E748RShZxEWty.UT9e'),
	   (2,'10002','Saka',0896321745,5600000,'$2y$10$LuJieuZrVOAtDBIq1P6yMOv7GpIO25rHXuE73.56vH3/L8EQeAEoS');
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
 VALUES (1,1001,1,20),
        (2,1002,2,2),
        (3,1002,2,3),
        (6,1002,2,2),
        (4,1003,3,1),
        (7,1003,3,1),
        (4,1004,4,2),
        (5,1005,5,2),
        (8,1005,5,2),
        (1,1005,5,1);
       