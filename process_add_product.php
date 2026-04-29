<?php
$conn = new mysqli("localhost", "root", "", "shopz");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_name = $_POST['product_name'];
$slug = $_POST['slug'];
$product_type = $_POST['product_type'];
$category_id = $_POST['category_id'];
$brand_id = $_POST['brand_id'];
$short_description = $_POST['short_description'];
$full_description = $_POST['full_description'];
$regular_price = $_POST['regular_price'];
$sale_price = $_POST['sale_price'];
$sku = $_POST['sku'];
$stock_quantity = $_POST['stock_quantity'];
$meta_title = $_POST['meta_title'];
$meta_description = $_POST['meta_description'];
$focus_keyword = $_POST['focus_keyword'];
$status = $_POST['status'];

$image_name = $_FILES['product_image']['name'];
$tmp_name = $_FILES['product_image']['tmp_name'];

$upload_dir = "uploads/";
move_uploaded_file($tmp_name, $upload_dir . $image_name);

$sql = "INSERT INTO products (
    product_name,
    slug,
    product_type,
    category_id,
    brand_id,
    product_image,
    short_description,
    full_description,
    regular_price,
    sale_price,
    sku,
    stock_quantity,
    meta_title,
    meta_description,
    focus_keyword,
    status
) VALUES (
    '$product_name',
    '$slug',
    '$product_type',
    '$category_id',
    '$brand_id',
    '$image_name',
    '$short_description',
    '$full_description',
    '$regular_price',
    '$sale_price',
    '$sku',
    '$stock_quantity',
    '$meta_title',
    '$meta_description',
    '$focus_keyword',
    '$status'
)";

if ($conn->query($sql) === TRUE) {
    echo "Product Added Successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
