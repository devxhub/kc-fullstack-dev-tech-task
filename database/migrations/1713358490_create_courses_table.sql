-- up
CREATE TABLE IF NOT EXISTS courses (
    id VARCHAR(36) PRIMARY KEY,
    category_id VARCHAR(36) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    image_preview VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

INSERT INTO courses (id, category_id, title, description, image_preview) VALUES
('L373349028', '3d4e5f6a-7b8c-9d0e-1f2a-3b4c5d6e7f8a', 'Diversity and Inclusion for a Better Business', 'Diversity can seem like a difficult concept...', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373349028/800--v112240.jpg'),
('L373371072', '3d4e5f6a-7b8c-9d0e-1f2a-3b4c5d6e7f8a', 'Leadership for Identity Diversity', 'As a leader, people of many different backgrounds...', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373371072/800--v112239.jpg'),
('L373324687', '3d4e5f6a-7b8c-9d0e-1f2a-3b4c5d6e7f82', 'Applying Yourself to Diverse and Inclusive Leadership', 'Improving diversity in the workplace requires strategic planning...', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373324687/800--v112241.jpg'),
('L373312762', '4e5f6a7b-8c9d-0e1f-2a3b-4c5d6e7f8a9b', 'Finance and Accounting Basics for Nonfinancial Executives', 'Financial knowledge is vital to an executive’s role...', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373312762/800--v112243.jpg'),
('L373319845', '5f6a7b8c-9d0e-1f2a-3b4c-5d6e7f8a9b0c', 'Financial Statements and Reporting for Nonfinancial Executives', 'Financial statements are a critical part of attracting investors...', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373319845/800--v112244.jpg'),
('L373327593', '7b8c9d0e-1f2a-3b4c-5d6e-7f8a9b0c1d2e', 'Financial Planning and Analysis for Nonfinancial Executives', 'With constant market fluctuation and an unpredictable supply chain...', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373327593/800--v112246.jpg'),
('L373395597', '1f2a3b4c-5d6e-7f8a-9b0c-1d2e3f4a5b6c', 'Valuation for Nonfinancial Executives', 'Investments always involve a bit of risk, but you can lower that risk...', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373395597/800--v112241.jpg'),
('L373337574', '8a9b0c1d-2e3f-4a5b-6c7d-8e9f0a1b2c3d', 'Defining Cross-Cultural Leadership', 'The modern business landscape is noticeably globalized...', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373337574/800--v112262.jpg');

-- down
DROP TABLE `courses`;