CREATE TABLE users (
                       id INT(11) PRIMARY KEY AUTO_INCREMENT,
                       email VARCHAR(256) NOT NULL,
                       password VARCHAR(256) NOT NULL,
                       nonce VARCHAR(256),
                       nonce_expiry DATETIME,
                       role VARCHAR(256) NOT NULL
);

CREATE TABLE schools (
                         id INT(11) PRIMARY KEY,
                         name VARCHAR(256),
                         rep_first_name VARCHAR(256),
                         rep_last_name VARCHAR(256),
                         rep_email VARCHAR(256),
                         address VARCHAR(256),
                         code VARCHAR(256),
                         bank_account_name VARCHAR(256),
                         bank_account_number VARCHAR(256),
                         bsb VARCHAR(256),
                         approval_status TINYINT(1),
                         logo VARCHAR(256),
                         FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE
);


CREATE TABLE campaigns (
                           id INT(11) PRIMARY KEY AUTO_INCREMENT,
                           name VARCHAR(256),
                           default_sales_price VARCHAR(256),
                           total_fund_raised VARCHAR(256),
                           start_date DATE,
                           end_date DATE,
                           school_id INT(11),
                           FOREIGN KEY (school_id) REFERENCES schools(id) ON DELETE CASCADE
);

CREATE TABLE design_drafts (
                               id INT(11) PRIMARY KEY AUTO_INCREMENT,
                               design_name VARCHAR(256),
                               design_yearlevel VARCHAR(256),
                               specifications VARCHAR(256),
                               approval_status TINYINT(1),
                               sales_price VARCHAR(256),
                               final_design_photo VARCHAR(256),
                               campaign_id INT(11),
                               user_id INT(11),


                               FOREIGN KEY (campaign_id) REFERENCES campaigns(id) ON DELETE CASCADE,
                               FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE

);

CREATE TABLE design_photos (
                               id INT(11) PRIMARY KEY AUTO_INCREMENT,
                               photo VARCHAR(256),
                               design_draft_id INT(11),


                               FOREIGN KEY (design_draft_id) REFERENCES design_drafts(id) ON DELETE CASCADE
);

CREATE TABLE products (
                          id INT(11) PRIMARY KEY AUTO_INCREMENT,
                          product_name VARCHAR(256),
                          specifications VARCHAR(256),
                          sales_price VARCHAR(256),
                          final_design_photo VARCHAR(256),
                          design_draft_id INT(11),

                          FOREIGN KEY (design_draft_id) REFERENCES design_drafts(id) ON DELETE CASCADE
);


CREATE TABLE orders (
                        id INT(11) PRIMARY KEY AUTO_INCREMENT,
                        customer_name VARCHAR(256),
                        customer_contact_number VARCHAR(256),
                        customer_contact_email VARCHAR(256),
                        date_purchase TIMESTAMP

);

CREATE TABLE product_orders (
                                order_product_id INT(11) PRIMARY KEY AUTO_INCREMENT,
                                quantity INT(5),
                                order_id INT(11),
                                product_id INT(11),

                                FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
                                FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

INSERT INTO users (email, password, role)
VALUES ('jdoe@example.com', '$2a$12$DAGEG/b2x27mrGHUS0ztEeRhT8.qKPRig5ov4Lip1p25hsA6lzw/S', 'Admin');

INSERT INTO users (email, password, role)
VALUES ('jane@example.com', '$2a$12$acmutExArwb2WbSJzEpzyeWTQtc3NQmVHzcMyw7mSpoQZNVgOHz0C', 'School');

INSERT INTO schools (id, name, rep_first_name, rep_last_name, rep_email, address, code, bank_account_name, bank_account_number, bsb, approval_status)
VALUES (2, 'Greenwood High', 'Jane', 'Smith', 'jane@example.com', '123 Maple Street', 'GR1234', 'Greenwood Bank', '123456789', '123-456', 1);
