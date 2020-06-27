SELECT * FROM provinsi_tb;
SELECT * FROM provinsi_tb p JOIN kabupaten_tb k ON p.id = k.provinsi_id;
SELECT * FROM provinsi_tb WHERE pulau="Jawa";
INSERT INTO provinsi_tb (id, nama, diresmikan, photo, pulau) VALUES (3, 'Bali', '14 Agustus 1959', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Coat_of_arms_of_Bali.svg/1200px-Coat_of_arms_of_Bali.svg.png', 'Bali');
                                                         
INSERT INTO kabupaten_tb (id, nama, provinsi_id, diresmikan, photo) VALUES (5, 'Denpasar', 3, '27 Februari 1788', 'https://upload.wikimedia.org/wikipedia/commons/6/65/Lambang_Kota_Denpasar_%281%29.png');