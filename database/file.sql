-- Create Role Table
CREATE TABLE Role (
    role_id INT PRIMARY KEY,
    role_name VARCHAR(50)
);

-- Create User Group Table
CREATE TABLE User_Group (
    group_id INT PRIMARY KEY,
    group_name VARCHAR(50),
    group_description TEXT
);

-- Create Group Permissions Table
CREATE TABLE Group_Permissions (
    group_permission_id INT PRIMARY KEY,
    group_id INT,
    role_id INT,
    module_name VARCHAR(50),
    create_permission BOOLEAN,
    read_permission BOOLEAN,
    update_permission BOOLEAN,
    delete_permission BOOLEAN,
    print_permission BOOLEAN,
    export_permission BOOLEAN,
    FOREIGN KEY (group_id) REFERENCES User_Group(group_id),
    FOREIGN KEY (role_id) REFERENCES Role(role_id)
);

-- Create Contact Table
CREATE TABLE Contact (
    contact_id INT PRIMARY KEY,
    user_id INT,
    address_line1 VARCHAR(100),
    address_line2 VARCHAR(100),
    country VARCHAR(50),
    state VARCHAR(50),
    city VARCHAR(50),
    zip VARCHAR(20),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- Create Users Table
CREATE TABLE Users (
    user_id INT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    group_id INT,
    username VARCHAR(50),
    email VARCHAR(100),
    phone VARCHAR(20),
    contact_id INT,
    password VARCHAR(100),
    reward_points INT,
    role_id INT,
    created_at TIMESTAMP,
    FOREIGN KEY (group_id) REFERENCES User_Group(group_id),
    FOREIGN KEY (role_id) REFERENCES Role(role_id),
    FOREIGN KEY (contact_id) REFERENCES Contact(contact_id)
);

-- Create Login Table
CREATE TABLE Login (
    login_id INT PRIMARY KEY,
    user_id INT,
    login_time TIMESTAMP,
    ip_address VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- Create Order Table
CREATE TABLE Orders (
    order_id INT PRIMARY KEY,
    product_id INT,
    user_id INT,
    date_purchased DATE,
    status VARCHAR(50),
    total_amount DECIMAL(10, 2),
    FOREIGN KEY (product_id) REFERENCES Product(product_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- Create Brand Table
CREATE TABLE Brand (
    brand_id INT PRIMARY KEY,
    brand_title VARCHAR(100),
    brand_description TEXT,
    brand_image VARCHAR(255),
    alt_image VARCHAR(255),
    show_in_brand_menu BOOLEAN,
    disabled BOOLEAN,
    featured BOOLEAN
);

-- Create Product Category Table
CREATE TABLE Product_Category (
    category_id INT PRIMARY KEY,
    parent_category INT,
    is_child BOOLEAN,
    category_title VARCHAR(100),
    category_description TEXT,
    brand_id INT,
    category_media_id INT,
    FOREIGN KEY (parent_category) REFERENCES Product_Category(category_id),
    FOREIGN KEY (brand_id) REFERENCES Brand(brand_id),
    FOREIGN KEY (category_media_id) REFERENCES Category_Media(category_media_id)
);

-- Create Category Media Table
CREATE TABLE Category_Media (
    category_media_id INT PRIMARY KEY,
    image VARCHAR(255),
    alt_image VARCHAR(255),
    description TEXT,
    category_banner_image VARCHAR(255),
    product_category_id INT,
    FOREIGN KEY (product_category_id) REFERENCES Product_Category(category_id)
);

-- Create Product Table
CREATE TABLE Product (
    product_id INT PRIMARY KEY,
    category_id INT,
    brand_id INT,
    product_name VARCHAR(100),
    product_code VARCHAR(50),
    barcode VARCHAR(50),
    product_short_description TEXT,
    product_detailed_description TEXT,
    stock_uom_id INT,
    other_uom_id INT,
    min_selling_qty INT,
    refundable BOOLEAN,
    FOREIGN KEY (category_id) REFERENCES Product_Category(category_id),
    FOREIGN KEY (brand_id) REFERENCES Brand(brand_id),
    FOREIGN KEY (stock_uom_id) REFERENCES Stock_UOM(stock_uom_id),
    FOREIGN KEY (other_uom_id) REFERENCES Other_UOM(other_uom_id)
);

-- Create Stock UOM Table
CREATE TABLE Stock_UOM (
    stock_uom_id INT PRIMARY KEY,
    stock_uom_name VARCHAR(50),
    disabled BOOLEAN
);

-- Create Other UOM Table
CREATE TABLE Other_UOM (
    product_id INT,
    other_uom_id INT PRIMARY KEY,
    uom_name VARCHAR(50),
    secondary_conversion_factor FLOAT,
    FOREIGN KEY (product_id) REFERENCES Product(product_id)
);
