CREATE TABLE Users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    role ENUM('0', '1') NOT NULL
);

CREATE TABLE Policy (
    policy_id INT PRIMARY KEY AUTO_INCREMENT,
    description TEXT NOT NULL,
    last_update DATE NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Case (
    case_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    policy_id INT NOT NULL,
    description TEXT NOT NULL,
    verdict_status VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    report_date DATE NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (policy_id) REFERENCES Policy(policy_id)
);

CREATE TABLE Verdict (
    case_id INT NOT NULL,
    verdict_description TEXT NOT NULL,
    verdict_date DATE NOT NULL,
    PRIMARY KEY (case_id, verdict_date),
    FOREIGN KEY (case_id) REFERENCES Case(case_id)
);
