<?php
function createProduct($data, $files){
    $img = null;
    if(isset($files['image'])){
        $result = imgUpload($files['image'], "../uploads/products");
        if (isset($result['success'])) {
            $img = $result['success'];
        }else{
            http_response_code(400);
            echo $result['error'];
            exit;
        }
    }
    $product = new Product(null,$data['name'],$data['category_id'],$data['brand_id'],$data['desc'],$data['price'],$data['qty'],$data['restock'],$img, $data['active']);
    echo json_encode($product->create());
}
function getProducts(){
    echo json_encode(Product::getAll());
}
?>