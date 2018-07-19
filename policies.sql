
CREATE TABLE policies (
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    code VARCHAR(50) NOT NULL,
    plan_reference VARCHAR(191) NOT NULL,
    first_name VARCHAR(191) NOT NULL,
    last_name VARCHAR(191) NOT NULL,
    investment_house VARCHAR(191) NOT NULL,
    last_operation DATE NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (code)
);
