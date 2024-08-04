CREATE TABLE users (
                       id INT(11) PRIMARY KEY AUTO_INCREMENT,
                       username VARCHAR(256) NOT NULL,
                       password VARCHAR(256) NOT NULL,
                       nonce VARCHAR(256) NOT NULL,
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
                        FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE admins (
                          id INT(11) PRIMARY KEY,
                          first_name VARCHAR(256),
                          last_name VARCHAR(256),
                          FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE campaigns (
                            id INT(11) PRIMARY KEY,
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
                               approval_status VARCHAR(256),
                               sales_price VARCHAR(256),
                               final_design_photo VARCHAR(256),
                               campaign_id INT(11),
                               admin_id INT(11),


                               FOREIGN KEY (campaign_id) REFERENCES campaigns(id) ON DELETE CASCADE,
                               FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE CASCADE

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



