CREATE TABLE test_table (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL
);

INSERT INTO test_table (name) VALUES ('foo');
INSERT INTO test_table (name) VALUES ('bar');

