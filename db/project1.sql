#product_type
INSERT INTO product_type (category) VALUES ('livestock');
INSERT INTO product_type (category) VALUES ('structure');
INSERT INTO product_type (category) VALUES ('feed');
INSERT INTO product_type (category) VALUES ('accessory');

#product
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('1', 'Ameraucana', '3.35', 'ameraucana.jpg');
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('1', 'Black Sex-Link', '2.60', 'black_sex_link.jpg');
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('1', 'Broiler', '2.30', 'broiler.jpg');
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('2', 'Chicken Coop', '834.99', 'chicken_coop.jpg');
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('2', 'Chicken Run', '389.99', 'chicken_run.jpg');
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('2', 'Meat Bird Run', '155.50', 'meat_bird_run.jpg');
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('3', 'Medicated Feed', '20.85', 'medicated_feed.jpg');
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('3', 'Starter Feed', '20.85', 'starter_feed.jpg');
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('3', 'Meat Bird Feed', '21.98', 'meat_bird_feed.jpg');
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('3', 'Egg Layer Feed', '19.99', 'egg_layer_feed.jpg');
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('4', '1 Gal. Waterer', '20.15', '1_gal_waterer.jpg');
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('4', '2 Gal. Waterer', '24.59', '2_gal_waterer.jpg');
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('4', '3 Gal. Waterer', '29.89', '3_gal_waterer.jpg');
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('4', 'Heated Waterer', '24.59', 'heated_waterer.jpg');
INSERT INTO product (product_type_id, name, price, image_url) VALUES ('4', 'Tube Feeder', '35.90', 'tube_feeder.jpg');

#shipping_type
INSERT INTO shipping_type (name, price, days) VALUES ('Fedex', '13.95', '7');
INSERT INTO shipping_type (name, price, days) VALUES ('UPS', '7.50', '5');
INSERT INTO shipping_type (name, price, days) VALUES ('USPS', '11.20', '10');
INSERT INTO shipping_type (name, price, days) VALUES ('2-Day Priority', '60.55', '2');

