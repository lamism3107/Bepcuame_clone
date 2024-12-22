<!-- pages-title-start -->
    <div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="text-left">
                        <li><a href="?act=home">Trang chủ</a></li>
                        <li><span  class="mx-2"> / </span><a  href="collection/index"> Danh mục </a></li>
                        <li><span  class="mx-2"> / </span class="mx-2">Tất cả sản phẩm </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- pages-title-end -->
<!-- products-view content section start -->
<section class="pages p-3 products-page section-padding-bottom">
	<div class="container " style="background-color: #fff">
		<div class="row">
			<!-- Category-left -->
			<div class="col  d-md-none d-lg-block col-lg-3  border-end">
				<?php require_once("category.php") ?>
			</div>
			<div class="col col-sm-12 col-lg-9 ">
				<div class="">
					<div class="row">
						<div class="col-xs-12">
							<div class="p-2 clearfix ">
								
								<h3 class="mt-2">
									Tất cả sản phẩm
                                </h3>
								</h3>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 ">
							
                            <div class="tab-links px-2">
                                <span class="align-middle">Sắp xếp theo:</span>
                                <a href="dashboard/order" class="tab-link active" data-tab="tab-1"> Mới nhất</a>
                                <a href="dashboard/order/?status=processing" class="tab-link" data-tab="tab-2">Tên A->Z</a>
                                <a href="dashboard/order/?status=confirmed" class="tab-link" data-tab="tab-3">Tên Z->A</a>
                                <a href="dashboard/order/?status=shipped" class="tab-link" data-tab="tab-4">Giá tăng dần </a>
                                <a href="dashboard/order/?status=completed"  class="tab-link" data-tab="tab-5">Giá tăng dần </a> 

                                
                            </div>
                            <div class="row">
                                <?php 
                                if(isset($all_products) and $all_products != NULL){
                                    foreach ($all_products as  $row) {		
                                ?>
                                    <div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
                                        <div class="single-product  ">
                                            <a href="product/<?= $row['slug']?>" class="product-f">
                                                <div style="padding-top: 100%" class="position-relative">
                                                    <img src="<?= $row['image1']?>" alt="Product Img" style="inset:0" class="position-absolute img-products h-100 w-100 object-fit-cover" />
                                                </div>
                                                <!-- <div class="actions-btn">
                                                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="mdi mdi-eye"></i></a>
                                                </div> -->
                                            </a>

                                            <a href="product/<?= $row['slug']?>" class="product-dsc">
                                                <p><?= $row['name'] ?></p>
                                                <span><?= number_format($row['price']) ?> VNĐ</span>
                                            </a>
                                        
                                            <div class="cart-action-btn" productId="<?=$row['id']?>">
                                                <?php 
                                                    //Kiểm tra sản phẩm đã có trong giỏ hàng chưa
                                                    if(isset($_SESSION['cart'])){
                                                        $index = array_search($row['id'], array_column($_SESSION['cart'], 'id'));
                                                        //array_column() Trích xuất một cột từ một mảng và trả về một mảng các giá trị của cột đó
                                                        if($index === false){
                                                            echo '<button productId="' . $row['id'] . '"  onclick="addToCart({
                                                                name: \'' . $row['name'] . '\',
                                                                slug: \'' . $row['slug'] . '\',
                                                                id: ' . $row['id'] . ',
                                                                price: ' . $row['price'] . ',
                                                                image1: \'' . $row['image1'] . '\'
                                                            })" class="add-cart-btn p-2">
                                                                Chọn mua
                                                            </button>';
                                                        }
                                                        else{
                                                            echo 
                                                            '<div class="update-cart-btn  d-flex align-items-center justify-content-stretch">
                                                                    <button onclick="minusCart({
                                                                        name: \'' . $row['name'] . '\',
                                                                        slug: \'' . $row['slug'] . '\',
                                                                        id: ' . $row['id'] . ',
                                                                        price: ' . $row['price'] . ',
                                                                        image1: \'' . $row['image1'] . '\'
                                                                    })" class="minus-cart" style="width: 15%" style="background-color: transparent;">
                                                                        <i class="fa-solid fa-minus"></i>
                                                                    </button>
                                                                    
                                                                    <input disabled type="text"  class="count-cart count-cart-'.$row['id'].' form-control text-center"  min="1" value='.$_SESSION['cart'][$row['id']]['quantity'].' style="width: 30px; text-align: center; user-select: none "/>
                                                                    
                                                                    <button onclick="plusCart({
                                                                        name: \'' . $row['name'] . '\',
                                                                        slug: \'' . $row['slug'] . '\',
                                                                        id: ' . $row['id'] . ',
                                                                        price: ' . $row['price'] . ',
                                                                        image1: \'' . $row['image1'] . '\'
                                                                    })" class="plus-cart"  style="width: 15%" style="background-color: transparent;">
                                                                        <i class="fa-solid fa-plus"></i>
                                                                    </button>
                                                            </div>' ;
                                                        }
                                                    }
                                                    else{
                                                        echo '<button productId="' . $row['id'] . '"  onclick="addToCart({
                                                            name: \'' . $row['name'] . '\',
                                                            slug: \'' . $row['slug'] . '\',
                                                            id: ' . $row['id'] . ',
                                                            price: ' . $row['price'] . ',
                                                            image1: \'' . $row['image1'] . '\'
                                                        })" class="add-cart-btn p-2">
                                                            Chọn mua
                                                        </button>';
                                                    }
                                                
                                                ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                <?php }}else{
                                    echo '<p> Chưa có sản phẩm nào </p>';}?>
                            </div>


						</div>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</section>
<!-- products-view content section end -->

 