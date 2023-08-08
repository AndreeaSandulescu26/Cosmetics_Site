CREATE TABLE PRODUCT(
    product_id NUMBER GENERATED ALWAYS as IDENTITY(START with 1 INCREMENT by 1),
    name VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    description VARCHAR(255),
    totalQuantity INT,
    productpicture VARCHAR(255),
    CONSTRAINT product_pk PRIMARY KEY (product_id)
    );

CREATE TABLE MYORDER(
    myorder_id NUMBER GENERATED ALWAYS as IDENTITY(START with 1 INCREMENT by 1),
    total FLOAT,
    order_date DATE,
    CONSTRAINT myorder_pk PRIMARY KEY (myorder_id)	
    );

CREATE TABLE ORDEREDITEM(
    ordereditem_id NUMBER GENERATED ALWAYS as IDENTITY(START with 1 INCREMENT by 1),
    quantity INT,
    productID NUMBER,
    orderID NUMBER,
    CONSTRAINT ordereditem_pk PRIMARY KEY (ordereditem_id),
    CONSTRAINT fk_product FOREIGN KEY (productID) REFERENCES PRODUCT(product_id),
    CONSTRAINT fk_order FOREIGN KEY (orderID) REFERENCES MYORDER(myorder_id)
    );

 CREATE TABLE ORDERDETAILS (
    orderdetails_id NUMBER GENERATED ALWAYS as IDENTITY(START with 1 INCREMENT by 1),
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    adress VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    phone VARCHAR(10) NOT NULL,
    email VARCHAR(255),
    order_id NUMBER, 
    CONSTRAINT orderdetails_pk PRIMARY KEY (orderdetails_id),
    CONSTRAINT fk_orderdetails_order FOREIGN KEY (order_id) REFERENCES MYORDER(myorder_id)
    );

INSERT INTO PRODUCT(name, price, description, totalQuantity) VALUES('Buffet - Multi-technology peptides serum', 33,
'This formula combines a complex range of technologies aimed at the signs of tissue aging, contains 11 types of
amino acids that have gentle action on the skin and multiple hyaluronic acid complexes.', 1)

INSERT INTO PRODUCT(name, price, description, totalQuantity) VALUES('Glycolic Acid', 70.5,
'Glycolic acid is an alpha hydroxy acid that exfoliates the skin.
This tonic solution gives the skin a light exfoliation for luminous and matte skin, improving the structure of the skin.', 2)

INSERT INTO PRODUCT(name, price, description, totalQuantity) VALUES('Aloe Spray for face', 105,
'A refreshing, moisturizing spray that can be used anywhere, anytime.
Formulated with vegetable extracts and rose water to prevent dehydration and tight skin.
Applied over the day or night cream will give you extra hydration.', 2)

INSERT INTO PRODUCT(name, price, description, totalQuantity) VALUES('Mask for acne-prone skin', 90.99,
'An anti-acne treatment that hides skin imperfections.
With just a few small applications on the area affected by pimples you can minimize the risk of stretching the rash.', 3)

select * from PRODUCT

UPDATE PRODUCT
SET name = 'Peptides serum'
WHERE product_id = 3;

UPDATE PRODUCT
SET description = 'A refreshing, moisturizing spray that can be used anywhere, anytime.
Formulated with vegetable extracts and rose water to prevent dehydration and tight skin.
It will give you extra hydration.'
WHERE product_id = 5;

UPDATE PRODUCT
SET name = 'Mask for Acne'
WHERE product_id = 7;

select * from ORDERDETAILS;
select * from ORDEREDITEM;
select * from MYORDER;

UPDATE PRODUCT
SET totalQuantity = 300
WHERE product_id = 3;

UPDATE PRODUCT
SET totalQuantity = 300
WHERE product_id = 4;

UPDATE PRODUCT
SET totalQuantity = 300
WHERE product_id = 5;

UPDATE PRODUCT
SET totalQuantity = 300
WHERE product_id = 7;

ALTER TABLE Product ADD remainingQuantity INTEGER DEFAULT 0;
ALTER TABLE Product DROP COLUMN PRODUCTPICTURE;
ALTER TABLE Product DROP COLUMN REMAININGQUANTITY;
DELETE FROM ORDEREDITEM;
DELETE FROM MYORDER;
DELETE FROM ORDERDETAILS;