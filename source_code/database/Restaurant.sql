DROP SCHEMA IF EXISTS RESTAURANT;
CREATE SCHEMA RESTAURANT;
USE RESTAURANT;
CREATE TABLE FOOD(
  ID INT PRIMARY KEY,-- 4 số 
  FNAME VARCHAR(100),
  PRICE BIGINT,
  INGREDIENTS TEXT
);
ALTER TABLE FOOD 
ADD STOCK_QUANTITY INT;
ALTER TABLE FOOD
ADD IMAGE_URL VARCHAR(255);
CREATE TABLE CLERK (
  ID BIGINT PRIMARY KEY AUTO_INCREMENT,
  USERNAME VARCHAR(50),
  CNAME varchar(50),
  PHONE VARCHAR(9),
  CMND VARCHAR(10),
  BIRTHDATE DATE,
  PWD TEXT,
  IMG_URL VARCHAR(255)
);
CREATE TABLE CHEF (
  ID BIGINT PRIMARY KEY AUTO_INCREMENT,
  USERNAME VARCHAR(50),
  CNAME varchar(50),
  PHONE VARCHAR(9),
  CMND VARCHAR(10),
  BIRTHDATE DATE,
  PWD TEXT,
  IMG_URL VARCHAR(255)
);

CREATE TABLE FOOD_CATEGORY(
  FID INT,
  CATEGORY VARCHAR(100),
  PRIMARY KEY(FID, CATEGORY),
  FOREIGN KEY (FID) REFERENCES FOOD(ID) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE FOOD_KEYWORD(
  FID INT,
  KEYWORD VARCHAR(100),
  PRIMARY KEY(FID, KEYWORD),
  FOREIGN KEY (FID) REFERENCES FOOD(ID) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE Food_ORDER(
  ID BIGINT AUTO_INCREMENT,
  ORDER_NUMBER INT,
  PRIMARY KEY(ID, ORDER_NUMBER),
  STATUS_ORDER VARCHAR(100) CHECK (STATUS_ORDER IN ('CHUA_NAU','DANG_NAU','DA_NAU')),
  STATUS_PAYMENT VARCHAR(100) CHECK (STATUS_PAYMENT IN ('DA_THANH_TOAN','CHUA_THANH_TOAN')),
  TOTAL BIGINT,
  PURCHASE_DATE DATETIME,
  TIPS BIGINT,
  Cl_ID BIGINT,
  FOREIGN KEY (Cl_ID) REFERENCES CLERK(ID) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE FOODIN_ORDER(
  FID INT,
  ORDER_ID BIGINT,
  ORDER_NUMBER INT,
  QUANTITY INT,
  DESCRIPT TEXT,
  PRIMARY KEY(FID, ORDER_NUMBER),
  FOREIGN KEY (FID) REFERENCES FOOD(ID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (ORDER_ID,ORDER_NUMBER) REFERENCES Food_ORDER(ID,ORDER_NUMBER) ON DELETE CASCADE ON UPDATE CASCADE
);